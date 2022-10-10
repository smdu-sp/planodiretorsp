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
            <div v-for="categoria in categorias">
                <div>
                    {{ categoria }}
                </div>
                <div class="row">
                    <div @click="decrementaIndex(categoria)" class="col-1 player-seta"><img src="/assets/videos/seta 03.png" alt=""></div>
                    <ul class="col-10 row">
                        <li v-for="video in calculaLista(categoria)" class="col-4"><img :src="`https://img.youtube.com/vi/${video.id_video}/hqdefault.jpg`" :alt="`Assistir vídeo '${video.titulo}'`"></li>
                        </ul>
                    <div @click="incrementaIndex(categoria)" class="col-1 player-seta"><img src="/assets/videos/seta 04.png" alt=""></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var app = new Vue({
                el: '#appVideos',
                data: {
                    apiUrl: '/lista-videos/',
                    videos: {},
                    categorias: ['Vídeos Recentes'], // Nome padrão da categoria com todos os vídeos
                    qtdVideos: 3,
                    indexVideos: [],
                    carregando: true,
                    logado: false,
                },
                methods: {
                    checaLogin: function() {
                        const logado = '<?php echo is_user_logged_in() ?>';

                        if (logado) {
                            this.logado = true
                        }
                    },

                    calculaLista: function(categoria) {
                        let array = []
                        this.qtdVideos = 3;
                        
                        if(Object.keys(this.videos).length === this.categorias.length) {
                            const posicao = this.categorias.indexOf(categoria);
                            const indexAtual = this.indexVideos[posicao];
                            console.log(indexAtual);

                            for (i = indexAtual; i < this.qtdVideos + indexAtual; i++) {
                                array.push(this.videos[categoria][i])
                            }
                        }

                        return array;
                    },

                    decrementaIndex: function(categoria) {
                        const posicao = this.categorias.indexOf(categoria);
                        let indexAtual = this.indexVideos[posicao];

                        if (indexAtual < 1) {
                            return this.indexVideos[posicao] = 0;
                        }

                        this.indexVideos[posicao] -= 1;

                        this.$forceUpdate();
                    },

                    incrementaIndex: function(categoria) {
                        const posicao = this.categorias.indexOf(categoria);
                        let indexAtual = this.indexVideos[posicao];

                        if (indexAtual >= this.videos[categoria].length - this.qtdVideos) {
                            return this.indexVideos[posicao] = this.videos[categoria].length - this.qtdVideos;
                        }

                        this.indexVideos[posicao] += 1;

                        this.$forceUpdate();
                    }
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

                    axios
                        .get(this.apiUrl)
                        .then(response => {
                            // Adiciona lista com todos os vídeos
                            this.videos[this.categorias[0]] = response.data['videos'].reverse();

                            const cats = response.data['categorias'];
                            cats.forEach(cat => {
                                this.categorias[cat['ordem']] = cat['categoria'];
                            });

                            // Adiciona listas de vídeos filtradas por categorias
                            this.categorias.forEach(cat => {
                                if (cat !== this.categorias[0]) {
                                    axios
                                        .get(this.apiUrl + '?cat=' + cat)
                                        .then(response => {
                                            this.videos[cat] = response.data['videos'].reverse();
                                        })
                                        .finally(() => {
                                            // Ao carregar os vídeos de todas as categorias, encerra o carregamento
                                            if (Object.keys(this.videos).length === this.categorias.length) {
                                                this.categorias.forEach(cat => {
                                                    this.indexVideos.push(0);
                                                });
                                                this.$forceUpdate();
                                                this.carregando = false;
                                            }
                                        });
                                }
                            });
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER VÍDEOS");
                            console.log(error);
                        })
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
