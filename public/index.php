<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>youtube-downloader</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<h1>YouTube Downloader</h1>

<p>
    <a href="https://github.com/Athlon1600/youtube-downloader">https://github.com/Athlon1600/youtube-downloader</a>
</p>

<form>
    <input type="text" value="https://www.youtube.com/watch?v=YSuHrTfcikU" size="80" id="txt_url">
    <input type="button" id="btn_fetch" value="Fetch">
</form>

<video width="800" height="600" controls>
    <source src="" type="video/mp4"/>
    <em>Sorry, your browser doesn't support HTML5 video.</em>
</video>


<script>
    $(function () {

        $("#btn_fetch").click(function () {

            var url = $("#txt_url").val();

            var oThis = $(this);
            oThis.attr('disabled', true);

            $.get('video_info.php', {url: url}, function (data) {

                oThis.attr('disabled', false);

                console.log(data);

                // first link with video
                var first = data.find(function (link) {
                    return link['format'].indexOf('video') !== -1;
                });

                console.log(first);

                var stream_url = 'stream.php?url=' + encodeURIComponent(first['url']);

                var video = $("video");
                video.attr('src', stream_url);
                video[0].load();
            });

        });

    });
</script>

</body>
</html>
