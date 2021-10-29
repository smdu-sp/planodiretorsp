<?php
/*
Template Name: Segunda Enquete PDE
*/

session_start();

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    // Verifica reenvio de formulário
    if ($_POST['form_token']) {
      if ($_POST['form_token'] != $_SESSION['form_token']) {
        echo "<div class='mensagem-sucesso' style='margin-top: 300px'>Questionário enviado com sucesso!</div>";
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
        'ativacao',
      ];

      $sqlData = [];

      foreach ($camposForm as $key => $coluna) {
        $sqlData[$coluna] = $_POST[$coluna];
      }

      global $wpdb;
      $wpdb->show_errors();

      // INSERT RESPOSTAS
      $wpdb->insert('registros_enquete_2', $sqlData);
      $idRegistro = $wpdb->insert_id;
      if (!is_int($idRegistro)) {
        echo "<div class='mensagem-erro' style='margin-top: 300px'>Falha no envio do questionário, tente novamente mais tarde.</div>";
        return;
      }

      echo "<div class='mensagem-sucesso' style='margin-top: 300px'>Questionário enviado com sucesso!</div>";

      // Token para impedir reenvio
      $form_token = uniqid();
      $_SESSION['form_token'] = $form_token;

      get_footer();
      return;
    }

    the_content();

    include_once 'modulo-vue.php';

?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div id="modalEnvio" class="modal-envio">
      <div class="modal-envio-content">
        <p>Enviando questionário, aguarde...</p>
      </div>
    </div>

    <div id="appenquete">
      <div class="enquete-titulo">
        <h2><strong>Abaixo temos 5 questões para continuar nossas discussões</strong></h2>
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

            <fieldset class="enquete-pergunta">
              <legend>Se pudesse escolher, você moraria perto de:</legend>
              <div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a1" value="Emprego" v-model="resposta_1">
                    <label for="a1">Emprego</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a2" value="Escola" v-model="resposta_1">
                    <label for="a2">Escola</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a3" value="Parque ou praça" v-model="resposta_1">
                    <label for="a3">Parque ou praça</label>
                  </div>
                </div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a4" value="Transporte" v-model="resposta_1">
                    <label for="a4">Transporte (metrô, trem e terminal de ônibus)</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a5" value="Unidade de Saúde" v-model="resposta_1">
                    <label for="a5">Unidade de Saúde</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="a6" value="Outro" v-model="resposta_1">
                    <label for="a6">Outro</label>
                  </div>
                </div>
                <input style="width: 100%" type="text" id="resposta_1" name="resposta_1" :value="resposta_1" required hidden />
              </div>
            </fieldset>

            <fieldset class="enquete-pergunta">
              <legend>Quais temas você considera prioridade na revisão do Plano Diretor?</legend>
              <div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="b1" value="Mobilidade" v-model="resposta_2">
                    <label for="b1">Mobilidade</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="b2" value="Desenvolvimento econômico e social" v-model="resposta_2">
                    <label for="b2">Desenvolvimento econômico e social</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="b3" value="Instrumentos de política urbana" v-model="resposta_2">
                    <label for="b3">Instrumentos de política urbana</label>
                  </div>
                </div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="b4" value="Habitação" v-model="resposta_2">
                    <label for="b4">Habitação</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="b5" value="Meio ambiente" v-model="resposta_2">
                    <label for="b5">Meio ambiente</label>
                  </div>
                </div>
                <input style="width: 100%" type="text" id="resposta_2" name="resposta_2" :value="resposta_2" required hidden />
              </div>
            </fieldset>

            <fieldset class="enquete-pergunta">
              <legend>Na sua opinião, do que seu bairro mais precisa?</legend>
              <div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c1" value="Transporte público" v-model="resposta_3">
                    <label for="c1">Transporte público</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c2" value="Moradia" v-model="resposta_3">
                    <label for="c2">Moradia</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c3" value="Parques e áreas verdes" v-model="resposta_3">
                    <label for="c3">Parques e áreas verdes</label>
                  </div>
                </div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c4" value="Emprego" v-model="resposta_3">
                    <label for="c4">Emprego</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c5" value="Iluminação pública" v-model="resposta_3">
                    <label for="c5">Iluminação pública</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="c6" value="Equipamentos públicos" v-model="resposta_3">
                    <label for="c6">Equipamentos públicos</label>
                  </div>
                </div>
                <input style="width: 100%" type="text" id="resposta_3" name="resposta_3" :value="resposta_3" required hidden />
              </div>
            </fieldset>

            <fieldset class="enquete-pergunta">
              <legend>O que é mais importante que tenha na São Paulo do futuro ?</legend>
              <div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="d1" value="Moradia para todos" v-model="resposta_4">
                    <label for="d1">Moradia para todos</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="d2" value="Centro da cidade requalificado" v-model="resposta_4">
                    <label for="d2">Centro da cidade requalificado</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="d3" value="Transporte público perto de casa" v-model="resposta_4">
                    <label for="d3">Transporte público perto de casa</label>
                  </div>
                </div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="d4" value="Soluções para enfrentar novas pandemias" v-model="resposta_4">
                    <label for="d4">Soluções para enfrentar novas pandemias</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="d5" value="Área verdes preservadas" v-model="resposta_4">
                    <label for="d5">Área verdes preservadas</label>
                  </div>
                </div>
                <input style="width: 100%" type="text" id="resposta_4" name="resposta_4" :value="resposta_4" required hidden />
              </div>
            </fieldset>
            
            <fieldset class="enquete-pergunta">
              <legend>Você está participando desta enquete pela busca ativa nas ruas?</legend>
              <div>
                <div class="row">
                  <div class="alternativa col-md-4">
                    <input type="radio" id="e1" value="Sim" v-model="ativacao">
                    <label for="e1">Sim</label>
                  </div>
                  <div class="alternativa col-md-4">
                    <input type="radio" id="e2" value="Não" v-model="ativacao">
                    <label for="e2">Não</label>
                  </div>
                  <input style="width: 100%" type="text" id="ativacao" name="ativacao" :value="ativacao" hidden required />
                </div>
              </div>
            </fieldset>

            <div class="enquete-dados-pessoais">
              <p>Para concluir o envio da sua participação preencha os dados abaixo:</p>
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="pesquisado_nome">Nome completo:</label>
                <input class="col-sm px-0" type="text" id="pesquisado_nome" name="pesquisado_nome" placeholder="Preencha aqui" required />
              </div>
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="pesquisado_email">E-mail:</label>
                <input class="col-sm px-0" type="email" id="pesquisado_email" name="pesquisado_email" placeholder="exemplo@exemplo.com.br" required />
              </div>
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="select_zona">Distrito:</label>
                <select class="d-inline-flex" id="select_zona" v-model="zonaSelecionada" required>
                  <option value="" disabled selected hidden>Selecione a região</option>
                  <option v-for="zona in todasZonas" :value="zona">{{zona.nome}}</option>
                </select>
                <select class="d-inline-flex" v-if="zonaSelecionada !== ''" id="select_distrito" name="pesquisado_bairro" v-model="distritoSelecionado" required>
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
          ativacao: "",
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
          // Esconde conteúdo quando JavaScript não estiver habilitado
          var conteudo = document.getElementById("appenquete");
          conteudo.style.display = "block";
          this.populaDistritos()
        },
        methods: {
          exibeModal: function() {
            var modal = document.getElementById("modalEnvio");
            modal.style.display = "flex";
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
