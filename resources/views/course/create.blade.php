@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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

                        <form
                            action="{{ isset($course) ? route('course.update', $course->id) : route('course.store') }}"
                            method="post">
                            @method(isset($course) ? 'put' : 'post')

                            @csrf
                            <div class="form-group">
                                <label>{{ __('Course name') }}</label>
                                <input class="form-control" type="text" name="name"
                                       value="{{ $course->name ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <input class="form-control" type="text" name="description"
                                       value="{{ $course->description ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="author_id">{{ __('Author') }}</label>
                                <select class="form-control select2" name="author_id" id="author_id">
                                    <option value="" disabled selected>{{ __('Select form list') }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                                @if(isset($course) && $course->author_id == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                @if(isset($course))
                                    <button class="btn btn-outline-success" type="submit"><i
                                            class="far fa-save"></i> {{ __('Update') }}</button>
                                @else
                                    <button class="btn btn-outline-success" type="submit"><i
                                            class="far fa-save"></i> {{ __('Save') }}</button>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#author_id').select2();
        });
    </script>
@endsection
