<?php
/*
Template Name: Cronograma
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <link rel="stylesheet" href="../wp-content/themes/lc-blank-master/cronograma-v1.4.css">

    <div class="cronograma-corpo">
      <div class="cronograma-container">
        <h2>Cronograma</h2>
        <table class="cronograma-tabela">
          <caption>2021</caption>
          <tbody>
            <tr>
              <th scope="col" colspan="2" id="etapa" class="cronograma-header">Etapa</th>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Planejamento da revisão intermediária do PDE</span></td>
              <td title="Planejamento" class="rosa cronograma-meses">Janeiro à Março</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Apresentação do cronograma revisão intermediária do PDE</span></td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Reunião e providências iniciais no âmbito do CMPU</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">Abril</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Atualização dos dados de monitoramento do PDE (Planurb)</span></td>
              <td title="Diagnóstico" class="laranja cronograma-meses">Janeiro à Abril</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Chamamento Público para divulgação e estímulo da participação de entidades da sociedade civil</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">Abril e Maio</td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Operação da plataforma digital da revisão</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">Março à Dezembro</td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td class="cronograma-evento"><span class="cronograma-strong">Realização dos estudos técnicos para apoio no diagnóstico e avaliação do PDE</span></td>
              <td title="Não definido" class="nao-definido cronograma-meses">Não definido</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Recebimento da participação popular pela plataforma digital</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">Maio à Outubro</td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">9</th>
              <td class="cronograma-evento"><span class="cronograma-strong">Elaboração de relatório de diagnóstico inicial do PDE - Planurb</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Diagnóstico" class="laranja cronograma-meses">Abril à Julho</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Reuniões com órgãos técnicos das secretarias municipais e do Comitê Intersecretarial para Revisão do PDE</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Diagnóstico" class="laranja cronograma-meses">Maio à Dezembro</td>
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
              <td class="cronograma-evento"><span class="cronograma-strong">Reuniões com segmentos da sociedade civil cadastradas no chamamento público</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">Agosto à Outubro</td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">12</th>
              <td class="cronograma-evento"><span class="cronograma-strong">Sistematização das contribuições recebidas via plataforma digital e no âmbito das reuniões temáticas com a sociedade civil</span></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Diagnóstico" class="laranja cronograma-meses">Outubro à Dezembro</td>
              <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
              <td title="Diagnóstico" aria-hidden="true" class="laranja cronograma-meses"></td>
            </tr>
          </tbody>
        </table>
        <table class="cronograma-tabela tabela-2022">
          <caption>
            2022
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
            </tr>
            <tr>
              <th scope="row">13</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Constituição de Grupo de Trabalho composto por membros do CMPU e da
                  SMUL para definição dos limites da revisão e detalhamento dos métodos
                  de participação social das diversas etapas</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Fevereiro
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">14</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Apresentação do Relatório de Monitoramento do Plano Diretor e
                  identificação dos temas prioritários</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Diagnóstico" class="laranja cronograma-meses">Março</td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">15</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Realização de Reuniões Temáticas virtuais</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Março
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">16</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Consulta pública na plataforma Participe+</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Março
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">17</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Elaboração coletiva de propostas para a revisão intermediária sobre
                  os temas identificados em etapa anterior</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Março à Maio
              </td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">18</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Realização de Oficinas regionalizadas</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Março à Maio
              </td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">19</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Consulta pública na plataforma Participe+</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Março à Maio
              </td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td
                title="Participação Social"
                aria-hidden="true"
                class="vermelho cronograma-meses"
              ></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">20</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Realização de Audiências públicas regionalizadas com apresentação da
                  minuta inicial</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Junho
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">21</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Consulta pública na plataforma Participe+</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Junho
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">22</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Elaboração de Minuta participativa online</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td title="Participação Social" class="vermelho cronograma-meses">
                Junho
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
            <tr>
              <th scope="row">23</th>
              <td class="cronograma-evento">
                <span class="cronograma-strong"
                  >Audiência geral devolutiva com apresentação da minuta final</span
                >
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td aria-hidden="true" class="cronograma-meses"></td>
              <td
                title="Elaboração da Minuta Final de PL"
                class="azul cronograma-meses"
              >
                Junho
              </td>
              <td aria-hidden="true" class="cronograma-meses"></td>
            </tr>
          </tbody>
        </table>

        <div class="container-legenda">
          <div aria-hidden="true" class="legenda-cronograma">
            <div class="legenda-container">
              <div class="rosa legenda-barra"></div>
              <div class="texto-rosa"><span>PLANEJAMENTO</span><br></div>
            </div>
            <div class="legenda-container">
              <div class="laranja legenda-barra"></div>
              <div class="texto-laranja"><span>DIAGNÓSTICO</span><br></div>
            </div>
            <div class="legenda-container">
              <div class="vermelho legenda-barra"></div>
              <div class="texto-vermelho"><span>PARTICIPAÇÃO SOCIAL</span><br><span class="legenda-subtitulo">MODELO HÍBRIDO</span></div>
            </div>
            <div class="legenda-container">
              <div class="azul legenda-barra"></div>
              <div class="texto-azul"><span>ELABORAÇÃO DA MINUTA FINAL DE PL</span><br></div>
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