var app = new Vue({
  el: "#appevento",
  data: {
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
      link_texto: 'Texto da URL'
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
      pracegover: '#PraCegoVer',
      link: 'Endereço URL',
    },
    modalTexto: '',
    modalTrava: false,
    listaDeDocumentos: [],
    periodoValido: false,
    tipoDeEvento: tipoDeEvento,
    validacaoAgenda: false
  },
  methods: {
    abreNoticia: function(key) {
      this.evento[key].aberto = true;
      this.$forceUpdate();
    },
    addDocumento: function() {
      this.listaDeDocumentos.push({
        nome: '',
        link: ''
      })
    },
    atualizaAgenda: function() {
      this.modalTexto= 'Enviando...';
      validacaoAgenda = this.validaAgenda();
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
      console.log(dados)
      const arrayDelete = ['aberto', 'checkboxPraCegoVer', 'tipo', 'created_at'];
      arrayDelete.forEach(valor => delete dados[valor]);
      console.log(dados)
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
    excluiNoticia: function(id) {
      return id;
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
  }
});
