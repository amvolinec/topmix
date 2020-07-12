@extends('forms::app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        {{ __('Tables') }}

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="m-3">
                            <a class="btn btn-sm btn-success" href="{{ route('forms.create') }}">{{ __('Create') }}</a>
                        </div>

                        @forelse($tables AS $row)
                            <div class="m-3">
                                <a href="{{ route('forms.edit', $row->route) }}">{{ $row->name }}</a>
                            </div>
                        @empty
                            <p>No tables</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



