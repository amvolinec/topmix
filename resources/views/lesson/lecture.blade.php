@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{__ ('Lessons')}}
                </h1>
                <br>
                <div class="title m-b-md">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__ ('Name')}}</th>
                            <th scope="col">{{__ ('Email')}}</th>
                            <th scope="col">{{__ ('Lessons')}}</th>
                            <th scope="col">{{__ ('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users AS $user)
                            <tr>
                                <th scope="row">{{ $user->id  }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @forelse($user->lessons AS $lesson)
                                        <div>
                                            <span class="lesson">{{ $lesson->title }}</span>
                                            <span class="course">{{ $lesson->course->name }}</span>
                                        </div>
                                    @empty
                                        {{ __('No lessons') }}
                                    @endforelse
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success float-right" style="margin: 0 8px;"
                                       href="{{ route('users.lessons.edit', $user->id) }}">{{__ ('Edit')}}</a>
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