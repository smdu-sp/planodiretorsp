<?php
/*
Template Name: Relatorio
*/



get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $get = json_encode($_GET);
        $url = $_SERVER['REQUEST_URI'];

        if (!strpos($url, 'dslc')) {
?>

<script>
    let totalAbas = 0;

    for (let i = 0; i < 10; i++) {
        if (document.getElementById(`tab-${i}`) === null) {
            break;
        }
        document.getElementById(`tab-${i}`).addEventListener('click', () => {
            document.getElementsByTagName('h1')[0].className = `titulo-relatorios etapa-${i+1}`;
            document.getElementById('relatorios').className = `container-relatorios etapa-${i+1}`;
        });
        totalAbas++;
    }

    const get = <?= $get ?>;

    checarAbas(get['aba']);

    function checarAbas(etapa) {
        const abas = document.querySelectorAll('.dslc-active');

        // Tenta novamente até carregar todos os elementos da página
        if (abas.length === 0) {
            return setTimeout(() => { checarAbas(etapa) }, 10);
        }

        const regex = /\d+/;
        const numeroEtapa = etapa.match(regex)[0];

        if(numeroEtapa > 0 && numeroEtapa <= totalAbas) {
            abas.forEach(aba => { aba.classList.remove('dslc-active');})
            document.querySelector(`#tab-${numeroEtapa - 1}`).classList.add('dslc-active');
            document.querySelector('.dslc-tabs-content').children[numeroEtapa - 1].classList.add('dslc-active');
            document.getElementsByTagName('h1')[0].className = `titulo-relatorios etapa-${numeroEtapa}`;
            document.getElementById('relatorios').className = `container-relatorios etapa-${numeroEtapa}`;
        }
    }
</script>

<?php
}
    endwhile;
endif;

get_footer();
?>
