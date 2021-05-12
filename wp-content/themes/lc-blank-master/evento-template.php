<?php
/*
Template Name: Evento agenda
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

    $vue = 'vue.min.js';

    $isLocalhost = get_site_url() == 'http://localhost/planodiretorsp';

    // include local
    if ($localhosting) {
      echo "<script type='text/javascript' src='./wp-content/themes/lc-blank-master/{$vue}'></script>";
      echo "<script type='text/javascript' src='./wp-content/themes/lc-blank-master/axios.min.js'></script>";
    } else {
      echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vue}'></script>";
      echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/axios.min.js'></script>";
    }

?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- O EVENTO EM SI -->
    <div id="appevento">
      <div class="evento form-group">
        <div>{{evento.titulo}}</div>
        <div class="btn btn-danger" @click="confirmaExclusao" title="Excluir evento">Excluir evento</div>

        <div class="item-evento row" v-for="(value, key) in evento">
          <div class="col-2">{{key}}</div>
          <div class="col">
            <input class="form-control" type="text" v-model="evento[key]" @change="atualizaDado(key, value)" :key="key">
          </div>
        </div>
        Lista de documentos
        <div class="row" v-for="(value, key) in listaDeDocumentos" :key="key">
          <div class="col-2">
            <input type="text" v-model="value.nome" @change="atualizaDocumentos()" placeholder="Nome do documento">
          </div>
          <div class="col">
            <input type="text" v-model="value.link" @change="atualizaDocumentos()" placeholder="URL (link)">
          </div>
          <div class="col-1">
            <div class="btn btn-danger" @click="removeDocumento(key)">
              Remover documento
            </div>
          </div>
        </div>
        <div @click="addDocumento" class="btn btn-primary">Adicionar documento</div>
      </div>
    </div>

    <script type="text/javascript">
      var app = new Vue({
        el: "#appevento",
        data: {
          evento: eventoRaw,
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
          this.listaDeDocumentos = eventoRaw.documentos
          delete eventoRaw.documentos
        }
      });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php

  endwhile;
endif;

get_footer();
