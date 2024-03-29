<?php

global $wpdb;
$noticiasRaw = $wpdb->get_results("SELECT * FROM noticias ORDER BY id DESC;");

$noticias = array_filter($noticiasRaw, function($obj) {
    return $obj->tipo == 'noticia' ? true : false;
});

$agenda = array_filter($noticiasRaw, function($obj) {
    return $obj->tipo == 'agenda' ? true : false;
});

$maisNoticias = array_slice($noticias, 3);

// Insere $agenda na quarta posição
$noticias = array_slice($noticias, 0, 3) + $agenda;

// Reordena as chaves dos arrays
$noticias = [...$noticias];
$maisNoticias = [...$maisNoticias];

ob_start();
?>

<div id="noticias">
    <div class="titulo">
        <h2>Notícias</h2>
        <?php 
            if (is_front_page() && is_user_logged_in()) { ?>
                <div class="admin">
                    <a href="/evento/?tipo=noticias" class="btn btn-primary">Editar</a>
                </div><?php
            } 
        ?>
    </div>
    <div class="container">
        <?php 
            foreach ($noticias as $chave=>$noticia) {
                require "row.php";
            }
        ?>
    </div>
</div>
