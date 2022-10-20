<?php

/**
 * Cadastro de Vídeos
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Novo Vídeo
  $_POST = json_decode(file_get_contents("php://input"), true);

  $tipoPost = $_POST['tipo'];

  if ($tipoPost == 'video') {
    $dados = [];
  
    $dados['titulo'] = trim($_POST['titulo']);
    $dados['categoria'] = trim($_POST['categoria']);
    $dados['id_video'] = trim($_POST['idVideo']);
    $dados['ordem'] = trim($_POST['ordem']);
    $dados['destacado'] = 0;
    $dados['imagem'] = '';
  
    if (trim($_POST['imagem'])) {
      $dados['imagem'] = trim($_POST['imagem']);
    }
  
    $dados['id_video'] = trim($_POST['idVideo']);
  
    global $wpdb;
    $wpdb->insert('videos', $dados);
  
    return;
  }

  if ($tipoPost == 'categoria') {
    $dados = [];
  
    $dados['categoria'] = trim($_POST['categoria']);
    $dados['ordem'] = trim($_POST['ordem']);

    global $wpdb;
    $wpdb->insert('videos_categorias', $dados);
  
    return;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $_POST = json_decode(file_get_contents("php://input"), true);

    $tipoPost = $_POST['tipo'];

    if ($tipoPost == 'destaque') {
      $idAntigo = array('id' => $_POST['idInicial']);
      $idNovo = array('id' => $_POST['id']);
      
      $wpdb->update('videos', array('destacado' => 0), $idAntigo);
      $wpdb->update('videos', array('destacado' => 1), $idNovo);
    }
    
    if ($tipoPost == 'categorias') {
      foreach ($_POST['arrayCategorias'] as $arr) {
        foreach($arr as $chave => $valor) {
          if ($chave === 'id') {
            continue;
          }

          $wpdb->update('videos_categorias', array($chave => trim($valor)), array('id' => $arr['id']));
        }
      }
    }

    // $id = $_POST['id'];
    // foreach($_POST as $chave => $valor) {
    //   if ($chave === 'id') {
    //     continue;
    //   }
  
    //   if (trim($valor) === '') {
    //     $valor = '';
    //   }
      
    //   $wpdb->update('noticias', array($chave => $valor), array('id' => $id));
    // }

    // return;
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $id = $_POST['id'];
    $wpdb->delete('noticias', array('id' => $id));
    return;
}