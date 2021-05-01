<?php
/*
Template Name: Cadastro de evento
*/
require_once('evento.php');

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $camposForm = [
                'tipo',
                'tema',
                'titulo',
                'destaque',
                'descricao',
                'data',
                'hora',
                'local',
                'link',
                'documentos'
            ];

            $sqlData = [];

            foreach ($camposForm as $key => $coluna) {
                $sqlData[$coluna] = $_POST[$coluna];
            }

            var_dump($sqlData);

            global $wpdb;
            $wpdb->show_errors();

            // INSERT EVENTO
            $wpdb->insert('eventos_agenda', $sqlData);
            $idEvento = $wpdb->insert_id;

            // INSERT DOCUMENTOS EVENTO

            // TODO: CRIAR IF PARA CONFIRMAR CADASTRO
            // echo "<script>window.alert('Evento cadastrado com sucesso.');window.location.replace('" . get_site_url() . "');</script>";
        }

        $vue = get_site_url() == 'http://planodiretorsp.prefeitura.sp.gov.br/' ? 'vue.min.js' : 'vue.js';

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
        <div id="appcadastro">
            <form method="post" class="formulario-evento" enctype="multipart/form-data" v-on:submit.prevent>
                <div class="container">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="tipo">Tipo de evento</label>
                            <input class="form-control" type="text" id="tipo" name="tipo" required>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label" for="titulo">Título / Nome do evento</label>
                            <input class="form-control" type="text" id="titulo" name="titulo" required>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label" for="tema">Tema</label>
                            <input class="form-control" type="text" id="tema" name="tema">
                        </div>
                    </div>

                    <label class="form-label" for="descricao">Descrição</label>
                    <textarea class="form-control" type="text" id="descricao" name="descricao">
                    </textarea>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="destaque">Texto de destaque</label>
                            <input class="form-control" type="text" id="destaque" name="destaque">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="data">Data do evento</label>
                            <input class="form-control" type="date" id="data" name="data">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="hora">Hora do evento</label>
                            <input class="form-control" type="time" id="hora" name="hora">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="local">Local (evento presencial)</label>
                            <input class="form-control" type="text" id="local" name="local">
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="link">Link (da transmissão)</label>
                            <input class="form-control" type="text" id="link" name="link">
                        </div>
                    </div>

                    <br>
                    <span>Documentos</span>
                    <div>
                        <div v-for="documento, key in documentos" class="row mb-3">
                            <div class="col-5">
                                <label class="form-label" :for="`nome-`+key">Descrição:</label>
                                <input class="form-control" type="text" :id="`nome-`+key">
                            </div>
                            <div class="col-5">
                                <label class="form-label" :for="`link-`+key">Link:</label>
                                <input class="form-control" type="text" :id="`link-`+key">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger" @click.prevent="removeDocumento(key)">Remover documento</button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success btn-large" @click.prevent="addDocumento">Adicionar documento</button>
                    </div>
                </div>
            </form>
        </div>
        <style>
            #appcadastro {
                margin-top: 130px;
            }

            form.formulario-evento * {
                font-size: 16px;
            }
        </style>
        <script type="text/javascript">
            var app = new Vue({
                el: "#appcadastro",
                data: {
                    documentos: [],
                    temas: [],
                    tipos: []
                },
                methods: {
                    addDocumento: function(nomeDocumento, linkDocumento) {
                        this.documentos.push({
                            nome: nomeDocumento,
                            link: linkDocumento
                        })
                    },
                    removeDocumento: function(indice) {
                        this.documentos.splice(indice, 1);
                    }
                }
            })
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
    endwhile;
endif;
get_footer();
?>