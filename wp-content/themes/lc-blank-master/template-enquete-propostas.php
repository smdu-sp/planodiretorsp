<?php
/*
Template Name: Enquete Propostas
*/

session_start();

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    // Verifica reenvio de formulário
    if ($_POST['form_token']) {
      if ($_POST['form_token'] != $_SESSION['form_token']) {
        echo "<div class='mensagem-sucesso' style='margin-top: 300px'>Formulário enviado com sucesso!</div>";
        get_footer();
        return;
      }
    }

    // Formulário de pesquisa sobre o PDE
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $camposForm = [
        'subprefeitura',
        'nome',
        'email',
        'entidade',
        'resposta_1',
        'proposta',
        'resposta_2'
      ];

      $sqlData = [];

      foreach ($camposForm as $key => $coluna) {
        $sqlData[$coluna] = $_POST[$coluna];
      }

      global $wpdb;
      $wpdb->show_errors();

      // INSERT RESPOSTAS
      $wpdb->insert('registros_propostas', $sqlData);
      $idRegistro = $wpdb->insert_id;
      if (!is_int($idRegistro)) {
        echo "<div class='mensagem-erro' style='margin-top: 300px'>Falha no envio do formulário, tente novamente mais tarde.</div>";
        return;
      }

      echo "<div class='mensagem-sucesso' style='margin-top: 300px'>Formulário enviado com sucesso!</div>";

      // Token para impedir reenvio
      $form_token = uniqid();
      $_SESSION['form_token'] = $form_token;

      get_footer();
      return;
    }

    the_content();

    $vue = 'vue.min.js';
    echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vue}'></script>";

