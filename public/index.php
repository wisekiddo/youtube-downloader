<?php
use YouTube\YouTubeDownloader;

$yt = new YouTubeDownloader();

$links = $yt->getDownloadLinks("https://www.youtube.com/watch?v=QxsmWxxouIM");

echo $links;

var_dump($links);
?>