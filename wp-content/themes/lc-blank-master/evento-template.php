<?php
/*
Template Name: Evento agenda
*/
require_once('evento.php');

get_header();

if( have_posts() ) : while ( have_posts() ) : the_post();

the_content();

// Obtém dados do banco e armazena em json
$id = $_GET['id'];



endwhile;
endif;
?>
