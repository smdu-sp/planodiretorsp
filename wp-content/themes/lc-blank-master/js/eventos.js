var app = new Vue({
  el: "#appevento",
  data: {
    agendaCampos: ['titulo', 'data_inicio', 'data_termino', 'horario', 'local', 'link', 'link_texto'],
    checkboxDataTermino: false,
    documentos: "",
    evento: eventoRaw,
    labelsAgenda: {
      titulo: 'Título',
      data_inicio: 'Data de Início',
      data_termino: 'Data de Encerramento',
      horario: 'Horário',
      local: 'Local',
      link: 'Endereço URL',
      link_texto: 'Texto da URL',
      tamanho_titulo: 'Tamanho',
      tamanho_data: 'Tamanho',
      tamanho_horario: 'Tamanho',
      tamanho_local: 'Tamanho'
    },
    labelsEventos: {
      tipo: 'Tipo de evento',
      tema: 'Tema',
      titulo: 'Título / Nome do evento',
      imagem: 'Link da imagem',
      destaque: 'Texto de destaque',
      descricao: 'Descrição do evento',
      data_evento: 'Data do evento',
      data_termino: 'Término do evento (opcional)',
      hora_evento: 'Hora do evento',
      local: 'Local (evento presencial)',
      link: 'Link da transmissão',
      descricao_link: 'Texto do link'
    },
    labelsNoticias: {
      titulo: 'Título',
      imagem: 'Capa',
      pracegover: 'Descrição da imagem (#PraCegoVer)',
      link: 'Endereço URL',
    },
    modalTexto: '',
    modalTrava: false,
    novaNoticia: [{
      titulo: '',
      imagem: '',
      pracegover: '',
      link: '',
      checkboxPraCegoVer: false
    }],
    listaDeDocumentos: [],
    periodoValido: false,
    tipoDeEvento: tipoDeEvento,
    validacaoAgenda: false,
    categorias: [],
    categoriasOrdenadas: [],
    videos: [],
    videosCampos: ['titulo', 'link', 'categoria', 'imagem'],
    videosLabels: {
      titulo: 'Título',
      link: 'Link',
      categoria: 'Categoria',
      imagem: 'Imagem'
    },
    videosModo: '',
  },
  methods: {
    abreNoticia: function(key = -1) {
      if (key >= 0) {
        this.evento[key].aberto = true;
      } else {
        this.novaNoticia.aberto = true;
      }
      this.$forceUpdate();
    },
    addNoticia: function() {
      this.modalTexto= 'Enviando...';
      let validacaoNoticia = this.validaNoticia();
      if (validacaoNoticia) {
        this.modalTrava = true;
        // Recarrega após fechar o Modal
        jQuery('#modal-eventos').on('hidden.bs.modal', function () {
          window.location.href = window.location.href;
        });
        let dados = Object.assign({}, this.novaNoticia[0]);
        const arrayDelete = ['checkboxPraCegoVer'];
        arrayDelete.forEach(valor => delete dados[valor]);
        axios
          .post('/evento/?tipo=noticias', dados)
          .then(response => {
            console.log(response.status)
            if (response.status === 200) {
              console.log(response);
              this.modalTexto = 'Notícia adicionada com sucesso!';
            } else {
              this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
            }
            this.modalTrava = false;
          });
      } else {
        this.modalTexto = 'Um ou mais campos contém dados inválidos, verifique os dados e tente novamente.'
      }
    },
    addCategoria: function() {
      const iniciaCategoria = {
        categoria: '',
        ordem: this.categorias.length + 1,
      }
      this.categorias.push(iniciaCategoria);
    },
    addDocumento: function() {
      this.listaDeDocumentos.push({
        nome: '',
        link: ''
      })
    },
    atualizaAgenda: function() {
      this.modalTexto= 'Enviando...';
      let validacaoAgenda = this.validaAgenda();
      if (validacaoAgenda) {
        this.modalTrava = true;
        axios
        .put('/evento/?tipo=agenda', this.evento)
        .then(response => {
          console.log(response.status)
          if (response.status === 200) {
            console.log(response);
            this.modalTexto = 'Atualizado com sucesso!';
          } else {
            this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
          }
          this.modalTrava = false;
        });
      } else {
        this.modalTexto = 'Um ou mais campos contém dados inválidos, verifique os dados e tente novamente.'
      }
    },
    atualizaDado: function(key, value) {
      axios
        .put('/evento/?id=' + this.evento.id, {
          id: this.evento.id,
          chave: key,
          valor: value
        })
        .then(response => (console.log(response)))
    },
    atualizaDocumentos: function() {
      this.trataDocumentos()
      axios
        .post('/evento/?id=' + this.evento.id, {
          id: this.evento.id,
          documentos: this.documentos
        })
        .then(response => (console.log(response)));
    },
    atualizaNoticia: function(id) {
      this.modalTexto= 'Enviando...';
      this.modalTrava = true;
      let dados = Object.assign({}, this.evento[id]);
      const arrayDelete = ['aberto', 'checkboxPraCegoVer', 'tipo', 'created_at'];
      arrayDelete.forEach(valor => delete dados[valor]);
      axios
        .put('/evento/?tipo=noticias', dados)
        .then(response => {
          console.log(response.status)
          if (response.status === 200) {
            console.log(response);
            this.modalTexto = 'Atualizado com sucesso!';
          } else {
            this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
          }
          this.modalTrava = false;
        });
    },
    checaPeriodo: function() {
      this.periodoValido = false;
      const dI = parseInt(this.evento.data_inicio.replaceAll('-', ''));
      const dF = parseInt(this.evento.data_termino.replaceAll('-', ''));
      if (dF > dI) {
        this.periodoValido = true;
      }
    }, 
    confirmaExclusao: function() {
      if (window.confirm("ATENÇÃO! Tem certeza que deseja excluir o evento?")) {
        axios
          .delete('/evento/', {
            params: {
              id: this.evento.id
            }
          })
          .then(response => (console.log(response)))
      }
    },
    excluiNoticia: function(key) {
      if (window.confirm("ATENÇÃO! Tem certeza que deseja excluir a notícia?")) {
        this.modalTexto= 'Enviando...';
        this.modalTrava = true;
        // Exibe modal, e recarrega página após fechar
        jQuery('#modal-eventos').modal({backdrop: 'static'});
        jQuery('#modal-eventos').on('hidden.bs.modal', function () {
          window.location.href = window.location.href;
        });
        axios
          .delete('/evento/?tipo=noticias', {data: {id: this.evento[key].id}})
          .then(response => {
            console.log(response.status)
            if (response.status === 200) {
              console.log(response);
              this.modalTexto = 'Notícia excluída com sucesso!';
            } else {
              this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
            }
            this.modalTrava = false;
          });
      }
    },
    formataData: function (data) {
      const dataObj = new Date(data);
      const dia = dataObj.getUTCDate();
      const diaString = dia.toString().padStart(2, '0');
      const mes = dataObj.getUTCMonth() + 1;
      const mesString = mes.toString().padStart(2, '0');
      let dataFinal = '';
      if (diaString != 'NaN' || mesString != 'NaN') {
        dataFinal = diaString + '/' + mesString;
      }

      return dataFinal;
    },
    formataHorario: function(horario) {
      const horarioObj = new Date("1 January, 2000 " + horario);
      const hora = horarioObj.getHours();
      const minutos = horarioObj.getMinutes();
      let horarioFinal = '';

      if (hora > 0 || minutos > 0) {
        horarioFinal = hora + 'h';
      }
      if (minutos > 0) {
        horarioFinal += minutos;
      } 

      return horarioFinal;
    },
    formataNewLine: function(texto) {
      return texto.replaceAll('\n', '<br>')
    },
    limpaCampo: function(prop, key = -1) {
      if (key >= 0) {
        this.evento[key][prop] = '';
      } else {
        this.evento[prop] = '';
      }
      this.$forceUpdate();
    },
    removeDocumento: function(indice) {
      if (window.confirm('ATENÇÃO! Tem certeza que deseja excluir este documento?')) {
        this.listaDeDocumentos.splice(indice, 1)
        this.atualizaDocumentos()
      }
    },
    trataDocumentos: function() {
      this.documentos = JSON.stringify(this.listaDeDocumentos)
    },
    validaAgenda: function() {
      if (this.evento.titulo.trim() != '' && this.evento.link.trim() != '' && this.evento.link_texto.trim() != '') {
        dI = new Date(this.evento.data_inicio);
        if (dI instanceof Date && !isNaN(dI)) {
          this.evento.data_termino = this.validaPeriodo();
          return true;
        }
      }
      return false;
    },
    validaNoticia: function() {
      if (this.novaNoticia[0].titulo.trim() != '' && this.novaNoticia[0].link.trim() != '' && this.novaNoticia[0].imagem.trim() != '') {
        return true;
      }
      return false;
    },
    validaPeriodo: function() {
      if (this.checkboxDataTermino) {
        dI = new Date(this.evento.data_inicio);
        dT = new Date(this.evento.data_termino);
        if (dT instanceof Date && !isNaN(dT)) {
          if (dT > dI) {
            return this.evento.data_termino;
          }
        }
      }
      this.checkboxDataTermino = false;
      return '';
    },
    sendForm: function(e) {
      this.trataDocumentos()
    },
    toggleVideo: function() {
      this.tipoEvento = this.isVideo ? "video" : this.tipoEvento
    },
    mudarOrdemCat(categoria, direcao) {
      const qtdCats = this.categorias.length;
      const ordemAntiga = categoria.ordem;
      const ordemNova = parseInt(categoria.ordem) + direcao;

      if (ordemNova < 1 || ordemNova > qtdCats) {
        return;
      }

      categoria.ordem = ordemNova;

      let categoriasTemp = structuredClone(this.categorias);
      categoriasTemp[ordemNova - 1].ordem = ordemAntiga;

      this.categorias = [];

      for (i = 1; i <= qtdCats; i++) {
        categoriasTemp.forEach(cat => {
          if (cat.ordem == i) {
            this.categorias.push(cat);
          }
        });
      }     
    }
  },
  computed: {

  },
  mounted() {
    // Esconde conteúdo quando JavaScript não estiver habilitado
    var conteudo = document.getElementById("appevento");
    conteudo.style.display = "block";
    
    if (!this.tipoDeEvento) {
      this.listaDeDocumentos = eventoRaw.documentos
      delete eventoRaw.documentos
    }
    if (this.tipoDeEvento == 'agenda') {
      if (this.evento.data_termino !== null) {
        this.checkboxDataTermino = true;
        this.checaPeriodo();
      }
    }
    if (this.tipoDeEvento == 'noticias') {
      this.evento.forEach(obj => {
        obj.aberto = false;
        if (obj.pracegover == '') {
          obj.checkboxPraCegoVer = false;
        } else {
          obj.checkboxPraCegoVer = true;
        }
      });
    }

    if (this.tipoDeEvento == 'videos') {
      this.videos = this.evento['videos'].reverse();
      console.log(this.videos);
      this.categorias = this.evento['categorias']

      console.log(this.categorias)
    }

  }
});
