<?php
/*
Template Name: Área de Transparência
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $vuedev = 'vue.js';
        $vue = 'vue.min.js';

        $isLocalhost = get_site_url() == 'http://localhost/planodiretorsp';

        // include local
        if ($isLocalhost) {
            echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vuedev}'></script>";
            echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/axios.min.js'></script>";
        } else {
            echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vue}'></script>";
            echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/axios.min.js'></script>";
        }
?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div id="appvideos" class="container">
            <div v-if="carregando" style="color: gray">Carregando vídeos...</div>
            <!-- VÍDEOS RECENTES -->
            <div class="row card-video" v-for="video in videosRecentes">
                <?php require('modulo-video.php'); ?>
            </div>
            <div v-if="!carregando" class="row mais-videos fechado" @click="alternaMaisVideos">
                <div class="col decorativo">
                </div>
                <div class="col-xs-2">
                    <h2 class="">&nbsp;+ vídeos&nbsp;</h2>
                </div>
                <div class="col decorativo">
                </div>
                <div v-if="abreMaisVideos" class="container-mais-videos">
                    <div class="row card-video" v-for="video in videos">
                        <?php require('modulo-video.php'); ?>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            const listaVideos = "<?php echo $isLocalhost ? '../lista-videos/' : '/lista-videos/' ?>";
            var app = new Vue({
                el: '#appvideos',
                data: {
                    arrayMeses: ['JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'],
                    videos: [],
                    videosRecentes: [],
                    carregando: true,
                    abreMaisVideos: false,
                    logado: false,
                },
                methods: {
                    formataData: function(dateStr) {
                        let dia = new Date(dateStr).getUTCDate()
                        let mes = this.arrayMeses[new Date(dateStr).getUTCMonth()]
                        let ano = new Date(dateStr).getUTCFullYear()
                        let dataRetorno = (dia < 10 ? "0" : "") + dia + ". " + mes + ". " + ano
                        return dataRetorno.toLowerCase()
                    },
                    checaLogin: function() {
                        if ("<?php echo is_user_logged_in() ?>")
                            this.logado = true
                    },
                    separaVideosRecentes: function() {
                        if (this.videos.length > 0) {
                            for (let quantidade = 3; quantidade > 0; quantidade--) {
                                if (this.videos.length > 0) {
                                    this.videosRecentes.push(this.videos.shift())
                                } else {
                                    return
                                }
                            }
                        }
                    },
                    alternaMaisVideos: function() {
                        document.getElementsByClassName("mais-videos")[0].classList.toggle("fechado")

                        if (!this.abreMaisVideos) {
                            this.abreMaisVideos = true;
                        }
                    }
                },
                mounted() {
                    axios.get(listaVideos)
                        .then(response => {
                            this.videos = response.data.videos.reverse()
                            this.separaVideosRecentes()
                            this.checaLogin()
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER VÍDEOS")
                            console.log(error)
                        })
                        .finally(() => this.carregando = false)
                }
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
    endwhile;
endif;

get_footer();
?>