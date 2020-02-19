<!DOCTYPE html>
<html>
<body>


<?php


use YouTube\YouTubeDownloader;
$youtubeURL = htmlspecialchars($_GET["url"]);
echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

echo $links.' oead';


header('Content-Type: application/json');
echo json_encode($links, JSON_PRETTY_PRINT);



?>

</body>
</html>


