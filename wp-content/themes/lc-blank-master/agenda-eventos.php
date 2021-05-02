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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div id="appagenda" class="container-eventos">
            <div v-if="isLoading" style="color: red">Carregando eventos...</div>
            <div v-for="mes in mesesPosteriores" class="card-mes">
                <div class="tag-mes" :style="'background-color: '+mes.cor">
                    <h2>{{mes.nome}}</h2>
                </div>
                <br>
                <!-- Evento -->
                <div v-for="evento in mes.eventos" :key="evento.id" :class="evento.aberto ? 'row' : 'row fechado'">
                    <div class="col-2">
                        <span class="linha-evento" :style="'color: '+mes.cor">{{evento.tipo}}</span>
                    </div>
                    <div class="col">
                        <div>
                            <h3>{{evento.titulo}}</h3>
                        </div>
                        <div>
                            <img class="rounded" :src="evento.imagem" :alt="evento.titulo">
                        </div>
                        <div>
                            <p>{{evento.descricao}}</p>
                        </div>
                        <div class="tag-evento tag-data" :style="'background-color: '+mes.cor">
                            <i class="bi bi-calendar3" style="color: white"></i>{{formataData(evento.data_evento)}}
                        </div>
                        <div class="tag-evento tag-hora">
                            <i class="bi bi-clock" :style="'color: '+mes.cor"></i>{{formataHora(evento.hora_evento)}}
                        </div>
                        <div class="tag-evento tag-local" v-if="evento.local">
                            <i class="bi bi-geo-alt" :style="'color: '+mes.cor"></i>{{evento.local}}
                        </div>
                        <a :href="evento.link" target="_blank" v-if="evento.link">
                            <div class="tag-evento tag-link" :style="'color: '+mes.cor">
                                <i class="bi bi-hand-index"></i>
                                {{evento.descricao_link}}
                            </div>
                        </a>
                    </div>
                    <div>
                        <div class="botao-colapso position-absolute" @click="toggleEvento(evento)" :style="'background-color: '+mes.cor">
                            <div>{{evento.aberto ? "-" : "+"}}</div>
                        </div>
                    </div>
                </div>
                <!-- Fim evento -->
            </div>
        </div>
        </div>
        <script type="text/javascript">
            const listaEventos = "<?php echo $isLocalhost ? './lista-eventos/' : '/lista-eventos/' ?>";
            var app = new Vue({
                el: '#appagenda',
                data: {
                    eventos: [],
                    eventosPosteriores: [],
                    eventosAnteriores: [],
                    mesesPosteriores: [],
                    mesesAnteriores: [],
                    colEsqPosteriores: [],
                    colDirPosteriores: [],
                    arrayMeses: ['JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'],
                    isLoading: true,
                    cores: ['#f96546', '#f4a7b0', '#517bee', '#fd8524']
                },
                methods: {
                    criaMeses: function() {
                        // POSTERIORES
                        this.mesesPosteriores = []
                        let corAtual = 0

                        for (let index = 0; index < this.eventosPosteriores.length; index++) {
                            let evento = this.eventosPosteriores[index];
                            const nomeMes = this.arrayMeses[new Date(evento.data_evento).getUTCMonth()]
                            let mesExistente = false

                            // ITERA mesesPosteriores PARA VERIFICAR SE MES JA FOI ADICIONADO
                            for (mes in this.mesesPosteriores) {
                                if (this.mesesPosteriores[mes].nome === nomeMes) {
                                    mesExistente = true
                                    this.mesesPosteriores[mes].eventos.push(evento)
                                    break
                                }
                            }
                            if (!mesExistente) {
                                let novoMes = {
                                    nome: nomeMes,
                                    eventos: [evento],
                                    cor: this.cores[corAtual]
                                }
                                corAtual++
                                corAtual = corAtual >= this.cores.length ? 0 : corAtual

                                this.mesesPosteriores.push(novoMes)
                            }
                        }
                    },
                    formataData: function(dateStr) {
                        let dia = new Date(dateStr).getUTCDate()
                        let mes = this.arrayMeses[new Date(dateStr).getUTCMonth()]
                        let dataRetorno = "" + dia + " de " + mes
                        return dataRetorno.toLowerCase()
                    },
                    formataHora: function(hourStr) {
                        let minutos = hourStr.substr(3, 2)
                        let horaRetorno = hourStr.substr(0, 2) + "h" + (minutos === "00" ? "" : minutos)
                        return horaRetorno
                    },
                    toggleEvento: function(evento) {
                        evento.aberto = !evento.aberto
                        this.$forceUpdate()
                    }
                },
                mounted() {
                    axios.get(listaEventos)
                        .then(response => {
                            this.eventos = response.data.eventos
                            for (evento in this.eventos) {
                                this.eventos[evento].aberto = false
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
        <style>
            #appagenda {
                max-width: calc(100% - 20px);
                margin: 100px auto;
            }

            .container-eventos .botao-colapso {
                background-color: red;
                cursor: pointer;
                border-radius: 50%;
                width: 25px;
                height: 25px;
                color: white;
                font-size: 16px !important;
                box-shadow: 1px 1px 5px rgb(0 0 0 / 10%);
                z-index: 1;
            }

            .container-eventos .botao-colapso div {
                margin: auto;
                text-align: center;
                line-height: 22px;
                user-select: none;
            }

            .container-eventos .row {
                max-height: 100em;
                transition: max-height 0.2s;
            }

            .container-eventos .fechado {
                max-height: 5em;
                overflow: hidden;
            }

            .container-eventos h3 {
                font-size: 20px;
                line-height: 26px;
                margin-bottom: 20px;
            }

            .container-eventos .linha-evento {
                line-height: 26px;
            }

            .container-eventos .tag-mes {
                margin-bottom: -2em;
                height: 4em;
                top: -1em;
                color: white;
                width: fit-content;
                border-radius: 5px;
                padding: 8px 12px;
                transform: translate(30px, -2em);
            }

            .container-eventos .tag-evento {
                border-radius: 10px;
                font-size: 16px;
                height: 40px;
                border: 2px solid #0a3299;
                color: #0a3299;
                padding: 4px 20px;
                line-height: 28px;
                margin: 10px 0;
                width: 50%;
                min-width: 260px;
            }

            .container-eventos .tag-data {
                border: none;
                color: white;
            }

            .container-eventos .card-mes {
                margin-bottom: 5em;
                box-shadow: 0 0 20px darkgrey;
                border-radius: 20px;
                padding-bottom: 10px;
            }

            .container-eventos .card-mes>.row {
                padding: 10px;
                margin: 5px;
            }

            .container-eventos .tag-evento i {
                padding-right: 1em;
            }
        </style>
<?php
    endwhile;
endif;

get_footer();
?>