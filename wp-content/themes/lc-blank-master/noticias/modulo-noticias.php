<?php

global $wpdb;
$noticiasRaw = $wpdb->get_results("SELECT * FROM noticias ORDER BY id DESC;");
$noticias = array_filter($noticiasRaw, function($obj) {
    return $obj->tipo == 'noticia' ? true : false;
});
$agenda = array_filter($noticiasRaw, function($obj) {
    return $obj->tipo == 'agenda' ? true : false;
});
$agenda = array_values($agenda);

ob_start();
?>

<div id="noticias">
    <div class="container">
        <div class="row">
            <div class="noticia">
                <img aria-hidden="true" src="<?= $noticias[0]->imagem ?>" alt="Capa da notícia" aria-hidden="true" />
                <div class="link"><a href="<?= $noticias[0]->link ?>"><h3><?= $noticias[0]->titulo ?></h3></a></div>
            </div>
            <div class="noticia">
                <img aria-hidden="true" src="<?= $noticias[1]->imagem ?>" alt="Capa da notícia" aria-hidden="true" />
                <div class="link"><a href="<?= $noticias[1]->link ?>"><h3><?= $noticias[1]->titulo ?></h3></a></div>
            </div>
        </div>
        <div class="row">
            <div class="noticia">
                <img src="<?= $noticias[2]->imagem ?>" alt="Capa da notícia" aria-hidden="true" />
                <div class="link"><a href="<?= $noticias[2]->link ?>"><h3><?= $noticias[2]->titulo ?></h3></a></div>
            </div>
            <div class="noticia agenda">
                <img aria-hidden="true" src="<?= $agenda[0]->imagem ?>" alt="Capa da notícia" aria-hidden="true" />
                <div class="link"><a href="<?= $agenda[0]->link ?>"><h3><?= $agenda[0]->titulo ?></h3></a></div>
            </div>
        </div>
    </div>
</div>