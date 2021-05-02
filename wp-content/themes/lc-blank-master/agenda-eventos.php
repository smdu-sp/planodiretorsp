<?php
/*
Template Name: Agenda
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

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
        <div id="app" class="container-eventos" style="background-color: #aaa; margin-bottom: 200px">
            <div v-if="isLoading" style="color: red">Carregando eventos...</div>
            <div v-for="mes in mesesPosteriores">
                <h2>{{mes.nome}}</h2>
                <br>
                <div v-for="evento in mes.eventos" style="border: 1px solid black; padding: 20px; margin: 5px">
                    {{evento}}
                </div>   
            </div>
        </div>
        </div>
        <script type="text/javascript">
            const listaEventos = "<?php echo $isLocalhost ? './lista-eventos/' : '/lista-eventos/' ?>";
            var app = new Vue({
                el: '#app',
                data: {
                    eventos: [],
                    eventosPosteriores: [],
                    eventosAnteriores: [],
                    mesesPosteriores: [],
                    mesesAnteriores: [],
                    arrayMeses: ['JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'],
                    isLoading: true
                },
                methods: {
                    criaMeses: function() {
                        // POSTERIORES
                        this.mesesPosteriores = []
                        for (let index = 0; index < this.eventosPosteriores.length; index++) {
                            let evento = this.eventosPosteriores[index];
                            const nomeMes = this.arrayMeses[new Date(evento.data_evento).getUTCMonth()]
                            let mesExistente = false

                            // ITERA mesesPosteriores PARA VERIFICAR SE MES JA FOI ADICIONADO
                            for(mes in this.mesesPosteriores){
                                if(this.mesesPosteriores[mes].nome === nomeMes) {                                    
                                    mesExistente = true
                                    this.mesesPosteriores[mes].eventos.push(evento)
                                    break
                                }
                            }
                            if(!mesExistente) {
                                let novoMes = {
                                    nome: nomeMes,
                                    eventos: [evento]
                                }
                                this.mesesPosteriores.push(novoMes)
                            }
                        }
                    }
                },
                mounted() {
                    axios.get(listaEventos)
                        .then(response => {
                            this.eventos = response.data.eventos
                            for (evento in this.eventos) {
                                const dataEvento = new Date(this.eventos[evento].data_evento)

                                if (dataEvento > new Date())
                                    this.eventosPosteriores.push(this.eventos[evento])
                                else
                                    this.eventosAnteriores.push(this.eventos[evento])
                            }
                            this.criaMeses()
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER EVENTOS DA AGENDA")
                            console.log(error)
                        })
                        .finally(() => this.isLoading = false)
                }
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
    endwhile;
endif;

get_footer();
?>