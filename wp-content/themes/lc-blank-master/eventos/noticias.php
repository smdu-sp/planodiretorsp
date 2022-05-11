<?php

/**
 * Notícias
 */

function getNoticias() {
    global $wpdb;
    $where = "1 = 1";
    $sql =  <<<SQL
                SELECT * FROM noticias
                WHERE {$where};
            SQL;
    $resultado = $wpdb->get_results($sql, OBJECT);
    
    return $resultado;
}
