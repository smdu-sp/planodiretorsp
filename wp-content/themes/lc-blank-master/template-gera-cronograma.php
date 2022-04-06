<?php
/*
Template Name: Geração Cronograma
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    include_once 'modulo-vue.php';

?>

    <link rel="stylesheet" href="../wp-content/themes/lc-blank-master/cronograma.css">

    <div class="cronograma-corpo">
      <div id="appcronograma" class="cronograma-container">
        <h2>Cronograma</h2>
        <div v-for="ano in anosCronograma">
          <table class="cronograma-tabela">
            <caption>{{ ano }}</caption>
            <thead>
              <tr>
                <th scope="col" colspan="2" class="cronograma-header" id="etapa">Etapa</th>
                <th scope="col" colspan="12" class="cronograma-header">Período</th>
              </tr>
            </thead>
            <tr aria-hidden="true">
              <td colspan=2></td>
              <th scope="col" v-for="mes in mesesCronograma" class="cronograma-meses">{{ mesesAbrev[mes] }}</th>
            </tr>
            <tr v-for="processo, key in processos.filter(processo => processo.tipo == 'cronograma' && processo.ano === ano)">
              <th scope="row" v-html="key + 1"></th>
              <td class="cronograma-evento"><span class="cronograma-strong" v-html="processo.nome"></span></td>
              <td v-for="index in (processo.meses.length === 0 ? 0 : processo.meses[0])" class="cronograma-meses" aria-hidden="true"></td>
              <td v-for="index in (processo.meses.length === 0 ? 1 : processo.meses.length)" v-html="index == 1 ? calculaDuracao(processo.ordem) : ''" :class="processo.meses.length === 0 ? 'nao-definido cronograma-meses' : etapas[processo.etapa].cor + ' cronograma-meses'" :title="processo.meses.length === 0 ? 'Não definido' : etapas[processo.etapa].nome" :aria-hidden="index == 1 ? false : true"></td>
              <td v-for="index in (processo.meses.length === 0 ? 11 : 12 - processo.meses.length - processo.meses[0])" class="cronograma-meses" aria-hidden="true"></td>
            </tr>
          </table>

          <div class="container-legenda">
            <div class="legenda-cronograma" aria-hidden="true">
              <div v-for="etapa, key in etapas.filter(etapa => etapa.ano === ano)" class="legenda-container">
                <div :class="etapa.cor + ' legenda-barra'"></div>
                <div :class="'texto-'+etapa.cor">
                  <span>{{ etapa.nome.toUpperCase() }}</span>
                  <br />
                  <span v-if="etapa.subtitulo" class="legenda-subtitulo">{{ etapa.subtitulo.toUpperCase() }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div :id="'calendario-' + ano" v-for="ano in anosCalendario">
          <h3 class="calendario-ano">{{ ano }}</h3>
          <table class="calendario-tabela" v-for="mes, indice in mesesCalendario">
            <caption :class="'calendario-' + mesesCores[indice % mesesCores.length]">{{ meses[mes] }}</caption>
            <thead>
              <tr>
                <th>Data</th>
                <th>Evento</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="evento in processos.filter(processo => processo.tipo == 'calendario' && processo.ano == ano && processo.meses[0] == mes)">
                <td :class="'calendario-data calendario-' + mesesCores[indice % mesesCores.length] + '-claro'">
                  <span class="calendario-dia-nome">{{ evento.dia_semana }}</span>
                  <span class="calendario-dia">{{ evento.dia.padStart(2, '0') }}</span>
                </td>
                <td class="calendario-evento" :colspan="evento.descricao ? 1 : 2">{{ evento.nome }}</td>
                <td class="calendario-descricao" v-if="evento.descricao">{{ evento.descricao }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script type='text/javascript' src='../wp-content/themes/lc-blank-master/cronograma.js'></script>

<?php
  endwhile;
endif;

get_footer();
?>