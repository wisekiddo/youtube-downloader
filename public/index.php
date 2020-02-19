
<?php


$videoFormatHold = $youtubeURL = $videoTitle = $videoQuality = $videoFormat = $videoFileName = $downloadURL = $status = $statusMsg = '';
$isVideo = 0;

//echo 'Hello ' . htmlspecialchars($_GET["url"]) . '!';

// Load and initialize downloader class
$handler = new YouTubeDownload();

// Youtube video url
$youtubeURL = htmlspecialchars($_GET["url"]);

// Check whether the url is valid
if (!empty($youtubeURL) && !filter_var($youtubeURL, FILTER_VALIDATE_URL) === false) {
    // Get the downloader object
    $downloader = $handler->getDownloader($youtubeURL);

    // Set the url
    $downloader->setUrl($youtubeURL);

    // Validate the youtube video url
    if ($downloader->hasVideo()) {
        // Get the video download link info
        $videoDownloadLink = $downloader->getVideoDownloadLink();

        for ($x = 0; $x < count($videoDownloadLink); $x++) {

            $videoFormatHold = $videoDownloadLink[$x]['format'];

            if (strcmp($videoFormatHold, 'mp4') != 0) {
                break;
            }
            $videoTitle = $videoDownloadLink[$x]['title'];
            $videoQuality = $videoDownloadLink[$x]['qualityLabel'];
            $downloadURL = $videoDownloadLink[$x]['url'];
            $videoFormat = $videoDownloadLink[$x]['format'];

        }

        echo '{"title":"' . $videoTitle . '", "format":"' . $videoFormat . '", "url":"' . $downloadURL . '"}';

        //$videoTitle = $videoDownloadLink[count($videoDownloadLink)-1]['title'];
        //$videoQuality = $videoDownloadLink[count($videoDownloadLink)-1]['qualityLabel'];
        //$videoFormat = $videoDownloadLink[count($videoDownloadLink)-1]['format'];
        //$videoFileName = strtolower(str_replace(' ', '_', $videoTitle)).'.'.$videoFormat;
        //$downloadURL = $videoDownloadLink[count($videoDownloadLink)-1]['url'];

        $isVideo = 1;

    } else {
        $statusMsg = "Video is not found, please check YouTube URL and submit again.";
        $status = 'error';
    }
} else {
    $statusMsg = "Please enter valid YouTube URL.";
    $status = 'error';
}







/*use YouTube\YouTubeDownloader;

$youtubeURL = htmlspecialchars($_GET["url"]);
echo $youtubeURL;

$youtube = new YouTubeDownloader();
$links = $youtube->getDownloadLinks($youtubeURL);

//echo ' oead' . $links;


echo json_encode($links, JSON_PRETTY_PRINT);*/




