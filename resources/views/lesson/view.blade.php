@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                {{__ ('Lesson')}} {{ $lesson['title'] }} {{ $lesson['course']->name }}
            </h1>
            <br>
            @if(!empty($lesson['file']))

                <video id="video" style="max-width: 100%;" controls></video>

            @endif

            <div id="file" style="display: none;"></div>
        </div>
    </div>

    <a href="{{ route("users.lessons") }}">{{ __('Lessons') }}</a>
@endsection

@section('footer-scripts')
    <script>
        let sources = <?php echo json_encode($lesson) ;?>

        var userImageLink =
            "https://toplesson.eu/img/CIP_Launch-banner.png";
        var time_start, end_time;

        // The size in bytes
        var downloadSize = 83132;
        var downloadImgSrc = new Image();

        downloadImgSrc.onload = function () {
            end_time = new Date().getTime();
            displaySpeed();
        };

        time_start = new Date().getTime();
        downloadImgSrc.src = userImageLink;
        console.log("time start: " + time_start);

        function displaySpeed() {
            var timeDuration = (end_time - time_start) / 1000;
            var loadedBits = downloadSize * 8;

            /* Converts a number into string
               using toFixed(2) rounding to 2 */
            var bps = (loadedBits / timeDuration);
            var speedInKbps = (bps / 1024);
            // var speedInMbps = (speedInKbps / 1024).toFixed(2);
            console.log("Your internet connection speed is: \n"
                + speedInKbps
                + " kbps\n");

            var url = sources.file;

            if (speedInKbps < 15000) {
                url = sources.file360;
            } else if (speedInKbps < 30000) {
                url = sources.file480;
            } else if (speedInKbps < 45000) {
                url = sources.file720;
            }

            document.getElementById("file").innerHTML = "Your internet connection speed is: \n"
                + speedInKbps.toFixed(2)
                + " kbps\n" + url;

            console.log(url);
            changeSource(url);
        }

        const changeSource = (url) => {
            const video = document.getElementById("video");
            video.src = "https://toplesson.eu/" + url;
        };
    </script>
@endsection
