<!DOCTYPE html>
<html>
<body>


<?php


use YouTube\YouTubeDownloader;
$youtubeURL = htmlspecialchars($_GET["url"]);
echo $youtubeURL;

$downloader = new YouTubeDownloader();
const SWIFT = 'https://www.youtube.com/watch?v=e-ORhEE9VVg';

$youtube = new \YouTube\YouTubeDownloader();
$links = $youtube->getDownloadLinks(SWIFT);

header('Content-Type: application/json');
echo json_encode($links, JSON_PRETTY_PRINT);



?>

</body>
</html>


