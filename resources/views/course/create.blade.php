@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Course</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('course.store') }}" method="post">
                            @method('post')
                            @csrf

                            <div class="form-group">
                                <lable>Name</lable>
                                <input class="form-control"  type="text" name="name">
                            </div>

                            <div class="form-group">
                                <lable>Description</lable>
                                <input class="form-control" type="text" name="description">
                            </div>

                            <button class="btn btn-success" type="submit">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
