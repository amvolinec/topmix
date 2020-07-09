@extends('resources.views.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('%2$s') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('%1$s') }}">
                            @csrf
                            %3$s
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
