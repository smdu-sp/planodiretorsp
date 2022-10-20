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

    elseif($tipoDeEvento == 'videos') {
      require_once get_stylesheet_directory() . '/eventos/videos.php';
      $url = 'http://' . $_SERVER['SERVER_NAME'] . '/lista-videos/';
      $json = file_get_contents($url);
      
      $evento = json_decode($json);
    }
    
    else {
      require_once get_stylesheet_directory() . '/eventos/eventos.php';
    }

    require_once get_stylesheet_directory() . '/modulo-vue.php';

?>

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

          elseif ($tipoDeEvento == 'videos') {
            require_once get_stylesheet_directory() . '/eventos/form-videos.php';
          }

          else {
            require_once get_stylesheet_directory() . '/eventos/form-eventos.php';
          }
        ?>
      </div>
    </div>

    <script type="application/javascript">
      const tipoDeEvento = '<?= $tipoDeEvento ?>';
      const eventoRaw = <?= json_encode($evento) ?>;
    </script>
    <script type="text/javascript" src="<?= $jsPath ?>eventos.js"></script>
    <script type="text/javascript" src="<?= $jsPath ?>axios.min.js"></script>

<?php

  endwhile;
endif;

get_footer();
