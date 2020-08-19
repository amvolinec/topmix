@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-1 mb-4">
                    <div class="d-inline-flex"><h1>{{ __('Lesson') }}</h1></div>
                    <div class="d-inline-flex">
                        <form action="{{ route('lesson.create') }}">
                            <button class="btn btn-outline-success"><i class="far fa-file"></i></button>
                        </form>
                    </div>
                </div>
                <div class="title m-b-md">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="far fa-clipboard"></th>
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
                                    <form class="float-right" action="{{ route('lesson.destroy', $lesson->id) }}"
                                          method="post" onsubmit="return confirm('Do you really want to delete?');">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <a class="btn btn-outline-success float-right" style="margin: 0 8px;"
                                       href="{{ route('lesson.edit', $lesson->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
