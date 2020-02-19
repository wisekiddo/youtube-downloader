<?php
require('../vendor/autoload.php');
header('Content-Type: application/json');

use YouTube\YouTubeDownloader;

$youtubeURL = htmlspecialchars($_GET["url"]);
//echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

//echo ' oead' . $links;


echo json_encode($links, JSON_PRETTY_PRINT);


for ($x = 0; $x < count($links); $x++) {

    $videoFormatHold = $links[$x]['format'];

    if (strpos($videoFormatHold, 'mp4') !== true)
        break;

    $videoTitle   = "video";
    $downloadURL  = $links[$x]['url'];
    $videoFormat = $links[$x]['format'];

}

echo '{"title":"' . $videoTitle . '", "format":"'.$videoFormat.'", "url":"' . $downloadURL . '"}';




