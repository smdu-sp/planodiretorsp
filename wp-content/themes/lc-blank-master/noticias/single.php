<div class="<?= $noticia->tipo ?>">
    <img src="<?= $noticia->imagem ?>" <?= $noticia->pracegover ? 'alt = "' . $noticia->pracegover . '"' : 'alt="Capa da notícia" aria-hidden="true" ' ?>/>
    <div class="link"><a href="<?= $noticia->link ?>"><h3><?= $noticia->titulo ?></h3></a></div>
</div>
