<div <?= is_front_page() ? 'class="' . $noticia->tipo . '"' : ':class="(noticia.tipo ? noticia.tipo : \'noticia\') + \' col-auto\'"' ?>>
    <img <?= is_front_page() ? 'src="' . $noticia->imagem .'"' : ':src="noticia.imagem ? noticia.imagem : \'/assets/capa-noticia.jpg\'"' ?> <?= $noticia->pracegover ? 'alt = "' . $noticia->pracegover . '"' : 'alt="Capa da notícia" aria-hidden="true" ' ?>/>
    <div class="link"><a <?= is_front_page() ? 'href="'. $noticia->link . '"' : ':href="noticia.link"'?>><h3><?= is_front_page() ? $noticia->titulo : '{{noticia.titulo}}'?></h3></a></div>
</div>
