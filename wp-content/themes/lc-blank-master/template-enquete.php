<?php
/*
Template Name: Enquete
*/

session_start();

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    $vue = 'vue.min.js';
    echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vue}'></script>";

    // Verifica reenvio de formulário
    if ($_POST['form_token']) {
      if ($_POST['form_token'] != $_SESSION['form_token']) {
        echo "<div class='mensagem-sucesso'>Questionário enviado com sucesso!</div>";
        get_footer();
        return;
      }
    }

    // Formulário de pesquisa sobre o PDE
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $camposForm = [
        'pesquisado_nome',
        'pesquisado_email',
        'pesquisado_bairro',
        'resposta_1',
        'resposta_2',
        'resposta_3',
        'resposta_4',
        'resposta_5',
        'resposta_6',
        'resposta_7',
        'resposta_8',
        'resposta_9',
        'resposta_10'
      ];

      $sqlData = [];

      foreach ($camposForm as $key => $coluna) {
        $sqlData[$coluna] = $_POST[$coluna];
      }

      global $wpdb;
      $wpdb->show_errors();

      // INSERT RESPOSTAS
      $wpdb->insert('registros_enquete', $sqlData);
      $idRegistro = $wpdb->insert_id;
      if (!is_int($idRegistro)) {
        echo "<script>window.alert('Falha no cadastro do evento. Consulte o desenvolvedor.');</script>";
        return;
      }

      echo "<div class='mensagem-sucesso'>Questionário enviado com sucesso!</div>";

      // Token para impedir reenvio
      $form_token = uniqid();
      $_SESSION['form_token'] = $form_token;

      get_footer();
      return;
    }
