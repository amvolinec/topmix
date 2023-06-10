@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                {{__ ('Lesson')}} {{ $lesson['title'] }} {{ $lesson['course']->name }}
            </h1>
            <br>
            @if(!empty($lesson['file']))

                <iframe src="{{ $lesson['file'] }}" width="640"height="320" allow="autoplay"></iframe>

            @endif

            <div id="file" style="display: none;"></div>
        </div>
    </div>

    <a href="{{ route("users.lessons") }}">{{ __('Lessons') }}</a>
@endsection

@section('footer-scripts')

@endsection
