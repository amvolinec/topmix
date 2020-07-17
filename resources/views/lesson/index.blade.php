@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Lesson
                </h1>
                <form action="{{ route('lesson.create') }}">
                    <button class="btn btn-success">+</button>
                </form>
                <br>
                <div class="title m-b-md">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Select course</th>
                            <th scope="col">Select file</th>
                            <th scope="col">Action</th>
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
                                <td>
                                    <a class="btn btn-sm btn-success float-right" style="margin: 0 8px;"
                                       href="{{ route('lesson.edit', $lesson->id) }}">Edit</a>
                                    <form class="float-right" action="{{ route('lesson.destroy', $lesson->id) }}"
                                          method="post" onsubmit="return confirm('Do you really want to delete?');">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
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
