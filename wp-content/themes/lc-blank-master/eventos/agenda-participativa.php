<?php

/**
 * Agenda Participativa
 */

function getAgendaParticipativa() {
    global $wpdb;
    $where = "id = 1";
    $sql =  <<<SQL
                SELECT * FROM agenda_participativa
                WHERE {$where};
            SQL;
    $resultado = $wpdb->get_results($sql, OBJECT);
    
    return $resultado;
}

$evento = getAgendaParticipativa()[0];

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  $_POST = json_decode(file_get_contents("php://input"), true);
  foreach($_POST as $chave => $valor) {
    if ($chave === 'id') {
      continue;
    }

    if ($chave === 'data_termino' && strlen($valor) < 10) {
      $valor = null;
    }  
    if ($chave === 'local' && trim($valor) === '') {
      $valor = null;
    }  
    
    $wpdb->update('agenda_participativa', array($chave => $valor), array('id' => '1'));
  }

  return;
}
