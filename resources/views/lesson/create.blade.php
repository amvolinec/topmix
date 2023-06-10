@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__( isset($lesson) ? 'Edit lesson' : 'Create Lesson')}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                            action="{{ isset($lesson) ? route('lesson.update', $lesson->id) : route('lesson.store') }}"
                            method="post" enctype="multipart/form-data">

                            @method(isset($lesson) ? 'put' : 'post')
                            @csrf

                            <div class="form-group">
                                <label>{{__ ('Title')}}</label>
                                <input class="form-control" type="text" name="title" value="{{ $lesson->title ?? old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__ ('Description')}}</label>
                                <input class="form-control" type="text" name="description" value="{{ $lesson->description ?? old('description') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__ ('Notes')}}</label>
                                <input class="form-control" type="text" name="notes" value="{{ $lesson->notes ?? old('notes') }}">
                            </div>

                            <div class="form-group">
                                <label for="course_id">{{ __('Select course') }}</label>
                                <select class="form-control" name="course_id" id="course_id">
                                    <option value="" disabled selected>{{ __('Select form list') }}</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if(isset($lesson) && $lesson->course_id == $course->id) selected @endif>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file">{{ __('Enter file url') }}</label>
                                <input type="text" class="form-control" id="file" name="file">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published"@if(isset($lesson) && $lesson->published == 1) checked @endif>
                                <label class="form-check-label" for="exampleCheck1">{{ __('Published') }}</label>
                            </div>

                            <div class="mt-3">
                                @if(isset($lesson))
                                    <button class="btn btn-outline-success" type="submit"><i class="far fa-save"></i> {{ __('Update') }}</button>
                                @else
                                    <button class="btn btn-outline-success" type="submit"><i class="far fa-save"></i> {{ __('Save') }}</button>
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
            $('#course_id').select2();
        });
    </script>
@endsection
