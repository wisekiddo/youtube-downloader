<?php

$youtube = new \YouTube\YoutubeStreamer();


$links = $youtube->getDownloadLinks("https://www.youtube.com/watch?v=QxsmWxxouIM");


echo $links;

