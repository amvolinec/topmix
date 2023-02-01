@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                {{__ ('Lesson')}} {{ $lesson['title'] }} {{ $lesson['course']->name }}
            </h1>
            <br>
            @if(!empty($lesson['file']))

                <video id="video" class="video-js vjs-default-skin" preload="auto" controls data-setup='{}'>
                    <source label="1080p" src="{{ asset($lesson['file']) }}" type="video/mp4" res="1080">
                    <source label="720p" src="{{ asset($lesson['file720']) }}" type="video/mp4" res="720">
                    <source label="480p" src="{{ asset($lesson['file480']) }}" type="video/mp4" res="480">
                    <source label="360p" src="{{ asset($lesson['file360']) }}" type="video/mp4" res="360">
                </video>

            @endif
        </div>
    </div>

    <a href="{{ route("users.lessons") }}">{{ __('Lessons') }}</a>
@endsection

@section('footer-scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://unpkg.com/video.js@7.5.4/dist/video.js"></script>
    <script
        src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
    <script>
        $(document).ready(function () {

            let options, player;

            options = {
                controls: true,
                muted: false,
                width: 640,
                controlBar: {
                    children: [
                        'playToggle',
                        'progressControl',
                        'volumePanel',
                        'qualitySelector',
                        'fullscreenToggle',
                    ],
                },
            };

            videojs('video', options);
        });
    </script>
@endsection
