<?php
/*
Template Name: Agenda
*/

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

the_content();

$vue = get_site_url() == 'http://planodiretorsp.prefeitura.sp.gov.br/' ? 'vue.min.js' : 'vue.js';

$isLocalhost = get_site_url() == 'http://localhost/planodiretorsp';

// include local
if ($localhosting)
{
		echo "<script type='text/javascript' src='./wp-content/themes/lc-blank-master/{$vue}'></script>";
		echo "<script type='text/javascript' src='./wp-content/themes/lc-blank-master/axios.min.js'></script>";
}
else
{
	echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/{$vue}'></script>";
	echo "<script type='text/javascript' src='../wp-content/themes/lc-blank-master/axios.min.js'></script>";
}
?>

<div id="app" class="container-eventos">
    <div v-if="isLoading" style="color: red">Carregando eventos...</div>
    <div v-for="evento in eventos" style="padding: 30px; background-color: #55D">
        EVENTO: {{ evento.titulo }}
        <br>
        Props:
        <div v-for="prop in evento">Propriedade: {{prop}}</div>
    </div>
</div>
<script type="text/javascript">
    const listaEventos = "<?php echo $isLocalhost ? './lista-eventos/' : '/lista-eventos/' ?>";
    var app = new Vue({
        el: '#app',
        data: {
            eventos: [],
            isLoading: true
        },
        methods: {
            
        },
        mounted() {
            axios.get(listaEventos)
            .then(response => {
                console.log("RESPONSE: ", response)
                this.eventos = response.data.eventos
            })
            .catch(error => {
                console.error("ERRO AO OBTER EVENTOS DA AGENDA")
                console.log(error)
            })
            .finally(() => this.isLoading = false)
        }
    });
</script>
<?php
endwhile;
endif;

get_footer();
?>
