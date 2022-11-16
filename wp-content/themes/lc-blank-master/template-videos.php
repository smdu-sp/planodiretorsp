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
            <?php if (is_user_logged_in()) { ?>
                <a  style="display: inline-block; font-size: 16px; vertical-align: super; margin-bottom: 30px;" href="/evento/?tipo=videos" class="btn btn-primary">Editar Vídeos</a><?php
            } ?>
            <div v-for="categoria, index in categorias" class="videos-desktop">
                <div v-if="categoriaSelecionada && index === categorias.indexOf(categoriaSelecionada)" class="row container-video" :id="`player-${categoria.toLowerCase().replace(' ', '-')}`">
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
                <div class="categoria row">
                    <div class="col-1 player-seta" @click="decrementaIndex(categoria)"><button><img v-if="calculaLista(categoria).length > 0" src="/assets/videos/seta 03.png" alt=""></button></div>
                    <div class="col-10">
                        <h2 class="titulo" :class="{ active: categoriaSelecionada === categoria }">
                            {{ categoria }}
                        </h2>
                        <div v-if="calculaLista(categoria).length === 0">
                            <span class="sem-videos">Nenhum vídeo para exibir</span>
                        </div>
                        <ul class="row">
                            <li v-for="video in calculaLista(categoria)" class="col-4" @click="selecionarVideo(video, categoria)">
                                <div class="d-flex align-items-center container-thumbnail" :class="{ active: videoSelecionado.index === video.index && categoriaSelecionada === categoria }">
                                    <div class="d-flex align-items-center thumbnail">
                                        <img v-if="video.imagem && video.imagem.trim().length > 0" :src="video.imagem" :alt="`Assistir vídeo '${video.titulo}'`">
                                        <img v-if="!video.imagem" :src="`https://img.youtube.com/vi/${video.id_video}/maxresdefault.jpg`" :alt="`Assistir vídeo '${video.titulo}'`">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div @click="incrementaIndex(categoria)" class="col-1 player-seta"><button><img v-if="calculaLista(categoria).length > 0" src="/assets/videos/seta 04.png" alt=""></button></div>
                </div>
            </div>
            <div class="videos-mobile">
                <div class="container-categorias-mobile" v-for="categoria, index in categoriasMobile">
                    <ul aria-label="Categorias de vídeos">
                        <li v-if="videos[categoria.nome].length > 0">
                            <button class="titulo-categoria-mobile" :aria-controls="`conteudo-${index}`" :aria-expanded="categoria.aberto" @click="toggleCategoria(categoria)">
                                <span class="mobile-mais" v-if="!categoria.aberto">+</span><span  class="mobile-menos" v-if="categoria.aberto">–</span>{{ categoria.nome }}
                            </button>
                            <ul class="container-videos-mobile" :aria-label="`Vídeos de ${categoria.nome}`" :aria-hidden="!categoria.aberto" v-show="categoria.aberto" >
                                <li v-for="video in videos[categoria.nome]">
                                    <div class="d-flex align-items-center container-thumbnail">
                                        <a :href="`https://youtu.be/${video.id_video}`">
                                            <div class="d-flex align-items-center thumbnail">
                                                <img v-if="video.imagem && video.imagem.trim().length > 0" :src="video.imagem" :alt="`Assistir vídeo '${video.titulo}'`">
                                                <img v-if="!video.imagem" :src="`https://img.youtube.com/vi/${video.id_video}/maxresdefault.jpg`" :alt="`Assistir vídeo '${video.titulo}'`">
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                    categorias: [],
                    categoriasMobile: [],
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
                        let qtdVideos = this.qtdVideos;

                        if(Object.keys(this.videos).length === this.categorias.length) {
                            if (qtdVideos > this.videos[categoria].length) {
                                qtdVideos = this.videos[categoria].length;
                            }

                            const posicao = this.categorias.indexOf(categoria);
                            const indexAtual = this.indexVideos[posicao];

                            for (i = indexAtual; i < qtdVideos + indexAtual; i++) {
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
                            const novoIndex = this.videos[categoria].length - this.qtdVideos;
                            if (novoIndex > 0) {
                                this.indexVideos[posicao] = novoIndex;
                            }
                            return
                        }

                        this.indexVideos[posicao] += 1;


                        this.$forceUpdate();
                    },

                    selecionarVideo: function(video, categoria) {
                        let videoAnterior = this.videoSelecionado;
                        this.videoSelecionado = video;
                        this.categoriaSelecionada = categoria;
                        const posicao = this.categorias.indexOf(categoria);

                        // Evita scroll após primeiro carregamento da página
                        if (Object.keys(videoAnterior).length > 0) {
                            this.scrollToVideo(categoria);
                        }

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
                    },

                    toggleCategoria(cat) {
                        cat.aberto = !cat.aberto;
                    },

                    scrollToVideo(cat) {
                        // Offset = header + 10px
                        offset = -150;

                        if (this.logado) {
                            offset = -182;
                        }

                        const id = 'player-' + cat.toLowerCase().replace(' ', '-');
                        let yOffset = offset; 
                        const element = document.getElementById(id);

                        // Caso o player não tenha renderizado ainda, espera 100ms e tenta novamente
                        if (element === null) {
                            setTimeout(() => {
                                this.scrollToVideo(cat)
                            }, 100);
                            return
                        }
                        const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

                        window.scrollTo({top: y, behavior: 'smooth'});
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
                            if (response.data['videos'].length === 0) {
                                console.log("Sem vídeos para exibir");
                                this.categorias[0] = response.data['categorias'][0].categoria;
                                this.$forceUpdate();
                                return;
                            }

                            const cats = response.data['categorias'];
                            cats.forEach(cat => {
                                this.categorias[cat['ordem'] - 1] = cat['categoria'];
                            });

                            // Adiciona lista com todos os vídeos
                            this.videos[this.categorias[0]] = response.data['videos'].reverse();

                            const todosVideos = this.videos[this.categorias[0]]

                            for (let i = 0; i < todosVideos.length; i++) {
                                if (todosVideos[i].destacado == 1) {
                                    const videoDestacado = structuredClone(todosVideos[i]);
                                    todosVideos.splice(i, 1);
                                    todosVideos.splice(0, 0, videoDestacado);
                                }
                            }

                            // Adiciona listas de vídeos filtradas por categorias
                            this.categorias.forEach((cat, catIndex) => {
                                if (cat !== this.categorias[0]) {
                                    axios
                                        .get(this.apiUrl + '?cat=' + catIndex)
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

                                    // Cria array com categorias para uso no layout mobile
                                    this.categoriasMobile.push({
                                        nome: cat,
                                        aberto: false,
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
            .videos-topo {
                margin-top: 180px;
                margin-bottom: 120px;
            }

            .videos-topo .titulo,
            .videos-topo .subtitulo {
                margin-left: 80px;
            }

            .videos-topo .titulo {
                padding-top: 0 !important;
                margin-top: -10px;
            }

            .videos-topo .subtitulo {
                font-size: 26px !important;
                line-height: 1.2 !important;
            }

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
                max-height: calc((925px / 3 - 40px) * 9 / 16);
                margin: 10px 5px;
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
                margin-left: 17px;
                margin-right: 17px;
            }

            .categoria {
                margin: 60px 0;
            }

            .categoria .titulo {
                display: inline-block;                
                padding: 0 5px;
                font-weight: 900;
                font-size: 26px;
            }

            .sem-videos {
                font-size: 22px;
                padding: 10px;
            }

            .videos-mobile {
                display: none;
            }


            @media (max-width: 1199px) {
                .thumbnail {
                    max-height: calc((775px / 3 - 40px) * 9 / 16);
                }
            }
            
            @media (max-width: 991px) {
                .thumbnail {
                    max-height: calc((575px / 3 - 40px) * 9 / 16);
                }
            }

            @media (max-width: 767px) {
                .videos-mobile {
                    margin-bottom: 100px;
                }
                
                .videos-topo h1.titulo {
                    margin-left: 0;
                }

                .videos-topo .subtitulo {
                    margin-left: 0;
                }

                .videos-topo {
                    background-image: none !important;
                    background-color: #fee1e7 !important;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    margin-bottom: 60px !important;
                }

                .videos-topo .titulo {
                    padding-top: 60px !important;    
                }

                .thumbnail {
                    max-height: 180px;
                    max-width: 320px;
                }

                .videos-desktop {
                    display: none;
                }

                .videos-mobile {
                    display: block;
                }

                .mobile-mais, 
                .mobile-menos {
                    padding-right: 10px;
                }

                .container-categorias-mobile {
                    margin-bottom: 30px;
                }

                .container-videos-mobile {
                    margin-bottom: 15px;
                }

                .videos-mobile h2.titulo {
                    font-size: 24px !important;
                }
                
                .titulo-categoria-mobile {
                    background-color: transparent;
                    color: #0a3299;
                    font-size: 24px;
                    width: 100%;
                    text-align: left;
                }
            }


        </style>

<?php
    endwhile;
endif;

get_footer();
?>
