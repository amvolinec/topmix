@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fields') }}</div>
                    <div class="card-body">
                        @foreach($fields as $field)

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
