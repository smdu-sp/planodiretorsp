<?php
/*
Template Name: Vídeos
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        include_once 'modulo-vue.php';
        echo "<script type='text/javascript' src='" . $jsPath . "axios.min.js'></script>";
        
?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div id="appVideos" class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-1 player-seta"><img src="/assets/videos/seta 01.png" alt=""></div>
                        <div class="col-10 player-container"><img src="/assets/videos/player de vídeo grande_1060x630.png" alt=""></div>
                        <div class="col-1 player-seta"><img src="/assets/videos/seta 02.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1 player-seta"><img src="/assets/videos/seta 03.png" alt=""></div>
                <div class="col-10 row">
                    <div v-for="video in videos" class="col-4"><img :src="`https://img.youtube.com/vi/${video.id_video}/hqdefault.jpg`" :alt="`Assistir vídeo '${video.titulo}'`"></div>
                </div>
                <div class="col-1 player-seta"><img src="/assets/videos/seta 04.png" alt=""></div>
            </div>
        </div>

        <script type="text/javascript">
            var app = new Vue({
                el: '#appVideos',
                data: {
                    apiUrl: '/lista-videos/',
                    videos: [],
                    videosCategorizados: {},
                    listaCategorias: ['Vídeos Recentes'],
                    carregando: true,
                    logado: false,
                    indexVideos: []
                },
                methods: {
                    checaLogin: function() {
                        const logado = '<?php echo is_user_logged_in() ?>';

                        if (logado) {
                            this.logado = true
                        }
                    },
                    separaVideosPorCategoria: function() {
                        const todos = this.listaCategorias[0];
                        if (this.videos[0][todos].length > 0) {
                            this.videos[0][todos].forEach(video => {
                                this.listaCategorias.push(video['categoria']);
                            })

                            // Remove as categorias duplicadas
                            this.listaCategorias = [... new Set(this.listaCategorias)];
                            console.log(this.listaCategorias);
                        }

                        for (let i = 1; i < this.listaCategorias.length; i++) {

                            this.videos[i] = {};
                            this.videos[i][this.listaCategorias[i]] = [];

                            this.videos[0][todos].forEach(video => {
                                if (video['categoria'] === this.listaCategorias[i]) {
                                    this.videos[i][this.listaCategorias[i]].push(video);
                                }
                            });
                        }
                    },
                },
                computed: {

                },
                created() {
                    this.checaLogin()
                },
                mounted() {
                    // Esconde conteúdo quando JavaScript não estiver habilitado
                    var conteudo = document.getElementById("appVideos");
                    conteudo.style.display = "block";

                    axios.get(this.apiUrl)
                        .then(response => {
                            this.videos = [response.data];
                            this.videos[0].videos.reverse();

                            // Renomeia a chave com todos os vídeos
                            delete Object.assign(this.videos[0], {[this.listaCategorias[0]]: this.videos[0]['videos']}).videos

                            this.separaVideosPorCategoria();
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER VÍDEOS");
                            console.log(error);
                        })
                        .finally(() => {
                            this.carregando = false;
                        });
                }
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
            .player-seta {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
        </style>

<?php
    endwhile;
endif;

get_footer();
?>
