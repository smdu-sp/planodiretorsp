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
                'data_evento',
                'hora_evento',
                'local',
                'link',
                'documentos'
            ];

            $sqlData = [];

            foreach ($camposForm as $key => $coluna) {
                if ($coluna !== 'documentos') {
                    $sqlData[$coluna] = $_POST[$coluna];
                }
            }

            global $wpdb;
            $wpdb->show_errors();

            // INSERT EVENTO
            $wpdb->insert('eventos_agenda', $sqlData);
            $idEvento = $wpdb->insert_id;
            if (!is_int($idEvento)) {
                echo "<script>window.alert('Falha no cadastro do evento. Consulte o desenvolvedor.');</script>";
                return;
            }

            // INSERT DOCUMENTOS EVENTO
            $json = stripcslashes($_POST['documentos']);
            $documentos = json_decode($json, true);

            foreach ($documentos as $key => $value) {
                $documentos[$key]['id_evento'] = $idEvento;
                $wpdb->insert('documentos_evento', $documentos[$key]);
                if (!is_int($wpdb->insert_id)) {
                    echo "<script>window.alert('Falha no cadastro do documento relacionado ao evento. Consulte o desenvolvedor.');</script>";
                    return;
                }
            }

            echo "<script>window.alert('Evento cadastrado com sucesso.');</script>";
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
            <form method="post" class="formulario-evento" enctype="multipart/form-data;charset=UTF-8" @submit="sendForm" action="<?php echo get_permalink(); ?>">
                <div class="container">
                    <h1 class="display-1">Cadastro de evento</h1>
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

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="imagem" class="form-label">Link da imagem</label>
                            <input type="text" class="form-control mb-3" placeholder="Ex.: http://url.com/imagem.jpg" id="imagem" name="imagem" v-model="imagem">
                            <img :src="imagem" class="rounded" style="height: 200px">
                        </div>
                        <div class="col">
                            <label class="form-label" for="descricao">Descrição</label>
                            <textarea class="form-control" type="text" id="descricao" name="descricao" style="height: 250px;">
                            </textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="destaque">Texto de destaque</label>
                            <input class="form-control" type="text" id="destaque" name="destaque">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="data_evento">Data do evento</label>
                            <input class="form-control" type="date" id="data_evento" name="data_evento">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="hora_evento">Hora do evento</label>
                            <input class="form-control" type="time" id="hora_evento" name="hora_evento">
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
                        <div v-for="documento, key in listaDeDocumentos" class="row mb-3">
                            <div class="col-5">
                                <label class="form-label" :for="`nome-`+key">Descrição:</label>
                                <input class="form-control" type="text" :id="`nome-`+key" v-model="documento['nome']">
                            </div>
                            <div class="col-5">
                                <label class="form-label" :for="`link-`+key">Link:</label>
                                <input class="form-control" type="text" :id="`link-`+key" v-model="documento['link']">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger" @click.prevent="removeDocumento(key)">Remover documento</button>
                            </div>
                        </div>
                    </div>
                    <div style="display: none">
                        <input type="text" id="documentos" v-model="documentos" name="documentos" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info btn-lg" @click.prevent="addDocumento()">Adicionar documento</button>
                    </div>
                    <div class="my-5">
                        <div class="justify-content-md-center">
                            <input type="submit" value="Salvar evento" class="btn btn-success" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <style>
            #appcadastro {
                margin-top: 130px;
            }

            h1 {
                font-family: sans-serif !important;
                padding: 0;
                margin: 0;
                padding-top: 0 !important;
                margin-bottom: 30px;
                color: #333;
            }

            form.formulario-evento * {
                font-size: 16px;
            }
        </style>
        <script type="text/javascript">
            var app = new Vue({
                el: "#appcadastro",
                data: {
                    documentos: "",
                    listaDeDocumentos: [],
                    temas: [],
                    tipos: [],
                    imagem: null
                },
                methods: {
                    addDocumento: function() {
                        this.listaDeDocumentos.push({
                            nome: '',
                            link: ''
                        })
                    },
                    removeDocumento: function(indice) {
                        this.listaDeDocumentos.splice(indice, 1)
                    },
                    trataDocumentos: function() {
                        this.documentos = JSON.stringify(this.listaDeDocumentos)
                    },
                    sendForm: function(e) {
                        this.trataDocumentos()
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