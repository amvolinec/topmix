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

                        <form action="{{ route('course.store') }}" method="post">
                            @method('post')
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Course name') }}</label>
                                <input class="form-control"  type="text" name="name">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <input class="form-control" type="text" name="description">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="author_id" id="author_id">
                                    <option value="" disabled selected>{{ __('Select form list') }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success" type="submit">{{ __('Save') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
