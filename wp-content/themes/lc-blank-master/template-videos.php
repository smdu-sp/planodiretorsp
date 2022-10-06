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

        </div>

        <script type="text/javascript">
            var app = new Vue({
                el: '#appVideos',
                data: {
                    apiUrl: '/lista-videos/',
                    videos: [],
                    videosCategorizados: {},
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
                    separaVideosPorCategoria: function() {
                        if (this.videos.length > 0) {
                            let listaCategorias = [];
                            this.videos.forEach(video => {
                                listaCategorias.push(video['categoria']);
                            })

                            // Remove as categorias duplicadas
                            listaCategorias = [... new Set(listaCategorias)]
                        }
                    },
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
                            this.videos = response.data.videos.reverse()
                            this.separaVideosPorCategoria();
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
