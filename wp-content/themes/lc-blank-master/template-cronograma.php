<?php
/*
Template Name: Cronograma
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <link rel="stylesheet" href="../wp-content/themes/lc-blank-master/cronograma.css">

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
                  <span class="cronograma-strong">
                    <p>Planejamento da revisão intermediária do PDE</p>
                  </span>
                </td>
                <td title="Planejamento" class="rosa cronograma-meses">
                  Janeiro à Março
                </td>
                <td title="Planejamento" aria-hidden="true" class="rosa cronograma-meses"></td>
                <td title="Planejamento" aria-hidden="true" class="rosa cronograma-meses"></td>
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
                  <span class="cronograma-strong">
                    <p>
                      Apresentação do cronograma revisão intermediária do PDE
                    </p>
                  </span>
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
                  <span class="cronograma-strong">
                    <p>Reunião e providências iniciais no âmbito do CMPU</p>
                  </span>
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
                  <span class="cronograma-strong">
                    <p>
                      Atualização dos dados de monitoramento do PDE (Planurb)
                    </p>
                  </span>
                </td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Janeiro à Abril
                </td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
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
                  <span class="cronograma-strong">
                    <p>
                      Chamamento Público para divulgação e estímulo da participação de
                      entidades da sociedade civil
                    </p>
                  </span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Abril e Maio
                </td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
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
                  <span class="cronograma-strong">
                    <p>Operação da plataforma digital da revisão</p>
                  </span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Março à Dezembro
                </td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong">
                    <p>
                      Realização dos estudos técnicos para apoio no diagnóstico e
                      avaliação do PDE
                    </p>
                  </span>
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
                  <span class="cronograma-strong">
                    <p>
                      Recebimento da participação popular pela plataforma digital
                    </p>
                  </span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Participação Social" class="salmao cronograma-meses">
                  Maio à Outubro
                </td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">9</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong">
                    <p>
                      Elaboração de relatório de diagnóstico inicial do PDE - Planurb
                    </p>
                  </span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Abril à Julho
                </td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong">
                    <p>
                      Reuniões com órgãos técnicos das secretarias municipais e do
                      Comitê Intersecretarial para Revisão do PDE
                    </p>
                  </span>
                </td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td title="Diagnóstico" class="laranja cronograma-meses">
                  Maio à Dezembro
                </td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong">
                    <p>
                      Reuniões com segmentos da sociedade civil cadastradas no
                      chamamento público
                    </p>
                  </span>
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
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td title="Participação Social" aria-hidden="true" class="salmao cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
                <td aria-hidden="true" class="cronograma-meses"></td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td class="cronograma-evento">
                  <span class="cronograma-strong">
                    <p>
                      Sistematização das contribuições recebidas via plataforma
                      digital e no âmbito das reuniões temáticas com a sociedade civil
                    </p>
                  </span>
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
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
                <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
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
          <h4 class="calendario-etapa">ETAPA 01</h4>
          <table class="calendario-tabela">
            <caption class="calendario-rosa">
              Março
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
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
                  Debate sobre a proposta de Cronograma da Participação Social - Etapa 1
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">21</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Extraordinária CMPU
                </td>
                <td class="calendario-descricao">
                  Deliberação sobre o Cronograma da Participação Social - Etapa 1
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-laranja">
              Abril
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
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
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">13</span>
                </td>
                <td colspan="2" class="calendario-evento">Divulgação do Diagnóstico</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="1" class="calendario-evento">Reunião Ordinária do CMPU</td>
                <td class="calendario-descricao">
                  Deliberação da adequação do Cronograma da Participação Social - Etapa
                  1
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
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">25</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Abertura da 1ª Consulta Pública Participe+ (41 dias)
                </td>
                <td class="calendario-descricao">
                  Abertura do Participe+ para contribuições
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-azul">
              Maio
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">02</span>
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
                <td colspan="1" class="calendario-evento">08 Oficinas presenciais</td>
                <td class="calendario-descricao">
                  Pirituba/Jaraguá, Perus, Freguesia do Ó/Brasilândia, Casa
                  Verde/Cachoeirinha, Santana/Tucuruvi, Jaçanã/Tremembé, Vila Maria/Vila
                  Guilherme e Lapa
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-vermelho">
              Julho
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">04</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reabertura da 1ª Consulta Pública Participe+
                </td>
                <td class="calendario-descricao">
                  Abertura do Participe+ para contribuições
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">05</span>
                </td>
                <td colspan="1" class="calendario-evento">Reunião do CMPU</td>
                <td class="calendario-descricao">
                  Apresentação do novo calendário para retomada da Participação Social -
                  Etapa 1
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">19</span>
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
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">20</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião virtual vespertina
                </td>
                <td class="calendario-descricao">Segmento Movimentos Populares</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">21</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Meio Ambiente e Mudanças Climáticas: Instrumentos de Gestão Ambiental
                  nas Zonas Urbana e Rural
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">23</span>
                </td>
                <td colspan="1" class="calendario-evento">08 Oficinas presenciais</td>
                <td class="calendario-descricao">
                  Parelheiros, Capela do Socorro, M'Boi Mirim, Campo Limpo, Santo Amaro,
                  Cidade Ademar, Butantã e Pinheiros
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">25</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Temática virtual noturna
                </td>
                <td class="calendario-descricao">
                  Desenvolvimento Social, Sistema de Equipamentos e Segurança Alimentar:
                  Objetivos Setoriais, Elementos Constituintes, Planos e Ações
                  Prioritárias
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">26</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião virtual vespertina
                </td>
                <td class="calendario-descricao">
                  Segmento Acadêmico Entidades de Classe
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">27</span>
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
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">30</span>
                </td>
                <td colspan="1" class="calendario-evento">08 Oficinas presenciais</td>
                <td class="calendario-descricao">
                  Ermelino Matarazzo, São Miguel Paulista, Itaim Paulista, Guaianazes,
                  Cidade Tiradentes, Itaquera, São Mateus e Penha
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-rosa">
              Agosto
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">02</span>
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
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">03</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Virtual vespertina
                </td>
                <td class="calendario-descricao">Segmento Empresarial</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">04</span>
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
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SÁB</span>
                  <span class="calendario-dia">06</span>
                </td>
                <td colspan="1" class="calendario-evento">08 Oficinas presenciais</td>
                <td class="calendario-descricao">
                  Sapopemba, Vila Prudente, Aricanduva/Formosa/Carrão, Mooca, Sé, Vila
                  Mariana, Ipiranga e Jabaquara
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">08</span>
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
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">12</span>
                </td>
                <td colspan="2" class="calendario-evento">
                  Encerramento da 1ª Consulta Pública no Participe+
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">22</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Encontro com COMUSAN
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Segurança Alimentar e Nutricional
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">26</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Encontro com Povos Indígenas de Parelheiros
                </td>
                <td class="calendario-descricao">
                  Território Indígena Tenonde Porã - Parelheiros
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-rosa-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">29</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião com CMPU
                </td>
                <td class="calendario-descricao">
                  Apresentação dos Fundamentos da Revisão e Elementos do Processo Participativo<br>Apresentação das agendas - Etapas 2 e 3
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-laranja">
              Setembro
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">TER</span>
                  <span class="calendario-dia">06</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Encontro Povos Indígenas do Jaraguá
                </td>
                <td class="calendario-descricao">
                  Aldeia Yvy Porã - Jaraguá
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">08</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Publicação da Sistematização da Etapa 1
                </td>
                <td class="calendario-descricao">
                  Divulgação do Relatório da Sistematização da Participação Social - Etapa 1
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">15</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião com CMPU
                </td>
                <td class="calendario-descricao">
                  Apresentação da Sistematização, das Proposta de Limites da Revisão e das Agendas para as Etapas 2 e 3
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">23</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Publicação dos Limites da Revisão
                </td>
                <td class="calendario-descricao">
                  Divulgação do Relatório
                </td>
              </tr>
            </tbody>
          </table>
          <h4 class="calendario-etapa" id="etapa-2">ETAPA 02</h4>
          <table class="calendario-tabela">
            <caption class="calendario-laranja">
              Setembro
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-laranja-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">23</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Abertura da 2ª Consulta Pública no Participe+
                </td>
                <td class="calendario-descricao">
                  Abertura do Participe+ para recebimento de propostas
                </td>
              </tr>
            </tbody>
          </table>
          <table class="calendario-tabela">
            <caption class="calendario-azul">
              Outubro
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMTT
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Trânsito e Transporte
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">14</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião FUNDURB
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Fundo Municipal de Desenvolvimento Urbano
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">19</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CIMPDE
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Comitê Intersecretarial de Monitoramento e Avaliação da Implementação do Plano Diretor Estratégico
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUA</span>
                  <span class="calendario-dia">19</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CADES
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal do Meio Ambiente e Desenvolvimento Sustentável
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">QUI</span>
                  <span class="calendario-dia">20</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMPU
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Política Urbana
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEX</span>
                  <span class="calendario-dia">21</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CTLU
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes da Câmara Técnica de Legislação Urbanística
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome">SEG</span>
                  <span class="calendario-dia">24</span>
                </td>
                <td colspan="2" class="calendario-evento">
                  Encerramento da 2ª Consulta Pública no Participe+
                </td>
              </tr>
              <tr>
                <td colspan="3" class="etapa-indefinido">ETAPA 02 - datas a confirmar</td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMDE
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal da Pessoa com Deficiência
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  CADES regionais
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes das regionais do Conselho Municipal do Meio Ambiente e Desenvolvimento Sustentável
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião Conselhos Participativos Municipais - CPM
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes dos Conselhos Participativos Municipais
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMDRSS + <br>Reunião COMUSAN
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Desenvolvimento Rural Sustentável e Solidário e do Conselho Municipal de Segurança Alimentar e Nutricional
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMH
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Habitação
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  SEMINÁRIO presencial
                </td>
                <td class="calendario-descricao">
                  Data e local a confirmar
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CONPRESP
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Preservação do Patrimônio Histórico, Cultural e Ambiental
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião COMPISP
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal dos Povos Indígenas
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMDE
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Desenvolvimento Econômico
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-azul-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMSSP
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Saúde
                </td>
              </tr>
            </tbody>
          </table>
          <h4 class="calendario-etapa">ETAPA 03 - datas a confirmar</h4>
          <table class="calendario-tabela">
            <caption class="calendario-vermelho">
              Novembro / Dezembro
            </caption>
            <colgroup>
              <col class="col-1" />
              <col class="col-2" />
              <col class="col-3" />
            </colgroup>
            <thead>
              <tr>
                <th>Data</th>
                <th class="calendario-evento">Evento</th>
                <th class="calendario-descricao">Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Minuta do Projeto de Lei <br>Abertura da 3ª Consulta Pública do Participe+
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Saúde
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Pública Virtual
                </td>
                <td class="calendario-descricao">
                  Discussão da minuta do Projeto de Lei
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Pública Presencial
                </td>
                <td class="calendario-descricao">
                  Discussão da minuta do Projeto de Lei
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Pública Virtual
                </td>
                <td class="calendario-descricao">
                  Discussão da minuta do Projeto de Lei
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="2" class="calendario-evento">
                  Encerramento da 3ª Consulta Pública no Participe+
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Prazo limite para envio do Projeto <br>de Lei à CMSP
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CMPU
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes do Conselho Municipal de Política Urbana
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Reunião CTLU
                </td>
                <td class="calendario-descricao">
                  Reunião com integrantes da Câmara Técnica de Legislação Urbanística
                </td>
              </tr>
              <tr>
                <td class="calendario-data calendario-vermelho-claro">
                  <span class="calendario-dia-nome indefinido" aria-hidden="true">-</span>
                  <span class="calendario-dia indefinido" aria-hidden="true">-</span>
                </td>
                <td colspan="1" class="calendario-evento">
                  Audiência Pública Devolutiva <br>Final virtual
                </td>
                <td class="calendario-descricao">
                  Apresentação da minuta final do Projeto de Lei
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
