<?php
/*
Template Name: Cronograma
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <link rel="stylesheet" href="../wp-content/themes/lc-blank-master/cronograma.css">

    <div class="cronograma-container">
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
            <td><span class="cronograma-strong">Apresentação do cronograma revisão intermediária do PDE</span></td>
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
            <td><span class="cronograma-strong">Reunião e providências iniciais no âmbito do CMPU</span></td>
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
            <td><span class="cronograma-strong">Atualização dos dados de monitoramento do PDE (Planurb)</span></td>
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
            <td><span class="cronograma-strong">Chamamento Público para divulgação e estímulo da participação de entidades da sociedade civil</span></td>
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
            <td><span class="cronograma-strong">Operação da plataforma digital da revisão</span></td>
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
            <td><span class="cronograma-strong">Realização dos estudos técnicos para apoio no diagnóstico e avaliação do PDE</span></td>
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
            <td><span class="cronograma-strong">Recebimento da participação popular pela plataforma digital</span></td>
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
            <td><span class="cronograma-strong">Elaboração de relatório de diagnóstico inicial do PDE – Planurb</span></td>
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
            <td><span class="cronograma-strong">Reuniões com órgãos técnicos das secretarias municipais e do Comitê Intersecretarial para Revisão do PDE</span></td>
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
            <td><span class="cronograma-strong">Reuniões com segmentos da sociedade civil cadastradas no chamamento público</span></td>
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
            <td><span class="cronograma-strong">Sistematização das contribuições recebidas via plataforma digital e no âmbito das reuniões temáticas com a sociedade civil</span></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td aria-hidden="true" class="cronograma-meses"></td>
            <td title="Participação Social" class="vermelho cronograma-meses">Outubro à Dezembro</td>
            <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
            <td title="Participação Social" aria-hidden="true" class="vermelho cronograma-meses"></td>
          </tr>
        </tbody>
      </table>
      <table class="cronograma-tabela" style="margin-top: 60px">
        <caption>2022</caption>
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
            <th scope="row">13</th>
            <td class="cronograma-evento"><span class="cronograma-strong">Realização de oficina live</span></td>
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
            <th scope="row">14</th>
            <td><span class="cronograma-strong">Apresentação dos resultados do diagnóstico técnico do PDE e do escopo da revisão</span></td>
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
            <th scope="row">15</th>
            <td><span class="cronograma-strong">Elaboração da primeira proposta <strong>(P1)</strong> de revisão do PDE, baseada no diagnóstico técnico e nas contribuições. </span></td>
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
            <th scope="row">16</th>
            <td><span class="cronograma-strong">Publicação da primeira proposta <strong>(P1)</strong> na plataforma digital e recebimento de contribuições </span></td>
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
            <th scope="row">17</th>
            <td><span class="cronograma-strong">Apresentação da primeira proposta de revisão <strong>(P1)</strong> aos órgãos colegiados</span></td>
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
            <th scope="row">18</th>
            <td><span class="cronograma-strong">Realização de eventuais ajustes propostos pelos órgãos colegiados e formação da segunda versão <strong>(P2)</strong> de proposta de revisão</span></td>
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
            <th scope="row">19</th>
            <td><span class="cronograma-strong">Publicação da proposta de revisão na plataforma digital da revisão <strong>(P2)</strong> e recebimento das contribuições</span></td>
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
            <th scope="row">20</th>
            <td><span class="cronograma-strong">Realização de audiências públicas, regionais e temáticas, para apresentação da proposta de revisão <strong>(P2)</strong></span></td>
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
            <th scope="row">21</th>
            <td><span class="cronograma-strong">Sistematização das contribuições recebidas via plataforma digital, oficinas e no âmbito das audiências públicas</span></td>
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
            <th scope="row">22</th>
            <td><span class="cronograma-strong">Elaboração da terceira proposta de revisão <strong>(P3)</strong>, consideradas as contribuições recebidas</span></td>
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
            <th scope="row">23</th>
            <td><span class="cronograma-strong">Apresentação da terceira proposta de revisão <strong>(P3)</strong> aos órgãos colegiados e publicação na plataforma digital</span></td>
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
            <th scope="row">24</th>
            <td><span class="cronograma-strong">Realização de eventuais ajustes propostos pelos órgãos colegiados à <strong>(P3)</strong> e formação da quarta versão <strong>(P4)</strong> de proposta de revisão do PDE</span></td>
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
            <th scope="row">25</th>
            <td><span class="cronograma-strong">Publicação da quarta proposta <strong>(P4)</strong> de revisão na plataforma digital da revisão</span></td>
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
            <th scope="row">26</th>
            <td><span class="cronograma-strong">Realização da devolutiva das audiências públicas para apresentação da quarta versão <strong>(P4)</strong> da proposta de revisão</span></td>
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
            <th scope="row">27</th>
            <td><span class="cronograma-strong">Sistematização final das contribuições, finalização da instrução do respectivo processo administrativo de revisão</span></td>
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
            <th scope="row">28</th>
            <td><span class="cronograma-strong"><strong>Envio da minuta final a Câmara Municipal</strong></span></td>
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
            <div class="texto-vermelho"><span>PARTICIPAÇÃO SOCIAL</span> <br> <span class="legenda-subtitulo">MODELO HÍBRIDO</span></div>
          </div>
          <div class="legenda-container">
            <div class="azul legenda-barra"></div>
            <div class="texto-azul"><span>ELABORAÇÃO DA MINUTA FINAL DE PL</span><br></div>
          </div>
        </div>
      </div>
    </div>

<?php
  endwhile;
endif;

get_footer();
?>
