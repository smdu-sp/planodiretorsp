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
    novoVideo: [{
      categoria: '',
      titulo: '',
      link: '',
      imagem: '',
    }],
    listaDeDocumentos: [],
    periodoValido: false,
    tipoDeEvento: tipoDeEvento,
    validacaoAgenda: false,
    categorias: [],
    categoriasOrdenadas: [],
    editarCat: false,
    videos: [],
    videosCampos: ['categoria', 'titulo', 'link', 'imagem'],
    videosLabels: {
      titulo: 'Título',
      link: 'Link',
      categoria: 'Categoria',
      imagem: 'Imagem - deixar em branco para utilizar a do YouTube'
    },
    videosModo: '',
    ordenacaoHabilitada: true,
    ordenacaoPendente: false,
    destaque: {
      aberto: false,
      idInicial: '',
      id: ''
    },
    detaqueAntigo: '',
    videoAtual: {
      aberto: false
    }
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
    abrirVideo: function(key) {
      this.resetarVideos();
      this.resetarCategorias();

      if (key == 'novo') {
        this.novoVideo[0].aberto = true;
      } else if (key == 'destaque') {
        this.destaque.aberto = true;
      } else if (key == 'cat') {
        this.editarCat = true;
      } else if (key >= 0) {
        this.videos[key].aberto = true;
        this.ordenacaoHabilitada = false;
      }

      this.$forceUpdate();
    },
    fecharVideo: function(key) {            
      this.resetarVideos();
      this.resetarCategorias();

      if (key == 'novo') {
        this.novoVideo[0].aberto = false;
      } else if (key == 'destaque') {
        this.destaque.aberto = false;
      } else if (key == 'cat') {
        this.editarCat = false;
      } else if (key == 'ordenacao') {
        this.ordenacaoPendente = false;
      } else if (key >= 0) {
        this.videos[key].aberto = false;
        this.ordenacaoHabilitada = true;
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
    atualizaVideo: function(id) {
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
    calcularIdVideo: function(url) {
      if (url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match&&match[7].length==11)? match[7] : false;
      }
      return false;
    },
    thumbYT: function(videoUrl, index = -1, id = false) {
      let mostrarImagem = false;
      let idVideo = '';
      let imagem = '';

      if (id) {
        idVideo = id;
      } else {
        idVideo = this.calcularIdVideo(videoUrl)
      }

      if (index < 0) {
        imagem = this.novoVideo[0].imagem;
      } else if (this.videos.length > 0) {
        imagem = this.videos[index].imagem;
      }

      if (!imagem) {
        imagem = '';
      }

      if (!imagem.trim() && idVideo) {
        mostrarImagem = true;
      }

      return mostrarImagem;
    },
    imagemVideo: function(videoUrl, index = -1, id =false) {
      let idVideo = '';

      if (id) {
        idVideo = videoUrl;
      } else {
        idVideo = this.calcularIdVideo(videoUrl);
      }

      return `https://img.youtube.com/vi/${idVideo}/hqdefault.jpg`;
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
    excluiVideo: function(key) {
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
    resetarVideos() {
      this.videos = [];
      this.destaque['idInicial'] = '';
      this.destaque['id'] = '';
      this.videos = structuredClone(this.evento['videos']);
      this.videos.reverse();
      this.videos.forEach(video => {
        video['aberto'] = false;
        video['link'] = `https://youtu.be/${video.id_video}`
        
        if(video['destacado'] == 1) {
          this.destaque['idInicial'] = video['id'];
          this.destaque['id'] = video['id'];
        }
      });
    },
    resetarCategorias() {
      this.categorias = [];
      this.categorias = structuredClone(this.evento['categorias']);
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
    },
    mudarOrdemVideos(video, direcao) {
      const qtdVideos = this.videos.length;
      const ordemAntiga = video.ordem;
      const ordemNova = parseInt(video.ordem) - direcao;

      if (ordemNova < 1 || ordemNova > qtdVideos) {
        return;
      }

      this.ordenacaoPendente = true;

      video.ordem = ordemNova;

      let videosTemp = structuredClone(this.videos);
      videosTemp[qtdVideos - ordemNova].ordem = ordemAntiga;

      this.videos = [];

      for (let i = qtdVideos; i > 0; i--) {
        videosTemp.forEach(video => {
          if (video.ordem == i) {
            this.videos.push(video);
          }
        });
      }
    },
    addVideo() {
      this.modalTexto= 'Enviando...';
      let validacaoVideo = this.validarVideo(this.novoVideo[0]);
      this.novoVideo[0].ordem = this.videos.length + 1;
      if (validacaoVideo) {
        this.modalTrava = true;
        // Recarrega após fechar o Modal
        jQuery('#modal-eventos').on('hidden.bs.modal', function () {
          window.location.href = window.location.href;
        });
        let dados = Object.assign({}, this.novoVideo[0]);
        axios
          .post('/evento/?tipo=videos', dados)
          .then(response => {
            console.log(response.status)
            if (response.status === 200) {
              console.log(response);
              this.modalTexto = 'Vídeo adicionado com sucesso!';
            } else {
              this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
            }
            this.modalTrava = false;
          });
      } else {
        this.modalTexto = 'Um ou mais campos contém dados inválidos, verifique os dados e tente novamente.'
      }
    },
    validarVideo(video) {
      video.idVideo = this.calcularIdVideo(video.link);
      if (video.idVideo && video.idVideo.length == 11 && video.categoria.length > 0 && video.titulo.length > 0) {
        return true;
      }
      return false;
    },
    destacarVideo() {
      this.modalTexto= 'Enviando...';
      let dados = Object.assign({tipo: 'destaque'}, this.destaque);
      this.modalTrava = true;

      axios
        .put('/evento/?tipo=videos', dados)
        .then(response => {
          console.log(response.status)
          if (response.status === 200) {
            console.log(response);
            this.modalTexto = 'Atualizado com sucesso!';
            this.destaque.idInicial = this.destaque.id;
          } else {
            this.modalTexto = 'Falha no envio, tente novamente mais tarde.'
          }
          this.modalTrava = false;
        });
    },
    atualizarCategorias() {
      return;
    },
    atualizarVideo() {
      return;
    },
    atualizarOrdem(tipo) {
      return;
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
      this.resetarVideos();
      this.resetarCategorias();
    }
  }
});
