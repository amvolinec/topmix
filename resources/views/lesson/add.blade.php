@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{__ ('User')}} {{ $user->name }}</h1>
                <br>
                <form action="{{ route('users.lessons.add', $user->id) }}" method="post">
                    @method('post')
                    @csrf
                    <div class="title m-b-md">


                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__ ('Active')}}</th>
                                <th scope="col">{{__ ('Lesson')}}</th>
                                <th scope="col">{{__ ('Course')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons AS $lesson)
                                <tr>
                                    <th scope="row">{{ $lesson->id  }}</th>
                                    <td><input type="checkbox" class="form-check-inline"
                                               name="lessons[{{ $lesson->id }}][]"
                                               @if($user->lessons->contains('id', $lesson->id)) checked @endif>
                                    </td>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <button class="btn btn-success" type="submit">{{ __('Save changes') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
