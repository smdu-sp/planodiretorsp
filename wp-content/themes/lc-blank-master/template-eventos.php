<?php
/*
Template Name: Eventos (Agenda/ Área de Transparência)
*/
require_once('evento.php');

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    global $wpdb;
    $wpdb->show_errors();

    $id = $_GET['id'];

    if (!$id || sizeof(getEvento($id)) < 1) {
      var_dump($id);
      // echo "Evento inexistente.";
      // return;
    }

    // DELETE DO EVENTO
    if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
      $wpdb->delete('eventos_agenda', array('id' => $id));
      echo "Evento {$id} excluído.";
      return;
    }

    $evento = getEvento($id)[0];

    // PUT DO EVENTO    
    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
      $_POST = json_decode(file_get_contents("php://input"), true);
      $id = $_POST['id'];
      $chave = $_POST['chave'];
      $valor = $_POST['valor'];

      if ($chave === 'data_termino' && strlen($valor) < 10) {
        $valor = null;
      }

      $wpdb->update('eventos_agenda', array($chave => $valor), array('id' => $id));

      echo $id;
      return;
    }

    // INSERT DOCUMENTOS EVENTO
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = json_decode(file_get_contents("php://input"), true);
      echo "POST: <br>\n";
      var_dump($_POST['documentos']);
      $json = stripcslashes($_POST['documentos']);
      $documentos = json_decode($json, true);

      $wpdb->delete('documentos_evento', array('id_evento' => $id));

      foreach ($documentos as $key => $value) {
        $documentos[$key]['id_evento'] = $id;
        $wpdb->insert('documentos_evento', $documentos[$key]);
        if (!is_int($wpdb->insert_id)) {
          echo "<script>window.alert('Falha no cadastro do documento relacionado ao evento. Consulte o desenvolvedor.');</script>";
          return;
        }
      }
      echo $id;
      return;
    }

    echo "<script>const eventoRaw = " . json_encode($evento) . ";</script>";

    include_once 'modulo-vue.php';
    echo "<script type='text/javascript' src='" . $jsPath . "axios.min.js'></script>";

?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- O EVENTO EM SI -->
    <div id="appevento">
      <div class="evento form-group">
        <div>
          <h1>Editar Evento: {{evento.titulo}}</h1>
        </div>
        <div class="btn btn-danger" @click="confirmaExclusao" title="Excluir evento">Excluir evento</div>

        <div class="item-evento row" v-for="(value, key) in evento" :id="key">
          <div class="col-9">
            <!-- NECESSÁRIO REFAZER ESTE TRECHO ATRIBUINDO :type="lista.tipo" E :class="lista.classe" -->
            <label :for="'campo-' + key" v-if="key != 'data_evento' && key != 'link'">{{ listaDeLabels[0][key] }}</label>
            <label class="mt-5" :for="'campo-' + key" v-if="key == 'data_evento' || key == 'link'">{{ listaDeLabels[0][key] }}</label>
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
    </div>

    <script type="text/javascript">
      var app = new Vue({
        el: "#appevento",
        data: {
          evento: eventoRaw,
          listaDeLabels: [{
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
          }],
          listaDeDocumentos: [],
          documentos: ""
        },
        methods: {
          addDocumento: function() {
            this.listaDeDocumentos.push({
              nome: '',
              link: ''
            })
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
              .then(response => (console.log(response)))
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
          removeDocumento: function(indice) {
            if (window.confirm("ATENÇÃO! Tem certeza que deseja excluir este documento?")) {
              this.listaDeDocumentos.splice(indice, 1)
              this.atualizaDocumentos()
            }
          },
          trataDocumentos: function() {
            this.documentos = JSON.stringify(this.listaDeDocumentos)
          },
          sendForm: function(e) {
            this.trataDocumentos()
          },
          toggleVideo: function() {
            this.tipoEvento = this.isVideo ? "video" : this.tipoEvento
          }
        },
        mounted() {
          // Esconde conteúdo quando JavaScript não estiver habilitado
          var conteudo = document.getElementById("appevento");
          conteudo.style.display = "block";
          this.listaDeDocumentos = eventoRaw.documentos
          delete eventoRaw.documentos
        }
      });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
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
