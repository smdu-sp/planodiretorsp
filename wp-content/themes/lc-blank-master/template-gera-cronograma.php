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
        <table v-for="ano in anos" class="cronograma-tabela">
          <caption>{{ ano }}</caption>
          <tr>
            <th scope="col" colspan="2" class="cronograma-header" id="etapa">Etapa</th>
            <th scope="col" colspan="12" class="cronograma-header">Período</th>
          </tr>
          <tr aria-hidden="true">
            <td colspan=2></td>
            <th scope="col" v-for="mes in mesesAbrev" class="cronograma-meses">{{ mes }}</th>
          </tr>
          <tr v-for="processo, key in processos.filter(processo => processo.ano === ano)">
            <th scope="row" v-html="processo.ordem"></th>
            <td class="cronograma-evento"><span class="cronograma-strong" v-html="processo.nome"></span></td>
            <td v-for="index in (processo.meses.length === 0 ? 0 : processo.meses[0])" class="cronograma-meses" aria-hidden="true"></td>
            <td v-for="index in (processo.meses.length === 0 ? 1 : processo.meses.length)" v-html="index == 1 ? calculaDuracao(processo.ordem) : ''" :class="processo.meses.length === 0 ? 'nao-definido cronograma-meses' : etapas[processo.etapa].cor + ' cronograma-meses'" :title="processo.meses.length === 0 ? 'Não definido' : etapas[processo.etapa].nome" :aria-hidden="index == 1 ? false : true"></td>
            <td v-for="index in (processo.meses.length === 0 ? 11 : 12 - processo.meses.length - processo.meses[0])" class="cronograma-meses" aria-hidden="true"></td>
          </tr>
        </table>

        <div class="container-legenda">
          <div class="legenda-cronograma" aria-hidden="true">
            <div v-for="etapa, key in etapas" class="legenda-container">
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
    </div>

    <script type='text/javascript' src='../wp-content/themes/lc-blank-master/cronograma.js'></script>

<?php
  endwhile;
endif;

get_footer();
?>