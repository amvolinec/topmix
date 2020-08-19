@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="d-inline-flex"><h1>{{ __('Courses') }}</h1></div>
                    <div class="d-inline-flex">
                        <form action="{{ route('course.create') }}">
                            <button class="btn btn-outline-success"><i class="far fa-file"></i></button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="title m-b-md">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="far fa-clipboard"></i></th>
                            <th scope="col">{{ __ ('Course name')}}</th>
                            <th scope="col">{{__ ('Description')}}</th>
                            <th scope="col">{{__ ('Author')}}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses AS $course)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->author->name ?? __('undefined')}}</td>
                                <td>
                                    <form class="float-right" action="{{ route('course.destroy', $course->id) }}"
                                          method="post" onsubmit="return confirm('Do you really want to delete?');">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <a class="btn btn-outline-success float-right" style="margin: 0 8px;"
                                       href="{{ route('course.edit', $course->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
