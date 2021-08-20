<?php
/*
Template Name: Agenda
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $vue = 'vue.min.js';

        $isLocalhost = get_site_url() === 'http://localhost/planodiretorsp';

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
            <div v-if="carregando" style="color: gray; height: 2000px; font-size: 2em">Carregando conteúdo...</div>
            <!-- BOTÃO ADICIONAR EVENTO -->
            <div v-if="!carregando && logado" class="row justify-content-center">
                <div class="col-3">
                    <a class="btn btn-success btn-lg btn-block" href="/cadastro-de-evento/?evento=agenda">
                        Adicionar evento
                    </a>
                </div>
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </div>
            <!-- EVENTO DE DESTAQUE -->
            <div v-if="!carregando && (eventoAtual.id)" class="row evento-destaque">
                <!-- <div class="col-md-4 destaque-imagem">
                    <img :src="eventoAtual.imagem" :alt="eventoAtual.titulo">
                </div>
                <div class="row col align-items-end destaque-info">
                    <div v-if="dataProxima" class="tag-mes" style="background-color: #0a3299">
                        <h2>{{dataProxima}}</h2>
                    </div>
                    <div class="col-lg-6 destaque-texto">
                        <div class="row">
                            <span class="linha-evento col">
                                {{eventoAtual.tipo}}
                            </span>
                            <a class="col-4" v-if="logado" :href="'/evento?id=' + eventoAtual.id">
                                <div class="btn btn-primary">
                                    Editar evento
                                </div>
                            </a>
                        </div>
                        <div>
                            <h3>{{eventoAtual.titulo}}</h3>
                        </div>
                        <div>
                            <p>{{eventoAtual.destaque}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 destaque-tags">
                        <div class="tag-evento tag-hora">
                            <i class="bi bi-calendar3" style="color: white"></i>{{formataData(eventoAtual.data_evento)}}&nbsp;&nbsp;&nbsp;<i class="bi bi-clock" style="color: white"></i>{{formataHora(eventoAtual.hora_evento)}}
                        </div>
                        <a :href="eventoAtual.link" target="_blank" v-if="eventoAtual.link">
                            <div class="tag-evento tag-destaque">
                                {{eventoAtual.descricao_link}}
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>

            <!-- MESES POSTERIORES -->
            <div class="row">
                <div class="col coluna-desktop">
                    <div v-for="(mes, index) in colEsqPosteriores" class="card-mes" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
                <div class="col coluna-desktop">
                    <div v-for="(mes, index) in colDirPosteriores" class="card-mes mt-10" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
                <div class="col coluna-mobile">
                    <div v-for="(mes, index) in mesesPosteriores" class="card-mes" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
            </div>

            <!-- MESES ANTERIORES -->
            <div v-if="!carregando" class="banner-anteriores row">
                <div class="col">
                    <h2>Agendas anteriores</h2>
                </div>
                <div class="col">
                    <p>Confira aqui as reuniões realizadas e acesse seus respectivos documentos</p>
                </div>
            </div>
            <div class="row cidade-background">
                <div class="col coluna-desktop coluna-esquerda">
                    <div v-for="(mes, index) in colEsqAnteriores" class="card-mes" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
                <div class="col coluna-desktop">
                    <div v-for="(mes, index) in colDirAnteriores" class="card-mes mt-10" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
                <div class="col coluna-mobile">
                    <div v-for="(mes, index) in mesesAnteriores" class="card-mes" :key="index">
                        <div class="tag-mes" :style="'background-color: '+mes.cor">
                            <h2>{{mes.nome}}</h2>
                        </div>
                        <br>
                        <?php require('modulo-mes.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script type="text/javascript">
            const listaEventos = "<?php echo $isLocalhost ? '../lista-eventos/' : '/lista-eventos/' ?>";
            var app = new Vue({
                el: '#appagenda',
                data: {
                    eventos: [],
                    eventosPosteriores: [],
                    eventosAnteriores: [],
                    eventoAtual: [],
                    dataProxima: "",
                    mesesPosteriores: [],
                    mesesAnteriores: [],
                    colEsqPosteriores: [],
                    colEsqAnteriores: [],
                    colDirPosteriores: [],
                    colDirAnteriores: [],
                    arrayMeses: ['JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'],
                    carregando: true,
                    cores: ['#f96546', '#f4a7b0', '#517bee', '#fd8524'],
                    logado: false
                },
                methods: {
                    criaMeses: function() {
                        // POSTERIORES
                        this.mesesPosteriores = []
                        let corAtual = 0

                        if (this.eventosPosteriores.length > 0) {
                            for (let index = 0; index < this.eventosPosteriores.length; index++) {
                                let evento = this.eventosPosteriores[index];
                                let mesAtual = new Date().getUTCMonth()
                                let mesInicio = new Date(evento.data_evento).getUTCMonth()
                                let nomeMes = this.arrayMeses[mesInicio]

                                if (evento.data_termino) {
                                    let mesTermino = new Date(evento.data_termino).getUTCMonth()
                                    let dataAtual = "" + new Date().getUTCFullYear() + ("0" + mesAtual).slice(-2)
                                    let dataInicio = "" + new Date(evento.data_evento).getUTCFullYear() + ("0" + mesInicio).slice(-2)
                                    let dataTermino = "" + new Date(evento.data_termino).getUTCFullYear() + ("0" + mesTermino).slice(-2)

                                    console.log(dataAtual, dataInicio, dataTermino)

                                    if (dataTermino > dataInicio && dataAtual > dataInicio) {
                                        nomeMes = this.arrayMeses[mesAtual]
                                    }
                                }

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

                            // SEPARA O PRIMEIRO ITEM DA LISTA PARA MOSTRAR COM DESTAQUE
                            if (this.mesesPosteriores[0].eventos[0].id > 0) {
                                this.eventoAtual = this.mesesPosteriores[0].eventos[0]
                                // this.eventoAtual = this.mesesPosteriores[0].eventos.shift()
                                // if (!this.mesesPosteriores[0].eventos[0]) {
                                //     this.mesesPosteriores.shift()
                                // }
                            }

                            for (var i = 0; i < this.mesesPosteriores.length; i++) {
                                if (i % 2 === 0)
                                    this.colEsqPosteriores.push(this.mesesPosteriores[i])
                                else
                                    this.colDirPosteriores.push(this.mesesPosteriores[i])
                            }
                        }

                        // ANTERIORES
                        this.mesesAnteriores = []
                        corAtual = 0

                        for (let index = 0; index < this.eventosAnteriores.length; index++) {
                            let evento = this.eventosAnteriores[index];
                            const dataGmt = new Date(evento.data_evento)
                            const nomeMes = this.arrayMeses[dataGmt.getUTCMonth()]
                            let mesExistente = false

                            const options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                timeZone: 'UTC'
                            };

                            evento.data_completa = dataGmt.toLocaleDateString('pt-BR', options)

                            if (evento.data_termino) {
                                const dataTermGmt = new Date(evento.data_termino)
                                let options_1 = {
                                    month: 'long',
                                    day: 'numeric',
                                    timeZone: 'UTC'
                                }
                                const options_2 = {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    timeZone: 'UTC'
                                }

                                if (dataTermGmt.getUTCFullYear() > dataGmt.getUTCFullYear()) {
                                    options_1 = options_2
                                }

                                evento.data_completa = dataGmt.toLocaleDateString('pt-BR', options_1) + " a " + dataTermGmt.toLocaleDateString('pt-BR', options_2)
                            }

                            // ITERA mesesAnteriores PARA VERIFICAR SE MES JA FOI ADICIONADO
                            for (mes in this.mesesAnteriores) {
                                if (this.mesesAnteriores[mes].nome === nomeMes) {
                                    mesExistente = true
                                    this.mesesAnteriores[mes].eventos.push(evento)
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

                                this.mesesAnteriores.push(novoMes)
                            }
                        }

                        this.mesesAnteriores = this.mesesAnteriores.slice().reverse()

                        for (var i = 0; i < this.mesesAnteriores.length; i++) {
                            if (i % 2 === 0)
                                this.colEsqAnteriores.push(this.mesesAnteriores[i])
                            else
                                this.colDirAnteriores.push(this.mesesAnteriores[i])
                        }
                    },
                    formataData: function(dataInicio, dataTermino = false) {
                        let diaInicio = new Date(dataInicio).getUTCDate()
                        let mesInicio = this.arrayMeses[new Date(dataInicio).getUTCMonth()]
                        let dataRetorno = ""

                        if (!dataTermino) {
                            dataRetorno += diaInicio + " de " + mesInicio
                            return dataRetorno.toLowerCase()
                        }

                        let diaTermino = new Date(dataTermino).getUTCDate()
                        let mesTermino = this.arrayMeses[new Date(dataTermino).getUTCMonth()]

                        if (mesInicio === mesTermino) {
                            dataRetorno += diaInicio + " a " + diaTermino + " de " + mesTermino
                        } else {
                            dataRetorno += diaInicio + " de " + mesInicio + " a <br>" + diaTermino + " de " + mesTermino
                        }

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
                    },
                    checaDataProxima: function() {
                        let dataAtual = new Date()
                        let dataEvento = new Date(app.eventoAtual.data_evento)

                        if (dataAtual.getMonth() === dataEvento.getUTCMonth()) {
                            if (dataAtual.getDate() === dataEvento.getUTCDate()) {
                                this.dataProxima = "HOJE"
                            }
                            if (dataAtual.getDate() + 1 === dataEvento.getUTCDate()) {
                                this.dataProxima = "AMANHÃ"
                            }
                            return
                        }
                    },
                    checaLogin: function() {
                        if ("<?php echo is_user_logged_in() ?>")
                            this.logado = true
                    }
                },
                mounted() {
                    axios.get(listaEventos)
                        .then(response => {
                            // Impede que eventos da categoria "documento" sejam mostrados na agenda
                            this.eventos = response.data.eventos.filter(evento => evento.tipo !== "documento")
                            for (evento in this.eventos) {
                                this.eventos[evento].aberto = false
                                let dataEvento = new Date(this.eventos[evento].data_evento + " " + "23:59:59")

                                if (this.eventos[evento].data_termino) {
                                    dataEvento = new Date(this.eventos[evento].data_termino + " " + "23:59:59")
                                }

                                if (dataEvento.getTime() > new Date().getTime())
                                    this.eventosPosteriores.push(this.eventos[evento])
                                else
                                    this.eventosAnteriores.push(this.eventos[evento])
                            }
                            this.criaMeses()
                            this.checaDataProxima()
                            this.checaLogin()
                        })
                        .catch(error => {
                            console.error("ERRO AO OBTER EVENTOS DA AGENDA")
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