<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>youtube-downloader</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<!--<video width="800" height="600" controls>
    <source src="" type="video/mp4"/>
    <em>Sorry, your browser doesn't support HTML5 video.</em>
</video>-->


<script>

    $(function () {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const url = urlParams.get('url')
        //console.log(url);

        var oThis = $(this);
        oThis.attr('disabled', true);

        $.get('video_info.php', {url: url}, function (data) {

            oThis.attr('disabled', false);

           // console.log(data);

            // first link with video
            var first = data.find(function (link) {
                return link['format'].indexOf('video') !== -1;
            });

            console.log(first);

            echo '{"title":"' . $videoTitle . '", "format":"'.$videoFormat.'", "url":"' . $downloadURL . '"}';

            var stream_url = 'stream.php?url=' + encodeURIComponent(first['url']);

            console.log("{url:"+stream_url+"}");

            /*var video = $("video");
            video.attr('src', stream_url);
            video[0].load();*/
        });


    });
</script>

</body>
</html>

