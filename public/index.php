<?php
require('../vendor/autoload.php');
header('Content-Type: application/json');

use YouTube\YouTubeDownloader;

$youtubeURL = htmlspecialchars($_GET["url"]);
//echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

//echo json_encode($links, JSON_PRETTY_PRINT);

$videoTitle = "video";
$downloadURL = "";
$videoFormat = "";

for ($x = 0; $x < count($links); $x++) {

    $videoFormatHold = $links[$x]['format'];

    //echo $videoFormatHold;
    if (strcasecmp($videoFormatHold, 'mp4, 360p, video/audio') == 0 || strcasecmp($videoFormatHold, 'mp4, 480p, video/audio') == 0 ) {
        $videoTitle = "video " . $x;
        $downloadURL = $links[$x]['url'];
        $videoFormat = $links[$x]['format'];

    } else if (strcasecmp($videoFormatHold, 'mp4, 720p, video/audio') == 0 || strcasecmp($videoFormatHold, 'mp4, 1080p, video/audio') == 0) {
        $videoTitle = "video " . $x;
        $downloadURL = $links[$x]['url'];
        $videoFormat = $links[$x]['format'];
        // break;
    }

}

$result = '{"title":"' . $videoTitle . '", "format":"' . $videoFormat . '", "url":"' . $downloadURL . '"}';


echo $result;


