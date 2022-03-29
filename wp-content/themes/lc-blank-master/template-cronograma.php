<?php
/*
Template Name: Cronograma
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <link rel="stylesheet" href="../wp-content/themes/lc-blank-master/cronograma-v1.9.css">

    <div class="cronograma-corpo">
      <div class="cronograma-container">
        <h2>Cronograma</h2>
        <div>
          <table class="cronograma-tabela">
            <caption>
              2021
            </caption>
            <tbody>
              <tr>
                <th scope="col" colspan="2" id="etapa" class="cronograma-header">
                  Etapa
                </th>
                <th scope="col" colspan="12" class="cronograma-header">Período</th>
              </tr>
              <tr aria-hidden="true">
                <td colspan="2"></td>
                <th scope="col" class="cronograma-meses">JAN</th>
                <th scope="col" class="cronograma-meses">FEV</th>
                <th scope="col" class="cronograma-meses">MAR</th>
                <th scope="col" class="cronograma-meses">ABR</th>
                <th scope="col" class="cronograma-meses">MAI</th>
                <th scope="col" class="cronograma-meses">JUN</th>
                <th scope="col" class="cronograma-meses">JUL</th>
                <th scope="col" class="cronograma-meses">AGO</th>
                <th scope="col" class="cronograma-meses">SET</th>
                <th scope="col" class="cronograma-meses">OUT</th>
                <th scope="col" class="cronograma-meses">NOV</th>
                <th scope="col" class="cronograma-meses">DEZ</th>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Planejamento da revisão intermediária do PDE</p></span
                  >
                </td>
                <td title="Planejamento" class="rosa cronograma-meses">
                  Janeiro à Março
                </td>
                <td
                  title="Planejamento"
                  aria-hidden="true"
                  class="rosa cronograma-meses"
                ></td>
                <td
                  title="Planejamento"
                  aria-hidden="true"
                  class="rosa cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Apresentação do cronograma revisão intermediária do PDE
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Planejamento" class="rosa cronograma-meses">Março</td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião e providências iniciais no âmbito do CMPU</p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Abril
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Atualização dos dados de monitoramento do PDE (Planurb)
                    </p></span
                  >
                </td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Janeiro à Abril
                </td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Chamamento Público para divulgação e estímulo da participação de
                      entidades da sociedade civil
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Abril e Maio
                </td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Operação da plataforma digital da revisão</p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Março à Dezembro
                </td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Realização dos estudos técnicos para apoio no diagnóstico e
                      avaliação do PDE
                    </p></span
                  >
                </td>
                <td title="Não definido" class="nao-definido cronograma-meses">
                  Não definido
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Recebimento da participação popular pela plataforma digital
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Maio à Outubro
                </td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">9</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Elaboração de relatório de diagnóstico inicial do PDE - Planurb
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Abril à Julho
                </td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Reuniões com órgãos técnicos das secretarias municipais e do
                      Comitê Intersecretarial para Revisão do PDE
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Maio à Dezembro
                </td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Reuniões com segmentos da sociedade civil cadastradas no
                      chamamento público
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Agosto à Outubro
                </td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td
                  title="Participação Social"
                  aria-hidden="true"
                  class="salmao cronograma-meses"
                ></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Sistematização das contribuições recebidas via plataforma
                      digital e no âmbito das reuniões temáticas com a sociedade civil
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Outubro à Dezembro
                </td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
                <td
                  title="Diagnóstico"
                  aria-hidden="true"
                  class="laranja cronograma-meses"
                ></td>
              </tr>
            </tbody>
          </table>
          <div class="container-legenda">
            <div aria-hidden="true" class="legenda-cronograma">
              <div class="legenda-container">
                <div class="rosa legenda-barra"></div>
                <div class="texto-rosa">
                  <span>PLANEJAMENTO</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="laranja legenda-barra"></div>
                <div class="texto-laranja">
                  <span>DIAGNÓSTICO</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="salmao legenda-barra"></div>
                <div class="texto-salmao">
                  <span>PARTICIPAÇÃO SOCIAL</span> <br />
                  <span class="legenda-subtitulo">MODELO HÍBRIDO</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <table class="cronograma-tabela tabela-2022">
            <caption>
              2022
            </caption>
            <tbody>
              <tr>
                <th scope="col" colspan="2" id="etapa" class="cronograma-header">
                  Etapa
                </th>
                <th scope="col" colspan="3" class="cronograma-header">Período</th>
              </tr>
              <tr aria-hidden="true">
                <td colspan="2"></td>
                <th scope="col" class="cronograma-meses">MAR</th>
                <th scope="col" class="cronograma-meses">ABR</th>
                <th scope="col" class="cronograma-meses">MAI</th>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião GT CMPU</p>
                    Debate sobre a proposta de Cronorama da Participação Social -
                    Etapa 1</span
                  >
                </td>
                <td title="Reuniões Colegiados" class="rosa cronograma-meses">
                  Março
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Extraordinária CMPU</p>
                    Deliberação sobre o Cronograma da Etapa 1</span
                  >
                </td>
                <td title="Reuniões Colegiados" class="rosa cronograma-meses">
                  Março
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Reunião Virtual noturna
                      <span>com os Representantes dos</span> 32 Conselhos
                      Participativos Municipais
                    </p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td
                  title="Agendas Gerais e Territoriais"
                  class="azul-claro cronograma-meses"
                >
                  Abril
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>
                      Abertura da 1ª Consulta Pública Participe+
                      <span>(41 dias)</span>
                    </p>
                    Apresentação do Diagnóstico, Identificação dos Limites da Revisão
                    e Temas Prioritários / Contribuições</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Consulta Eletrônica" class="laranja cronograma-meses">
                  Abril
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião Ordinária do CMPU</p>
                    Apresentação do Diagnóstico</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Reuniões Colegiados" class="rosa cronograma-meses">
                  Abril
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Ordenamento Territorial: Instrumentos de Ordenamento e
                    Reestruturação Urbana e do Direito de Construir</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Abril</td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Mobilidade Urbana: Objetivos Setoriais, Elementos Constituintes,
                    Planos e Ações prioritárias</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Abril</td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Habitação Social e Política Fundiária: Instrumentos da Função
                    Social da Propriedade, de Regularização Fundiária e do Direito de
                    Construir, áreas de risco</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Abril</td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">9</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>02 (duas) Oficinas presenciais + YouTube</p>
                    <ul>
                      <li>
                        Perus, Pirituba/ Jaraguá, Freguesia/ Brasilândia, Casa Verde/
                        Cachoeirinha;
                      </li>
                      <li>
                        Santana/ Tucuruvi, Jaçanã/ Tremembé, Vila Maria/ Vila
                        Guilherme;
                      </li>
                    </ul></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Oficinas Territoriais" class="salmao cronograma-meses">
                  Abril
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Desenvolvimento Econômico Sustentável: Objetivos Setoriais,
                    Elementos Constituintes, Planos e Ações Prioritárias nas Zonas
                    Urbana e Rural</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião Virtual vespertina</p>
                    Segmento Empresarial</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas por Segmentos" class="vermelho cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Meio Ambiente e Mudanças Climáticas: Instrumentos de Gestão
                    Ambiental nas Zonas Urbana e Rural</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">13</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião Virtual vespertina</p>
                    Segmento Movimentos Populares</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas por Segmentos" class="vermelho cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">14</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"><p>Reunião CIMPDE</p></span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Reuniões Colegiados" class="rosa cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">15</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>02 (duas) Oficinas presenciais + YouTube</p>
                    <ul>
                      <li>
                        Penha, Mooca, Aricanduva/ Formosa/ Carrão, Vila
                        Prudente;
                      </li>
                      <li>Sapopemba, São Mateus, Itaquera, Cidade Tiradentes;</li>
                    </ul></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Oficinas Territoriais" class="salmao cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">16</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Desenvolvimento Econômico Sustentável: Objetivos Setoriais,
                    Elementos Constituintes, Planos e Ações Prioritárias nas Zonas
                    Urbana e Rural</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">17</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Reunião Virtual vespertina</p>
                    Segmento Acadêmico / Entidades de Classes</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas por Segmentos" class="vermelho cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">18</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audiência Temática virtual noturna</p>
                    Desenvolvimento Social, Sistema de Equipamentos e Segurança
                    Alimentar: Objetivos Setoriais, Elementos Constituintes, Planos e
                    Ações Prioritárias</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">19</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>02 (duas) Oficinas presenciais + YouTube</p>
                    <ul>
                      <li>Lapa, Sé, Pinheiros, Butantã;</li>
                      <li>Vila Mariana, Ipiranga, Jabaquara, Santo Amaro;</li>
                    </ul></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Oficinas Territoriais" class="salmao cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">20</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audência Temática virtual noturna</p>
                    Patrimônio e Políticas Culturais: Instrumentos de Proteção ao
                    Patrimônio Cultural</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">21</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audência Temática virtual noturna</p>
                    Gestão Democrática e Sistema de Planejamento: Elementos do
                    Sistema, Instâncias e Instrumentos de Participação Social, Fundurb
                    e Monitoramento do PDE</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">22</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Audência Temática virtual noturna</p>
                    Instrumentos de Política Urbana e Gestão Ambiental: Grupos de
                    Instrumentos</span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Agendas Temáticas" class="azul cronograma-meses">Maio</td>
              </tr>
              <tr>
                <th scope="row">23</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"><p>Reunião CIMPDE</p></span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Reuniões Colegiados" class="rosa cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">24</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>02 (duas) Oficinas presenciais + YouTube</p>
                    <ul>
                      <li>
                        Ermelino Matarazzo, São Miguel, Itaim Paulista, Guaianases;
                      </li>
                      <li>
                        Campo Limpo, M'Boi Mirim, Cidade Ademar, Capela do Socorro,
                        Parelheiros;
                      </li>
                    </ul></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Oficinas Territoriais" class="salmao cronograma-meses">
                  Maio
                </td>
              </tr>
              <tr>
                <th scope="row">25</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong"
                    ><p>Encerramento da 1ª Consulta Pública Participe+</p></span
                  >
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Consulta Eletrônica" class="laranja cronograma-meses">
                  Maio
                </td>
              </tr>
            </tbody>
          </table>
          <div class="container-legenda">
            <div aria-hidden="true" class="legenda-cronograma">
              <div class="legenda-container">
                <div class="azul-claro legenda-barra"></div>
                <div class="texto-azul-claro">
                  <span>AGENDAS GERAIS E TERRITORIAIS</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="azul legenda-barra"></div>
                <div class="texto-azul">
                  <span>AGENDAS TEMÁTICAS</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="vermelho legenda-barra"></div>
                <div class="texto-vermelho">
                  <span>AGENDAS POR SEGMENTOS</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="salmao legenda-barra"></div>
                <div class="texto-salmao">
                  <span>OFICINAS TERRITORIAIS</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="laranja legenda-barra"></div>
                <div class="texto-laranja">
                  <span>CONSULTA ELETRÔNICA</span> <br />
                  <!---->
                </div>
              </div>
              <div class="legenda-container">
                <div class="rosa legenda-barra"></div>
                <div class="texto-rosa">
                  <span>REUNIÕES COLEGIADOS</span> <br />
                  <!---->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  endwhile;
endif;

get_footer();
?>