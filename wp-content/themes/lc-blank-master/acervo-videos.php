<?php
/*
Template Name: Acervo Videos
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div id="appvideos" class="container">
            <div v-if="isLoading" style="color: gray">Carregando vídeos...</div>
            <!-- VÍDEOS -->
            <div class="row card-video" v-for="video in videos">
                <div class="col-6">
                    <!-- VIDEO EMBED -->
                    <iframe 
                    width="560" 
                    height="315" 
                    :src="video.link.replace('watch?v=', 'embed/')" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                    </iframe>
                </div>
                <div class="col ficha-tecnica">
                    <!-- FICHA DO VÍDEO -->
                    <div class="row">
                        <h2>{{video.titulo}}</h2>
                    </div>
                    <div class="row">
                        <span>{{video.data}}</span>
                    </div>
                    <div class="row video-info">
                        <div class="col-1 p-0"><span>Evento:</span></div>
                        <div class="col"><p>{{video.titulo}}</p></div>
                    </div>
                    <div class="row video-info">
                        <div class="col-1 p-0"><span>Tema:</span></div>
                        <div class="col"><p>{{video.tema}}</p></div>
                    </div>
                    <div class="row video-info">
                        <div class="col-1 p-0"><span>Fonte:</span></div>
                        <div class="col"><p>{{video.destaque}}</p></div>
                    </div>
                    <div class="row">
                        <p>{{video.descricao}}</p>
                    </div>
                    <div class="row">
                        <p>Link do vídeo original: <a :href="video.link" target="_blank">{{video.link}}</a></p>
                    </div>
                    <div class="row">
                        <span class="hashtag">#TransparênciaPDE</span>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script type="text/javascript">
            const listaVideos = "<?php echo $isLocalhost ? './lista-videos/' : '/lista-videos/' ?>";
            var app = new Vue({
                el: '#appvideos',
                data: {
                    videos: [],
                    isLoading: true
                },
                methods: {
                    formataData: function(dateStr) {
                        let dia = new Date(dateStr).getUTCDate()
                        let mes = this.arrayMeses[new Date(dateStr).getUTCMonth()]
                        let dataRetorno = "" + dia + " de " + mes
                        return dataRetorno.toLowerCase()
                    }
                },
                mounted() {
                    axios.get(listaVideos)
                        .then(response => {
                            this.videos = response.data.videos
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER VÍDEOS")
                            console.log(error)
                        })
                        .finally(() => this.isLoading = false)
                }
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
            #appvideos .ficha-tecnica h2 {
                text-overflow: ellipsis;
                color: #0a3299;
                font-size: 22px;                
            }
            #appvideos .hashtag {
                color: #888;
            }
            #appvideos .card-video {
                padding: 20px 0;
                border: 1px solid red;
            }
        </style>
<?php
    endwhile;
endif;

get_footer();
?>