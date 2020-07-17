@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Lesson</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('lesson.store') }}" method="post">
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <lable>Title</lable>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <lable>Description</lable>
                                <input class="form-control" type="text" name="description">
                            </div>
                            <div class="form-group">
                                <lable>Notes</lable>
                                <input class="form-control" type="text" name="notes">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Select course</label>
                                <select class="form-control" name="course_id" id="courseId">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Select file</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published">
                                <label class="form-check-label" for="exampleCheck1">Published</label>
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
