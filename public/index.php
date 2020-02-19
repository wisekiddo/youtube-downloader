<!DOCTYPE html>
<html>
<body>


<?php


use YouTube\YouTubeDownloader;
echo "Hello World!";


$downloader = new YouTubeDownloader();
const SWIFT = 'https://www.youtube.com/watch?v=e-ORhEE9VVg';

$youtube = new \YouTube\YouTubeDownloader();
$links = $youtube->getDownloadLinks(SWIFT);

header('Content-Type: application/json');
echo json_encode($links, JSON_PRETTY_PRINT);



?>

</body>
</html>


