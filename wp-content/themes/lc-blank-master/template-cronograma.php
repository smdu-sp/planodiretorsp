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
                </div>
              </div>
              <div class="legenda-container">
                <div class="laranja legenda-barra"></div>
                <div class="texto-laranja">
                  <span>DIAGNÓSTICO</span> <br />
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
        <div id="calendario-2022">
          <h3 class="calendario-ano">2022</h3>
          <table class="calendario-tabela">
            <caption class="calendario-rosa">
              Março
            </caption>
            <thead>
              <tr>
                <th>Data</th>
                <th>Evento</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="1" class="calendario-evento">Reunião GT CMPU</td>
                <td class="calendario-descricao">
                  Debate sobre a proposta de Cronograma da participação Social - Etapa 1
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">21</span>
                </td>
                <td colspan="1" class="calendario-evento">Extraordinária CMPU</td>
                <td class="calendario-descricao">
                  Deliberação sobre o Cronograma da - Etapa 1
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-laranja">
              Abril
            </caption>
            <thead>
              <tr>
                <th>Data</th>
                <th>Evento</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">06</span>
                </td>
                <td colspan="1" class="calendario-evento">Reunião Virtual noturna</td>
                <td class="calendario-descricao">
                  Com os representantes dos 32 Conselhos Participativos Municipais
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="2" class="calendario-evento">Reunião Ordinária do CMPU</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">18</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Abertura da 1ª Consulta Pública Participe+ (41 dias)
                </td>
                <td class="calendario-descricao">
                  Apresentação do Diagnóstico, Identificação dos Limites da Revisão e
                  Temas Prioritários / Contribuições
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">20</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Extraordinária do CMPU
                </td>
                <td class="calendario-descricao">Apresentação do Diagnóstico</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">28</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Ordenamento Territorial: Instrumentos de Ordenamento e Reestruturação
                  Urbana e do Direito de Construir
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">30</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  07 (sete) Oficinas presenciais com transmissão pelo YouTube (uma em
                  cada Subprefeitura)
                </td>
                <td class="calendario-descricao">
                  Perus, Pirituba/ Jaraguá, Freguesia/ Brasilândia, Casa Verde/
                  Cachoeirinha Santana/ Tucuruvi, Jaçanã/ Tremembé, Vila Maria/ Vila
                  Guilherme;
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-azul">
              Maio
            </caption>
            <thead>
              <tr>
                <th>Data</th>
                <th>Evento</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">03</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Mobilidade Urbana: Objetivos Setoriais, Elementos Constituintes,
                  Planos e Ações prioritárias
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">05</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Habitação Social e Política Fundiária: Instrumentos da Função Social
                  da Propriedade, de Regularização Fundiária e do Direito de Construir,
                  Áreas de risco
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">07</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  08 (oito) Oficinas presenciais com transmissão pelo YouTube (uma em
                  cada Subprefeitura)
                </td>
                <td class="calendario-descricao">
                  Penha, Mooca, Aricanduva/ Formosa/ Carrão, Vila Prudente Sapopemba,
                  São Mateus, Itaquera, Cidade Tiradentes
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">09</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Gestão Democrática e Sistema de Planejamento: Elementos do Sistema,
                  Instâncias e Instrumentos de Participação Social, Fundurb e
                  Monitoramento do PDE
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">10</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Virtual vespertina
                </td>
                <td class="calendario-descricao">Segmento Empresarial</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">11</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Meio ambiente e mudanças climáticas: Instrumentos de Gestão Ambiental
                  nas Zonas Urbana e Rural
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">12</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Virtual vespertina
                </td>
                <td class="calendario-descricao">Segmento Movimentos Populares</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  08 (oito) Oficinas presenciais com transmissão pelo YouTube (uma em
                  cada Subprefeitura)
                </td>
                <td class="calendario-descricao">
                  Lapa, Sé, Pinheiros, Butantã, Vila Mariana, Ipiranga, Jabaquara, Santo
                  Amaro
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">17</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Desenvolvimento Econômico Sustentável: Objetivos Setoriais, Elementos
                  Constituintes, Planos e Ações Prioritárias nas Zonas Urbana e Rural
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">18</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Virtual Vespertina
                </td>
                <td class="calendario-descricao">
                  Segmento Acadêmico/ Entidades de Classe
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">19</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Desenvolvimento Social, Sistema de Equipamentos e Segurança Alimentar:
                  Objetivos Setoriais, Elementos Constituintes, Planos e Ações
                  Prioritárias.
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">20</span>
                </td>
                <td colspan="2" class="calendario-evento">Reunião CIMPDE</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">21</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  09 (nove) Oficinas presenciais com transmissão pelo YouTube (uma em
                  cada Subprefeitura)
                </td>
                <td class="calendario-descricao">
                  Ermelino Matarazzo, São Miguel, Itaim Paulista, Guaianases Campo
                  Limpo, M'Boi Mirim, Cidade Ademar, Capela do Socorro, Parelheiros
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">23</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Patrimônio e Políticas Culturais: Instrumentos de Proteção ao
                  Patrimônio Cultural
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">25</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Instrumentos de Política Urbana e Gestão Ambiental: Grupos de
                  Instrumentos
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">DOM</span>
                  <span class="calendario-dia">29</span>
                </td>
                <td colspan="2" class="calendario-evento">
                  Encerramento da 1ª Consulta Pública Participe+
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php
  endwhile;
endif;

get_footer();
?>