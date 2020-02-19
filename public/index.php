<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>youtube-downloader</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


<?php

require('../vendor/autoload.php');

use YouTube\YouTubeDownloader;
$youtubeURL = htmlspecialchars($_GET["url"]);
echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

echo ' oead'.$links;


header('Content-Type: application/json');
echo json_encode($links, JSON_PRETTY_PRINT);



?>

</body>
</html>


