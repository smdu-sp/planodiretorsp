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

function getVideos(array $categorias = [])
{
    global $wpdb;
    $where = "1 = 1"; // Delimita busca

    if (sizeof($categorias) > 0) {
        for ($i = 0; $i < sizeof($categorias); $i++) {
            if ($i === 0) {
                $where .= " AND `categoria` = '{$categorias[$i]}'";
            } else {
                $where .= " OR `categoria` = '{$categorias[$i]}'";
            }
        }
    } else {
        $sqlCategorias = "SELECT * FROM videos_categorias";
        $categorias = $wpdb->get_results($sqlCategorias, OBJECT);   
    }

    $sqlVideos = "SELECT * FROM videos WHERE {$where} ORDER BY created_at;";
    $videos = $wpdb->get_results($sqlVideos, OBJECT);

    $results = [];
    $results['videos'] = $videos;

    if (sizeof($categorias) === 1) {
        return $results;
    }

    $results['categorias'] = $categorias;

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
