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
            <div v-if="isLoading" style="color: gray">Carregando eventos...</div>
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
            <div v-if="!isLoading" class="banner-anteriores row">
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
                    mesesPosteriores: [],
                    mesesAnteriores: [],
                    colEsqPosteriores: [],
                    colEsqAnteriores: [],
                    colDirPosteriores: [],
                    colDirAnteriores: [],
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

                        for (var i = 0; i < this.mesesPosteriores.length; i++) {
                            if (i % 2 === 0)
                                this.colEsqPosteriores.push(this.mesesPosteriores[i])
                            else
                                this.colDirPosteriores.push(this.mesesPosteriores[i])
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
                            evento.dataCompleta = dataGmt.toLocaleDateString('pt-BR', options)

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
                max-width: calc(100% - 60px);
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
                max-height: 1000em;
                transition: max-height 0.5s;
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
                width: -moz-fit-content;
                border-radius: 5px;
                padding: 8px 12px;
                transform: translate(30px, -2em);
            }

            .container-eventos .tag-mes h2 {
                color: white;
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
                background-color: white;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
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

            .coluna-desktop {
                display: block;
            }

            .coluna-mobile {
                display: none;
            }

            .mt-10 {
                margin-top: 6rem !important;
            }

            .cidade-background {
                background-image: url("https://planodiretorsp.prefeitura.sp.gov.br/wp-content/uploads/2021/03/fundo_site-e1616103151744.png");
            }

            .container-eventos .banner-anteriores {
                background-color: #0a3299;
                padding: 40px;
                min-height: 500px;
                margin-bottom: -80px;
            }

            .container-eventos .banner-anteriores * {
                color: white;
                font-size: 72px;
                font-weight: 700;
            }

            .container-eventos .banner-anteriores p {
                font-size: 36px !important;
                font-weight: 300;
                padding: 1em;
            }

            .container-eventos .coluna-esquerda {
                margin-top: -100px;
            }

            @media (max-width: 767.98px) {
                .coluna-desktop {
                    display: none;
                }

                .coluna-mobile {
                    display: block;
                }
            }
        </style>
<?php
    endwhile;
endif;

get_footer();
?>