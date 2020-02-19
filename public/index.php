<?php
require('../vendor/autoload.php');
header('Content-Type: application/json');

use YouTube\YouTubeDownloader;

$youtubeURL = htmlspecialchars($_GET["url"]);
//echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

echo json_encode($links, JSON_PRETTY_PRINT);

$videoTitle = "video";
$downloadURL = "";
$videoFormat = "";

for ($x = 0; $x < count($links); $x++) {

    $videoFormatHold = $links[$x]['format'];
    $videoTag = $links[$x]['itag'];

    // echo $videoTag;
    if (strcasecmp($videoTag, '59') == 0 || strcasecmp($videoTag, '78') == 0 || strcasecmp($videoTag, '83') == 0 || strcasecmp($videoTag, '82') == 0) {
        $videoTitle = "video " . $x;
        $downloadURL = $links[$x]['url'];
        $videoFormat = $links[$x]['format'];

    } else if (strcasecmp($videoTag, '84') == 0 || strcasecmp($videoTag, '85') == 0) {
        $videoTitle = "video " . $x;
        $downloadURL = $links[$x]['url'];
        $videoFormat = $links[$x]['format'];
        break;
    }

}

$result = '{"title":"' . $videoTitle . '", "format":"' . $videoFormat . '", "url":"' . $downloadURL . '"}';


echo $result;


