@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @foreach($users AS $user)
                        <h1>{{__ ('User')}} {{ $user->name }}</h1>
                    @endforeach
                    <br>
                    <div class="title m-b-md">
                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__ ('Title')}}</th>
                                <th scope="col">{{__ ('Email')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons AS $lesson)
                                <tr>
                                    <th scope="row">{{ $lesson->id  }}</th>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ $lesson->description }}</td>
                                    <td>
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
