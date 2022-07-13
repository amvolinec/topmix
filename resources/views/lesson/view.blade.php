@extends('layouts.app')
@section('content')
    <div class="container-fluid">
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
    </div>
@endsection

@section('footer-scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            var options, player;

            options = {
                controls: true,
                muted: false,
                width: 1000,
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
