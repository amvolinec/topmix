@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Course') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(isset($course))
                            <form action="{{ route('course.update', $course->id) }}" method="post">
                                @method('put')
                        @else
                            <form action="{{ route('course.store') }}" method="post">
                                @method('post')
                        @endif

                            @csrf
                            <div class="form-group">
                                <label>{{ __('Course name') }}</label>
                                <input class="form-control" type="text" name="name" value="{{ $course->name ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <input class="form-control" type="text" name="description" value="{{ $course->description ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="author_id" id="author_id">
                                    <option value="" disabled selected>{{ __('Select form list') }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if(isset($course) && $course->author_id == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                                @if(isset($course))
                                    <button class="btn btn-success" type="submit">{{ __('Update') }}</button>
                                @else
                                    <button class="btn btn-success" type="submit">{{ __('Save') }}</button>
                                @endif


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