?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div id="modalEnvio" class="modal-envio">
      <div class="modal-envio-content">
        <p>Enviando formulário, aguarde...</p>
      </div>
    </div>

    <div id="appenquete" class="propostas">
      <div class="enquete-titulo propostas-titulo">
        <h1>Ficha de Cadastro de Propostas</h1>
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

            <div class="enquete-dados-pessoais">
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1">Subprefeitura:</label>
                <select class="d-inline-flex" id="select_subpref" v-model="subprefeituraSelecionada" required>
                  <option value="" disabled selected hidden>Selecione a subprefeitura</option>
                  <option v-for="subprefeitura in subprefeituras" :value="subprefeitura">{{subprefeitura}}</option>
                </select>
              </div>
              <input style="width: 100%" type="text" id="subprefeitura" name="subprefeitura" :value="subprefeituraSelecionada" required hidden />
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="nome">Nome:</label>
                <input class="col-sm px-0" type="text" id="nome" name="nome" required />
              </div>
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="email">E-mail:</label>
                <input class="col-sm px-0" type="text" id="email" name="email" required />
              </div>
              <div class="row mx-0 my-4">
                <label class="col-sm-auto px-0 mr-1" for="entidade">Entidade:</label>
                <input class="col-sm px-0" type="text" id="entidade" name="entidade" />
              </div>
            </div>

            <div class="enquete-pergunta">
              <div>
                <h2>O QUE PRECISAMOS PARA MELHORAR SUA IMPLEMENTAÇÃO ATÉ 2029?</h2>
                <p class="propostas-subtitulo">Relacione sua contribuição com apenas um dos objetivos abaixo:</p>
                <div class="row">
                  <div class="col-lg-6">
                    <div v-for="(resposta, valor) in respostas_1_esq" class="mb-5">
                      <input type="radio" :id="'r_1_' + parseInt(valor + 1)" :value="parseInt(valor + 1)" v-model="resposta_1">
                      <label :for="'r_1_' +  parseInt(valor + 1)"><strong>{{valor + 1}})</strong> {{resposta}}</label>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div v-for="(resposta, valor) in respostas_1_dir" class="mb-5">
                      <input type="radio" :id="'r_1_' + parseInt(valor + respostas_1_esq.length + 1)" :value="parseInt(valor + respostas_1_esq.length + 1)" v-model="resposta_1">
                      <label :for="'r_1_' + parseInt(valor + respostas_1_esq.length + 1)"><strong>{{valor + respostas_1_esq.length + 1}})</strong> {{resposta}}</label>
                    </div>
                  </div>
                </div>
                <input style="width: 100%" type="text" id="resposta_1" name="resposta_1" :value="resposta_1" required hidden />

                <h2 class="pt-0">Escreva aqui a sua proposta</h2>
                <div class="escreva-proposta row mx-0 mt-4">
                  <textarea class="col-sm px-0" id="proposta" name="proposta" maxlength="1000" required></textarea>
                </div>

                <p>Desde o início de 2020 a cidade de São Paulo e todo o mundo estão enfrentando a pandemia da COVID-19. Os efeitos sobre as cidades e a vida urbana já podem ser percebidos evidenciando a necessidade de se buscar soluções mais adequadas diante desta situação. Nesse sentido, diante destes impactos que tendem a se tornar permanentes na cidade de São Paulo, o que você entende que seria importante melhorar nessa revisão intermediária do Plano Diretor:</p>
                <div v-for="(resposta, valor) in respostas_2" class="row">
                  <input type="radio" :id="'r_2_' +  parseInt(valor + 1)" :value="parseInt(valor + 1)" v-model="resposta_2">
                  <label :for="'r_2_' + parseInt(valor + 1)"><strong>{{valor + 1}})</strong> {{resposta}}</label>
                </div>
                <input style="width: 100%" type="text" id="resposta_2" name="resposta_2" :value="resposta_2" required hidden />

                <center>
                  <button class="button-enquete" type="submit">ENVIAR</button>
                </center>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      var app = new Vue({
        el: '#appenquete',
        data: {
          subprefeituraSelecionada: '',
          resposta_1: "",
          resposta_2: "",
          respostas_1_esq: [
            'Ampliar as oportunidades de trabalho e emprego ao longo dos principais eixos de transporte coletivo (Metrô, CPTM, Monotrilho, Corredores de ônibus, etc), reduzindo a necessidade de deslocamento entre os locais trabalho e de moradia;',
            'Promover ajustes necessários para garantir a produção de construções de qualidade em sintonia com as atuais diretrizes da Política de Desenvolvimento Urbano;',
            'Priorizar investimentos e ações nas áreas carentes de infraestrutura com melhora na oferta de oportunidades de emprego e trabalho;',
            'Atender ao “deficit” acumulado e às necessidades futuras de habitação social em áreas dotadas de infraestrutura e transportes coletivos, inclusive por meio da conversão de usos e “retrofit”;',
            'Melhorar as condições de vida da população e reduzir as desigualdades territoriais existentes, melhorando a oferta de serviços, equipamentos e infraestrutura em todos os Distritos;',
            'Acomodar o crescimento urbano nas áreas subutilizadas da cidade dotadas de infraestrutura e no entorno da rede de transporte coletivo de alta e média capacidade (Metrô, CPTM, Monotrilho, Corredores de ônibus, etc);'
          ],
          respostas_1_dir: [
            'Expandir as redes de transporte coletivo de alta e média capacidade (Metrô, CPTM, Monotrilho, Corredores de ônibus, etc) e os modos não motorizados (bicicletas, patinetes, etc), racionalizando o uso de automóvel;',
            'Priorizar o adensamento construtivo e populacional nos eixos de mobilidade e por meio da implementação dos Projetos de Intervenção Urbana (PIU);',
            'Conter o processo de expansão horizontal da cidade e preservar o cinturão verde/ambiental urbano, melhorando as condições de regularização fundiária;',
            'Manter a proteção das Zonas Exclusivamente Residenciais - ZER, direcionando-se a demanda construtiva para as áreas pouco aproveitadas que comportam a oferta de potencial construtivo, como nas áreas ao longo de corredores de ônibus, sistema ferroviário, entorno de grandes rios e rodovias;',
            'Aprimorar a execução dos instrumentos da Política Urbana, promovendo-se a revisão dos elementos e ações que eram “previstos” e “propostos” em 2014, que já tenham sido implementados, ou que eventualmente tenham perdido interesse em razão da Pandemia de COVID-19 e suas consequências;',
            'Promover ajustes, calibragens e melhorias nos atuais instrumentos da Política Urbana, considerando as metas atingidas ou não, visando as correções necessárias e a proposição de novos instrumentos que busquem avançar na agenda já definida pelo PDE.'
          ],
          respostas_2: [
            'Melhorar a forma de apropriação dos espaços públicos considerando a ampliação de espaços abertos seguros para recreação e convivência e a implantação de áreas verdes de pequeno porte em locais estratégicos no interior dos bairros;',
            'Fortalecer as atividades econômicas sustentáveis ligadas às demandas de abastecimento e segurança alimentar das populações mais vulneráveis',
            'Transformar assentamentos precários em bairros, integrá-los à cidade e promover habitação acessível para os paulistanos.'
          ],
          subprefeituras: [
            'Aricanduva/Formosa/Carrão',
            'Butantã',
            'Campo Limpo',
            'Capela do Socorro',
            'Casa Verde/Cachoeirinha',
            'Cidade Ademar',
            'Cidade Tiradentes',
            'Ermelino Matarazzo',
            'Freguesia/Brasilândia',
            'Guaianases',
            'Ipiranga',
            'Itaim Paulista',
            'Itaquera',
            'Jabaquarara',
            'Jaçanã/Tremembé',
            'Lapa',
            'M\'Boi Mirim',
            'Mooca',
            'Parelheiros',
            'Penha',
            'Perus',
            'Pinheiros',
            'Pirituba/Jaraguá',
            'Santana/Tucuruvi',
            'Santo Amaro',
            'São Mateus',
            'São Miguel',
            'Sapopemba',
            'Sé',
            'Vila Maria/Vila Guilherme',
            'Vila Mariana',
            'Vila Prudente'
          ]
        },
        methods: {
          exibeModal: function() {
            var modal = document.getElementById("modalEnvio");
            modal.style.display = "flex";
          }
        }
      })
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>