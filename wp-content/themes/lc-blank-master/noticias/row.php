<?php 
    if ($chave % 2 == 0) { 
        $row = [$noticias[$chave], $noticias[$chave + 1]] ?>
            <div class="row"><?php 
        foreach ($row as $noticia) { 
            require "single.php";
        } ?>
            </div>
        <?php
    }
    