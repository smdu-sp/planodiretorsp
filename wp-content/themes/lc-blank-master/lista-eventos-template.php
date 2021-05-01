<?php
/*
Template Name: Lista de eventos
*/
header('Content-Type: application/json; charset=utf-8');
require_once('evento.php');
$lista = [];
$lista['eventos'] = getEventos();
echo json_encode($lista);
return;