?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div id="modalEnvio" class="modal-envio">
      <div class="modal-envio-content">
        <p>Enviando questionário, aguarde...</p>
      </div>
    </div>

    <div id="appenquete">
      <div class="enquete-titulo">
        <h2><strong>Abaixo temos 10 questões<br> para início das nossas discussões</strong></h2>
      </div>
      <form method="post" class="form-enquete" action="<?php echo get_permalink(); ?>" enctype="multipart/form-data" @submit="exibeModal()">
        <div class="container-enquete">


          <div>
            <!-- Validação do formulário -->
            <?php
            /*** Gera token único para verificação de envio de formulário ***/
            $form_token = uniqid();
            $_SESSION['form_token'] = $form_token;
            ?>
            <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
            <!-- Validação do formulário -->
            <div>
              <p>Você sabe o que é o Plano Diretor Estratégico ?</p>
              <div>
                <input type="radio" id="a1" value="Sim" v-model="resposta_1">
                <label for="a1">Sim</label>
                <br>
                <input type="radio" id="a2" value="Não" v-model="resposta_1">
                <label for="a2">Não</label>
                <br>
                <input type="text" class="campo-oculto" id="resposta_1" name="resposta_1" :value="resposta_1" required />
              </div>
            </div>
            <div>
              <p>Você participou do processo participativo do Plano Diretor em 2014?</p>
              <div>
                <input type="radio" id="b1" value="Sim" v-model="resposta_2">
                <label for="b1">Sim</label>
                <br>
                <input type="radio" id="b2" value="Não" v-model="resposta_2">
                <label for="b2">Não</label>
                <br>
                <input type="text" class="campo-oculto" id="resposta_2" name="resposta_2" :value="resposta_2" required />
              </div>
            </div>
            <div>
              <p>Você acompanha e se interessa sobre as discussões de desenvolvimento urbano da cidade?</p>
              <div>
                <input type="radio" id="c1" value="Sim" v-model="resposta_3">
                <label for="c1">Sim</label>
                <br>
                <input type="radio" id="c2" value="Não" v-model="resposta_3">
                <label for="c2">Não</label>
                <br>
                <input type="text" class="campo-oculto" id="resposta_3" name="resposta_3" :value="resposta_3" required />
              </div>
            </div>
            <div>
              <p>Se pudesse escolher, você moraria perto de:</p>
              <div class="container">
                <div class="row">
                  <div class="col">
                    <input type="checkbox" id="d1" value="a_Emprego" v-model="resposta_4_ar" @change="ordenaResposta()">
                    <label for="d1">Emprego</label>
                  </div>
                  <div class="col">
                    <input type="checkbox" id="d2" value="b_Transporte" v-model="resposta_4_ar" @change="ordenaResposta()">
                    <label for="d2">Transporte (metrô, trem e terminal de ônibus)</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="checkbox" id="d3" value="c_Escola" v-model="resposta_4_ar" @change="ordenaResposta()">
                    <label for="d3">Escola</label>
                  </div>
                  <div class="col">
                    <input type="checkbox" id="d4" value="d_Unidade de saúde" v-model="resposta_4_ar" @change="ordenaResposta()">
                    <label for="d4">Unidade de saúde</label>
                  </div>
                </div>
                <input type="checkbox" id="d5" value="e_Parque ou praça" v-model="resposta_4_ar" @change="ordenaResposta()">
                <label for="d5">Parque ou praça</label>
                <br />
                <input type="checkbox" id="d6" value="f_Outro" v-model="resposta_4_ar" @change="ordenaResposta()">
                <label for="d6">Outro</label>
                <input type="text" id="r4_outro" v-model="resposta4Outro">
                <br>
                <span class="campo-oculto">Checked names: {{ resposta_4_ar }}</span>
                <br>
                <input type="text" class="campo-oculto" id="resposta_4" name="resposta_4" :value="resposta_4" />
              </div>
            </div>
            <div>
              <p>Quanto tempo de deslocamento você gasta, em média, da sua moradia até o trabalho diariamente?</p>
              <div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="e1" value="Menos de 15 minutos" v-model="resposta_5">
                    <label for="e1">Menos de 15 minutos</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="e2" value="Entre 15 e 30 minutos" v-model="resposta_5">
                    <label for="e2">Entre 15 e 30 minutos</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="e3" value="Entre 30 minutos e 1 hora" v-model="resposta_5">
                    <label for="e3">Entre 30 minutos e 1 hora</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="e4" value="Entre 1 e 2 horas" v-model="resposta_5">
                    <label for="e4">Entre 1 e 2 horas</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="e5" value="Mais de 2 horas" v-model="resposta_5">
                    <label for="e5">Mais de 2 horas</label>
                  </div>
                </div>
                <input type="text" class="campo-oculto" id="resposta_5" name="resposta_5" :value="resposta_5" required />
              </div>
            </div>
            <div>
              <p>Se pudesse escolher, qual das alternativas abaixo mais se aproxima dos seus planos?</p>
              <div>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-1 align-self-center">
                        <input type="radio" id="f1" value="Não penso em hipótese alguma deixar o bairro onde moro" v-model="resposta_6">
                      </div>
                      <div class="col">
                        <label for="f1">Não penso em hipótese alguma deixar o bairro onde moro</label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="col-1 align-self-center">
                        <input type="radio" id="f2" value="Permaneceria no bairro onde moro se ele recebesse melhorias" v-model="resposta_6">
                      </div>
                      <div class="col">
                        <label for="f2">Permaneceria no bairro onde moro se ele recebesse melhorias</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-1 align-self-center">
                        <input type="radio" id="f3" value="Mudaria de bairro porque prefiro ficar mais perto da região central da cidade" v-model="resposta_6">
                      </div>
                      <div class="col">
                        <label for="f3">Mudaria de bairro porque prefiro ficar mais perto da região central da cidade</label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="col-1 align-self-center">
                        <input type="radio" id="f4" value="Mudaria de bairro, pois está muito caro o custo de vida no atual" v-model="resposta_6">
                      </div>
                      <div class="col">
                        <label for="f4">Mudaria de bairro, pois está muito caro o custo de vida no atual</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-1 align-self-center">
                        <input type="radio" id="f5" value="Mudaria para regiões próximas à rede de transporte público, independentemente do bairro" v-model="resposta_6">
                      </div>
                      <div class="col">
                        <label for="f5">Mudaria para regiões próximas à rede de transporte público, independentemente do bairro</label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                  </div>
                </div>
                <input type="text" class="campo-oculto" id="resposta_6" name="resposta_6" :value="resposta_6" required />
              </div>
            </div>
            <div>
              <p>Na sua opinião, do que seu bairro mais precisa?</p>
              <div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="g1" value="Transporte público" v-model="resposta_7">
                    <label for="g1">Transporte público</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="g2" value="Segurança" v-model="resposta_7">
                    <label for="g2">Segurança</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="g3" value="Emprego" v-model="resposta_7">
                    <label for="g3">Emprego</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="g4" value="Moradia" v-model="resposta_7">
                    <label for="g4">Moradia</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="g5" value="Iluminação pública" v-model="resposta_7">
                    <label for="g5">Iluminação pública</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="g6" value="Parques e áreas verdes" v-model="resposta_7">
                    <label for="g6">Parques e áreas verdes</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="g7" value="Equipamento público" v-model="resposta_7">
                    <label for="g7">Equipamento público</label>
                  </div>
                </div>
                <input type="text" class="campo-oculto" id="resposta_7" name="resposta_7" :value="resposta_7" required />
              </div>
            </div>
            <div>
              <p>Você gostaria de morar no centro da cidade?</p>
              <div>
                <input type="radio" id="h1" value="Sim" v-model="resposta_8">
                <label for="h1">Sim</label>
                <br>
                <input type="radio" id="h2" value="Não" v-model="resposta_8">
                <label for="h2">Não</label>
                <br>
                <input type="text" class="campo-oculto" id="resposta_8" name="resposta_8" :value="resposta_8" required />
              </div>
            </div>
            <div>
              <p>Qual desses espaços públicos ao ar livre você mais valoriza?</p>
              <div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="i1" value="Parque" v-model="resposta_9">
                    <label for="i1">Parque</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="i2" value="Praça" v-model="resposta_9">
                    <label for="i2">Praça</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="i3" value="Quadra de esporte" v-model="resposta_9">
                    <label for="i3">Quadra de esporte</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="i4" value="Ciclovia" v-model="resposta_9">
                    <label for="i4">Ciclovia</label>
                  </div>
                </div>
                <input type="text" class="campo-oculto" id="resposta_9" name="resposta_9" :value="resposta_9" required />
              </div>
            </div>
            <div>
              <p>O que é mais importante que tenha na São Paulo do futuro ?</p>
              <div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="j1" value="Moradia para todos" v-model="resposta_10">
                    <label for="j1">Moradia para todos</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="j2" value="Transporte público perto de casa" v-model="resposta_10">
                    <label for="j2">Transporte público perto de casa</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="j3" value="Soluções para enfrentar novas pandemias" v-model="resposta_10">
                    <label for="j3">Soluções para enfrentar novas pandemias</label>
                  </div>
                  <div class="col">
                    <input type="radio" id="j4" value="Áreas verdes preservadas" v-model="resposta_10">
                    <label for="j4">Áreas verdes preservadas</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="radio" id="j5" value="Centro da cidade requalificado" v-model="resposta_10">
                    <label for="j5">Centro da cidade requalificado</label>
                  </div>
                </div>
                <input type="text" class="campo-oculto" id="resposta_10" name="resposta_10" :value="resposta_10" required />
              </div>
            </div>
            <div class="enquete-dados-pessoais">
              <p>Para concluir o envio da sua participação preencha os dados abaixo:</p>
              <div>
                <label for="pesquisado_nome">Nome completo:</label>
                <input type="text" id="pesquisado_nome" name="pesquisado_nome" placeholder="Preencha aqui" required />
              </div>
              <div>
                <label for="pesquisado_email">E-mail:</label>
                <input type="text" id="pesquisado_email" name="pesquisado_email" placeholder="exemplo@exemplo.com.br" required />
              </div>
              <div>
                <label>Distrito:</label>
                <select id="select_zona" v-model="zonaSelecionada" required>
                  <option value="" disabled selected hidden>Selecione a região</option>
                  <option v-for="zona in todasZonas" :value="zona">{{zona.nome}}</option>
                </select>
                <select v-if="zonaSelecionada !== ''" id="select_distrito" name="pesquisado_bairro" v-model="distritoSelecionado" required>
                  <option value="" disabled selected hidden>Selecione o distrito</option>
                  <option v-for="distrito in zonaSelecionada.distritos" :value="valorDistrito(distrito)">{{distrito.nome}}</option>
                </select>
              </div>
            </div>
            <center>
              <button class="button-enquete" type="submit">ENVIAR</button>
            </center>
          </div>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      var app = new Vue({
        el: '#appenquete',
        data: {
          resposta_1: "",
          resposta_2: "",
          resposta_3: "",
          resposta_4: "",
          resposta_4_ar: [],
          resposta_5: "",
          resposta_6: "",
          resposta_7: "",
          resposta_8: "",
          resposta_9: "",
          resposta_10: "",
          resposta4Outro: "",
          distritoSelecionado: '',
          zonaSelecionada: '',
          todasZonas: [],
          zonas: [{
              nome: 'CENTRO',
              macrozonas: [{
                nome: 'Centro',
                distritos: [
                  'Bela Vista',
                  'Bom Retiro',
                  'Cambuci',
                  'Consolação',
                  'Liberdade',
                  'República',
                  'Santa Cecília',
                  'Sé'
                ]
              }]
            },
            {
              nome: 'ZONA LESTE',
              macrozonas: [{
                  nome: 'Leste 1',
                  distritos: [
                    'Água Rasa',
                    'Aricanduva',
                    'Artur Alvim',
                    'Belém',
                    'Brás',
                    'Cangaíba',
                    'Carrão',
                    'Moóca',
                    'Pari',
                    'Penha',
                    'São Lucas',
                    'Sapopemba',
                    'Tatuapé',
                    'Vila Formosa',
                    'Vila Matilde',
                    'Vila Prudente'
                  ]
                },
                {
                  nome: 'Leste 2',
                  distritos: [
                    'Cidade Líder',
                    'Cidade Tiradentes',
                    'Ermelino Matarazzo',
                    'Guaianases',
                    'Iguatemi',
                    'Itaim Paulista',
                    'Itaquera',
                    'Jardim Helena',
                    'José Bonifácio',
                    'Lajeado',
                    'Parque do Carmo',
                    'Ponte Rasa',
                    'São Mateus',
                    'São Miguel',
                    'São Rafael',
                    'Vila Curuçá',
                    'Vila Jacuí'
                  ]
                }
              ]
            },
            {
              nome: 'ZONA NORTE',
              macrozonas: [{
                  nome: 'Norte 1',
                  distritos: [
                    'Jaçanã',
                    'Mandaqui',
                    'Santana',
                    'Tremembé',
                    'Tucuruvi',
                    'Vila Guilherme',
                    'Vila Maria',
                    'Vila Medeiros'
                  ]
                },
                {
                  nome: 'Norte 2',
                  distritos: [
                    'Anhanguera',
                    'Brasilândia',
                    'Cachoeirinha',
                    'Casa Verde',
                    'Freguesia do Ó',
                    'Jaraguá',
                    'Limão',
                    'Perus',
                    'Pirituba',
                    'São Domingos'
                  ]
                }
              ]
            },
            {
              nome: 'ZONA OESTE',
              macrozonas: [{
                nome: 'Oeste',
                distritos: [
                  'Alto de Pinheiros',
                  'Barra Funda',
                  'Butantã',
                  'Itaim Bibi',
                  'Jaguara',
                  'Jaguaré',
                  'Jardim Paulista',
                  'Lapa',
                  'Morumbi',
                  'Perdizes',
                  'Pinheiros',
                  'Raposo Tavares',
                  'Rio Pequeno',
                  'Vila Leopoldina',
                  'Vila Sônia'
                ]
              }]
            },
            {
              nome: 'ZONA SUL',
              macrozonas: [{
                  nome: 'Sul 1',
                  distritos: [
                    'Cursino',
                    'Ipiranga',
                    'Jabaquara',
                    'Moema',
                    'Sacomã',
                    'Saúde',
                    'Vila Mariana'
                  ]
                },
                {
                  nome: 'Sul 2',
                  distritos: [
                    'Campo Belo',
                    'Campo Grande',
                    'Campo Limpo',
                    'Capão Redondo',
                    'Cidade Ademar',
                    'Cidade Dutra',
                    'Grajaú',
                    'Jardim Ângela',
                    'Jardim São Luís',
                    'Marsilac',
                    'Parelheiros',
                    'Pedreira',
                    'Santo Amaro',
                    'Socorro',
                    'Vila Andrade'
                  ]
                }
              ]
            }
          ]
        },
        mounted() {
          this.populaDistritos()
        },
        methods: {
          exibeModal: function() {
            this.validaFormulario();
            var modal = document.getElementById("modalEnvio");
            modal.style.display = "flex";
          },
          ordenaResposta: function() {
            this.resposta_4_ar.sort();
          },
          validaFormulario: function() {
            for (i in this.resposta_4_ar) {
              this.resposta_4 += this.resposta_4_ar[i] + ", "
            }
            this.resposta_4 = this.resposta_4.slice(0, -2)

            if (this.resposta_4.includes("f_Outro"))
              this.resposta_4 += ": " + this.resposta4Outro
          },
          populaDistritos: function() {
            for (iZona in this.zonas) {
              let newZona = {
                nome: this.zonas[iZona].nome,
                distritos: []
              }

              for (iMacrozona in this.zonas[iZona].macrozonas) {
                let macrozona = this.zonas[iZona].macrozonas[iMacrozona]

                for (iDistrito in macrozona.distritos) {
                  let newDistrito = {
                    nome: macrozona.distritos[iDistrito],
                    macrozona: macrozona.nome,
                    zona: this.zonas[iZona].nome
                  }
                  newZona.distritos.push(newDistrito)
                }

                newZona.distritos.sort((a, b) => (a.nome.normalize("NFD").replace(/[\u0300-\u036f]/g, "") > b.nome.normalize("NFD").replace(/[\u0300-\u036f]/g, "")) ? 1 : -1)

              }

              this.todasZonas.push(newZona)
            }
          },
          valorDistrito: function(distrito) {
            return distrito.macrozona + ' - ' + distrito.nome
          }
        }
      })
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>