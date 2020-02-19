


<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php


use YouTube\YouTubeDownloader;
echo "Hello World!";


$downloader = new YouTubeDownloader();
const SWIFT = 'https://www.youtube.com/watch?v=e-ORhEE9VVg';

$ret = $downloader->getDownloadLinks(self::SWIFT);

echo count($ret);
?>

</body>
</html>


