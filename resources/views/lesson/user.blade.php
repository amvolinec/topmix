@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{__ ('Lessons')}}
                </h1>
                <br>
                <div class="title m-b-md">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__ ('Title')}}</th>
                            <th scope="col">{{__ ('Course')}}</th>
                            <th scope="col">{{__ ('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons AS $lesson)
                            <tr>
                                <th scope="row">{{ $lesson->id  }}</th>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->course->name }}</td>
                                <th><a class="btn btn-success" href="{{ route('users.lessons.view', $lesson->id) }}">{{ __('Open') }}</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
