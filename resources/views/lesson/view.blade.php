@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{__ ('Lesson')}} {{ $lesson->title }} {{ $lesson->course->name }}
                </h1>
                <br>
                @if(!empty($lesson->file))
                    <video width="640" height="480" controls>
                        <source src="{{ asset($lesson->file) }}" type="video/mp4" controls autoplay>
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>
        </div>
    </div>
@endsection
