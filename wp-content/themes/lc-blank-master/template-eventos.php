<?php
/*
Template Name: Eventos (Agenda/ Área de Transparência)
*/

require_once 'eventos/evento.php';

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    global $wpdb;
    $wpdb->show_errors();

    if ($_GET['tipo'] == 'agenda') { 
      require_once 'eventos/agenda-participativa.php';
    }
    
    else if ($_GET['tipo'] == 'noticias') { 
      require_once 'eventos/noticias.php';
    }
    
    else {
      require_once 'eventos/eventos.php';
    }

    echo "<script>const eventoRaw = " . json_encode($evento) . "; const tipoDeEvento = '{$_GET['tipo']}'</script>";

    include_once 'modulo-vue.php';
    echo "<script type='text/javascript' src='" . $jsPath . "axios.min.js'></script>";

?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- O EVENTO EM SI -->
    <div id="appevento">
      <!-- Modal de envio -->
      <div backdrop="static" class="modal fade" id="modal-eventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Atualizar {{ tipoDeEvento == 'agenda' ? 'Agenda Participativa' : 'Notícias'}}</h5>
            </div>
            <div class="modal-body" v-html="modalTexto">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" :disabled="modalTrava">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <div v-if="!tipoDeEvento" class="evento form-group">
        <div>
          <h1>Editar Evento: {{evento.titulo}}</h1>
        </div>
        <div class="btn btn-danger" @click="confirmaExclusao" title="Excluir evento">Excluir evento</div>

        <div v-if="tipoDeEvento"><p>{{tipoDeEvento}}</div></p>

        <div class="item-evento row" v-for="(value, key) in evento" :id="key">
          <div class="col-9">
            <!-- NECESSÁRIO REFAZER ESTE TRECHO ATRIBUINDO :type="lista.tipo" E :class="lista.classe" -->
            <label :for="'campo-' + key" v-if="key != 'data_evento' && key != 'link'">{{ labelsEventos[key] }}</label>
            <label class="mt-5" :for="'campo-' + key" v-if="key == 'data_evento' || key == 'link'">{{ labelsEventos[key] }}</label>
            <input class="form-control" type="text" v-if="key != 'descricao' && key != 'hora_evento' && key != 'data_evento' && key != 'data_termino'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
            <textarea class="form-control" v-if="key == 'descricao'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key"></textarea>
            <input class="form-control" type="date" v-if="key == 'data_evento' || key == 'data_termino'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
            <input class="form-control" type="time" v-if="key == 'hora_evento'" v-model="evento[key]" @change="atualizaDado(key, value)" :id="'campo-' + key" :key="key">
          </div>
        </div>
        <div class="evento-documentos">
          <h2>Lista de documentos</h2>
          <div class="row" v-for="(value, key) in listaDeDocumentos" :key="key">
            <div class="col-2">
              <label :for="'nome-documento-' + key">Nome do documento</label>
              <input class="form-control" type="text" :id="'nome-documento-' + key" v-model="value.nome" @change="atualizaDocumentos()">
            </div>
            <div class="col-4">
              <label :for="'url-documento-' + key">URL (link)</label>
              <input class="form-control" type="text" :id="'url-documento-' + key" v-model="value.link" @change="atualizaDocumentos()">
            </div>
            <div class="col-1 botao-remover">
              <div class="btn btn-danger" @click="removeDocumento(key)">
                Remover documento
              </div>
            </div>
          </div>
          <div @click="addDocumento" class="btn btn-primary">
            Adicionar documento
          </div>
        </div>
      </div>

      <!-- AGENDA PARTICIPATIVA -->
      <div v-if="tipoDeEvento == 'agenda'" class="evento form-group">
        <div>
          <h1>Agenda Participativa</h1>
        </div>
        <div class="row">
          <div class="item-evento col-5">
            <div class="row" v-for="(value, key) in evento" :id="key">
              <div class="col">
                <label :for="'campo-' + key">{{labelsAgenda[key]}}</label>
                <input class="ml-1" v-if="key == 'data_termino'" type="checkbox" v-model='checkboxDataTermino'>
                <input class="form-control mb-2" type="text" v-if="key != 'data_inicio' && key != 'data_termino' && key != 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_inicio'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
                <input class="form-control mb-2" type="date" v-if="key == 'data_termino'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key" :disabled="!checkboxDataTermino" @change="checaPeriodo">
                <input class="form-control mb-2" type="time" v-if="key == 'horario'" v-model="evento[key]" :id="'campo-' + key" :key="key" :name="key">
              </div>
            </div>  
          </div>
          <div class="col-7">
            <?= do_shortcode('[shortcodeAgendaParticipativa]'); ?>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <button @click="atualizaAgenda" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">
              Atualizar Agenda
            </button>
          </div>
        </div>
      </div>
      
      <!-- NOTÍCIAS -->
      <div id="noticias" v-if="tipoDeEvento == 'noticias'" class="evento form-group">
        <div>
          <h1>Notícias</h1>
        </div>
        <div v-for="noticia, key in evento">
          <div class="row">
            <div :id="'noticia-' + key" class="col-6">
              <button type="button" class="btn btn-primary" v-if="!noticia.aberto" @click="abreNoticia(key)">
                Editar
              </button>
              <div v-if="noticia.aberto">
                <div v-for="valor, prop in noticia">
                  <label :for="prop + '-' + key">{{labelsNoticias[prop]}}</label>
                  <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="noticia['checkboxPraCegoVer']" @change="limpaCampo(prop, key)">
                  <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'titulo' || prop =='imagem' || prop == 'link'" type="text" v-model="noticia[prop]">
                  <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'pracegover'" type="text" v-model="noticia[prop]" :disabled="!noticia['checkboxPraCegoVer']">
                </div>
                <div class="row justify-content-end">
                  <div class="col-auto"><button @click="excluiNoticia" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Excluir</button></div>
                  <div class="col-auto"><button @click="atualizaNoticia(key)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-eventos" data-backdrop="static">Atualizar</button></div>
                </div>
              </div>
            </div>
            <?php include 'noticias/single.php' ?>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
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
              .put('<?php echo get_permalink(); ?>' + '?tipo=agenda', this.evento)
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
              .put('<?php echo get_permalink(); ?>' + '?id=' + this.evento.id, {
                id: this.evento.id,
                chave: key,
                valor: value
              })
              .then(response => (console.log(response)))
          },
          atualizaDocumentos: function() {
            this.trataDocumentos()
            axios
              .post('<?php echo get_permalink(); ?>' + '?id=' + this.evento.id, {
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
              .put('<?php echo get_permalink(); ?>' + '?tipo=noticias', dados)
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
                .delete('<?php echo get_permalink(); ?>', {
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
      .modal-title {
        font-size: 20px;
      }

      .btn, .modal-body {
        font-size: 16px;
      }

      #appevento {
        width: 1200px;
        margin: auto;
      }

      .evento h1 {
        margin: 20px 0;
        font-size: 2.5em !important;
      }

      .evento .item-evento {
        padding-top: 5px !important;
      }

      label,
      .evento .item-nome,
      .evento input,
      .evento  textarea {
        font-size: 16px;
      }

      .evento .item-nome {
        margin: auto 0;
      }

      .evento .evento-documentos {
        margin: 30px 0 10px 0;
      }

      .evento .evento-documentos input {
        margin-bottom: 5px;
      }

      .evento #id,
      .evento #created_at,
      .evento #updated_at {
        display: none;
      }

      .botao-remover {        
        align-self: flex-end;
      }

      .botao-remover .btn {
        font-size: 1.5rem;
      }

      input[type=time],
      input[type=date] {
        width: 180px;
      }
    </style>

<?php

  endwhile;
endif;

get_footer();
