<?php
require('../vendor/autoload.php');
header('Content-Type: application/json');

use YouTube\YouTubeDownloader;

$youtubeURL = htmlspecialchars($_GET["url"]);
echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

//echo ' oead' . $links;


echo json_encode($links, JSON_PRETTY_PRINT);




