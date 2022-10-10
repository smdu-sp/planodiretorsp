<?php
/*
Template Name: Lista de vídeos
*/

header('Content-Type: application/json; charset=utf-8');

$cat = [];

if ($_GET['cat']) {
    $cat = explode(",", $_GET["cat"]);
}

require_once 'video.php';

$lista = getVideos($cat);
echo json_encode($lista);

return;
