@extends('forms::app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <a class="btn btn-sm btn-success" href="{{ route('forms.create') }}">{{ __('Create') }}</a>

                        @forelse($fields AS $row)
                            $row->name
                        @empty
                            <p>No fields</p>
                        @endforelse

                        {{ __('You have successfully logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



