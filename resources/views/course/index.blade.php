@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{ __('Courses') }}
                </h1>
                <form action="{{ route('course.create') }}">
                    <button class="btn btn-success">+</button>
                </form>
                <br>
                <div class="title m-b-md">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __ ('Name')}}</th>
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
                                    <a class="btn btn-success float-right" style="margin: 0 8px;"
                                       href="{{ route('course.edit', $course->id) }}">{{__ ('Edit')}}</a>
                                    <form class="float-right" action="{{ route('course.destroy', $course->id) }}"
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
