<?php
/*
Template Name: Eventos (Agenda/ Área de Transparência)
*/

require_once get_stylesheet_directory() . '/eventos/evento.php';

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    global $wpdb;
    $wpdb->show_errors();

    $tipoDeEvento = $_GET['tipo'];

    if ($tipoDeEvento == 'agenda') { 
      require_once get_stylesheet_directory() . '/eventos/agenda-participativa.php';
    }
    
    elseif ($tipoDeEvento == 'noticias') { 
      require_once get_stylesheet_directory() . '/eventos/noticias.php';
    }
    
    else {
      require_once get_stylesheet_directory() . '/eventos/eventos.php';
    }

    require_once get_stylesheet_directory() . '/modulo-vue.php';

?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div id="appevento">
      <div class="evento form-group" :id="tipoDeEvento == 'noticias' ? 'noticias' : ''">
        <?php
          require_once get_stylesheet_directory() . '/eventos/modal-envio.php';

          if ($tipoDeEvento == 'agenda') {
            require_once get_stylesheet_directory() . '/eventos/form-agenda-participativa.php';
          }

          elseif ($tipoDeEvento == 'noticias') {
            require_once get_stylesheet_directory() . '/eventos/form-noticias.php';
          }

          else {
            require_once get_stylesheet_directory() . '/eventos/form-eventos.php';
          }
        ?>
      </div>
    </div>

    <script>
      const tipoDeEvento = '<?= $tipoDeEvento ?>';
      const eventoRaw = <?= json_encode($evento) ?>;
    </script>    
    <script type="text/javascript" src="<?= $jsPath ?>eventos.js"></script>
    <script type="text/javascript" src="<?= $jsPath ?>axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php

  endwhile;
endif;

get_footer();
