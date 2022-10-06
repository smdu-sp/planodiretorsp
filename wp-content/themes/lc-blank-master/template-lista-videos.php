<?php
/*
Template Name: Lista de vídeos
*/
header('Content-Type: application/json; charset=utf-8');
require_once 'video.php';
$lista = [];
$lista['videos'] = getVideos();
echo json_encode($lista);
return;
