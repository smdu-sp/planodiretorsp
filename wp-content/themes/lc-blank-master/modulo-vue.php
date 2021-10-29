<?php 

$vue = 'vue.min.js';
$vueDev = 'vue.js';
$host = $_SERVER['HTTP_HOST'];
$jsPath = get_stylesheet_directory_uri() . "/";
echo "<script type='text/javascript' src='" . $jsPath . ($host === "localhost" ? $vueDev : $vue) . "'></script>";
