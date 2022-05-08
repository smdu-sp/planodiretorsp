<?php

/**
 * Agenda Participativa
 */

function getAgendaParticipativa() {
    global $wpdb;
    $where = "id = 1";
    $sql =  <<<SQL
                SELECT * FROM agenda_participativa WHERE {$where};
            SQL;
    $resultado = $wpdb->get_results($sql, OBJECT);
    
    return $resultado;
}
