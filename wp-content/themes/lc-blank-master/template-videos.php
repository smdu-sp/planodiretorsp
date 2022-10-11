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
            <div v-for="categoria, index in categorias">
                <div v-if="categoriaSelecionada && index === categorias.indexOf(categoriaSelecionada)" class="row container-video">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1 player-seta" @click="proximoVideo(videoSelecionado, categoriaSelecionada, -1)"><button><img src="/assets/videos/seta 01.png" alt=""></button></div>
                            <div v-if="videoSelecionado" class="col-10 d-flex justify-content-center ">
                                <div class="container-player embed-responsive embed-responsive-16by9">
                                    <iframe :src="`https://youtube.com/embed/${videoSelecionado.id_video}`" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-1 player-seta"><button><img src="/assets/videos/seta 02.png" alt="" @click="proximoVideo(videoSelecionado, categoriaSelecionada, 1)"></button></div>
                        </div>
                    </div>
                </div>
                <div>
                    <span :class="{ active: categoriaSelecionada === categoria }">
                        {{ categoria }}
                    </span>
                    <div class="row">
                        <div class="col-1 player-seta" @click="decrementaIndex(categoria)"><button><img src="/assets/videos/seta 03.png" alt=""></button></div>
                        <div class="col-10">
                            <ul class="row">
                                <li v-for="video in calculaLista(categoria)" class="col-4" @click="selecionarVideo(video, categoria)">
                                    <div class="d-flex align-items-center container-thumbnail" :class="{ active: videoSelecionado.index === video.index && categoriaSelecionada === categoria }">
                                        <div class="d-flex align-items-center thumbnail">
                                            <img :src="`https://img.youtube.com/vi/${video.id_video}/hqdefault.jpg`" :alt="`Assistir vídeo '${video.titulo}'`">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div @click="incrementaIndex(categoria)" class="col-1 player-seta"><button><img src="/assets/videos/seta 04.png" alt=""></button></div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var app = new Vue({
                el: '#appVideos',
                data: {
                    apiUrl: '/lista-videos/',
                    videos: {},
                    videoSelecionado: {},
                    categoriaSelecionada: '',
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
                    },

                    selecionarVideo: function(video, categoria) {
                        this.videoSelecionado = video;
                        this.categoriaSelecionada = categoria;
                        const posicao = this.categorias.indexOf(categoria);

                        console.log(posicao)
                        console.log(video.index)
                        console.log(this.indexVideos[posicao])

                        if (video.index < this.indexVideos[posicao]) {
                            this.indexVideos[posicao] -= 1;
                        }

                        if (video.index > this.indexVideos[posicao] + 2) {
                            this.indexVideos[posicao] += 1;
                        }
                    },

                    proximoVideo: function(video, categoria, direcao) {
                        const indexAtual = video['index'];

                        if (indexAtual + direcao < 0) {
                            return;
                        }

                        if (indexAtual + direcao >= this.videos[categoria].length) {
                            return;
                        }

                        this.selecionarVideo(this.videos[categoria][indexAtual + direcao], categoria);
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
                                                // Inicializa index, vídeo e categorias selecionadas
                                                this.categorias.forEach(cat => {
                                                    this.indexVideos.push(0);

                                                    this.videos[cat].forEach((video, index) => {
                                                        video['index'] = index;
                                                    });
                                                });
                                                this.selecionarVideo(this.videos[this.categorias[0]][0], this.categorias[0]);
                                                this.carregando = false;
                                                this.$forceUpdate();
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

            .active {
                background-color: #b8caf7;
            }

            .container-thumbnail {
                border-radius: 8px;
            }

            .thumbnail {
                overflow: hidden;
                max-height: calc((975px / 3 - 30px) * 9 / 16);
                margin: 10px;
                border-radius: 8px;
            }

            .player-seta button {
                background-color: #fff;
            }

            .player-seta button:active {
                background: #fff;
                box-shadow: inset 0px 0px 5px #ddd;
                outline: none;
            }

            .player-seta button:focus, 
            .player-seta button:focus-visible {
                outline: none;
            }

            .container-player {
                margin-left: 15px;
                margin-right: 15px;
            }
        </style>

<?php
    endwhile;
endif;

get_footer();
?>
