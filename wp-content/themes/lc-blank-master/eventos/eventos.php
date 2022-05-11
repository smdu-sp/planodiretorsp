<?php

$id = $_GET['id'];

if (!$id || sizeof(getEvento($id)) < 1) {
  var_dump($id);
  // echo "Evento inexistente.";
  // return;
}

// DELETE DO EVENTO
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  $wpdb->delete('eventos_agenda', array('id' => $id));
  echo "Evento {$id} excluído.";
  return;
}

$evento = getEvento($id)[0];

// PUT DO EVENTO    
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  $_POST = json_decode(file_get_contents("php://input"), true);
  $id = $_POST['id'];
  $chave = $_POST['chave'];
  $valor = $_POST['valor'];

  if ($chave === 'data_termino' && strlen($valor) < 10) {
    $valor = null;
  }

  $wpdb->update('eventos_agenda', array($chave => $valor), array('id' => $id));

  echo $id;
  return;
}

// INSERT DOCUMENTOS EVENTO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_POST = json_decode(file_get_contents("php://input"), true);
  echo "POST: <br>\n";
  var_dump($_POST['documentos']);
  $json = stripcslashes($_POST['documentos']);
  $documentos = json_decode($json, true);

  $wpdb->delete('documentos_evento', array('id_evento' => $id));

  foreach ($documentos as $key => $value) {
    $documentos[$key]['id_evento'] = $id;
    $wpdb->insert('documentos_evento', $documentos[$key]);
    if (!is_int($wpdb->insert_id)) {
      echo "<script>window.alert('Falha no cadastro do documento relacionado ao evento. Consulte o desenvolvedor.');</script>";
      return;
    }
  }
  echo $id;
  return;
}
