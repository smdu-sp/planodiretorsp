<?php
/*
Template Name: Lista de vídeos
*/
header('Content-Type: application/json; charset=utf-8');
require_once('evento.php');
$lista = [];
$lista['videos'] = getEventos(['video']);
echo json_encode($lista);
return;
