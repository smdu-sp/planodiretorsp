<?php

/**
 * Vídeo
 */

class Video
{
    function __construct($id, $categoria, $titulo, $id_video)
    {
        $this->id = $id;
        $this->categoria = $categoria;
        $this->titulo = $titulo;
        $this->id_video = $id_video;
    }
}

$exemplo = new Video(0, "Oficinas", "Título do vídeo", "www.youtube.com/watch?v=id", "https://img.youtube.com/vi/id/hqdefault.jpg");

function getVideos(array $idCategorias = [])
{
    global $wpdb;

    $sqlCategorias = "SELECT * FROM videos_categorias ORDER BY ordem";
    $categorias = $wpdb->get_results($sqlCategorias, OBJECT);  

    $where = "1 = 1"; // Delimita busca

    if (sizeof($idCategorias) > 0) {
        for ($i = 0; $i < sizeof($idCategorias); $i++) {
            if ($i === 0) {
                $where .= " AND `categoria` = '{$idCategorias[$i]}'";
            } else {
                $where .= " OR `categoria` = '{$idCategorias[$i]}'";
            }
        }
    }

    $sqlVideos = "SELECT * FROM videos WHERE {$where} ORDER BY ordem;";
    $videos = $wpdb->get_results($sqlVideos, OBJECT);

    foreach($videos as $video) {
        $idCat = $video->categoria;
        $video->categoria = $categorias[$idCat - 1]->categoria;
    }

    $results = [];
    $results['videos'] = $videos;

    if (sizeof($categorias) === 1) {
        return $results;
    }

    $catSelecionadas = [];

    foreach ($categorias as $cat) {
        if (count($idCategorias) > 0) {
            foreach ($idCategorias as $id) {
                if ($cat->id == $id) {
                    array_push($catSelecionadas, $cat);
                }
            } 
        } else {
            array_push($catSelecionadas, $cat);
        }
    }

    $results['categorias'] = $catSelecionadas;

    return $results;
}

function getVideo(int $id)
{
    global $wpdb;
    $where = "id = {$id}";
    $sql = "SELECT * FROM videos WHERE {$where};";
    $results = $wpdb->get_results($sql, OBJECT);

    return $results;
}
