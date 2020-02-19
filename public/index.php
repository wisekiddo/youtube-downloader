<?php


use YouTube\YouTubeDownloader;

$downloader = new YouTubeDownloader();
const SWIFT = 'https://www.youtube.com/watch?v=e-ORhEE9VVg';

$ret = $downloader->getDownloadLinks(self::SWIFT);

echo count($ret);


