@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{__ ('Lesson')}}
                </h1>
                <form action="{{ route('lesson.create') }}">
                    <button class="btn btn-success">+</button>
                </form>
                <br>
                <div class="title m-b-md">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__ ('Title')}}</th>
                            <th scope="col">{{__ ('Description')}}</th>
                            <th scope="col">{{__ ('Notes')}}</th>
                            <th scope="col">{{__ ('Lesson')}}</th>
                            <th scope="col">{{__('File')}}</th>
                            <th scope="col">{{__('Published')}}</th>
                            <th scope="col">{{__ ('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons AS $lesson)
                            <tr>
                                <th scope="row">{{ $lesson->id  }}</th>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->description }}</td>
                                <td>{{ $lesson->notes }}</td>
                                <td>{{ $lesson->course_id}}</td>
                                <td>{{ $lesson->file }}</td>
                                <td>{{ $lesson->published ? __('Yes') : __('No') }}</td>
                                <td>
                                    <a class="btn btn-success float-right" style="margin: 0 8px;"
                                       href="{{ route('lesson.edit', $lesson->id) }}">{{__ ('Edit')}}</a>
                                    <form class="float-right" action="{{ route('lesson.destroy', $lesson->id) }}"
                                          method="post" onsubmit="return confirm('Do you really want to delete?');">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">{{__ ('Delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
