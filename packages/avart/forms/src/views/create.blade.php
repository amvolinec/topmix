@extends('forms::app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create new CRUD | BREAD') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('forms.store') }}" method="post">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="model">{{ __("Model") }}</label>
                                    <input id="model" type="text" name="model"
                                           class="form-control @error('model') is-invalid @enderror"
                                           value="{{ old('model') }}" required>
                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name">{{ __("Table name") }}</label>
                                    <input id="name" type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="route">{{ __("Route") }}</label>
                                    <input id="route" type="text" name="route"
                                           class="form-control @error('route') is-invalid @enderror"
                                           value="{{ old('route') }}" required>
                                    @error('route')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="row" id="form-line" style="visibility:hidden; opacity: 0; display: none;">
                                <div class="form-group col-md-3">
                                    <label for="field-name">{{ __("Field name") }}</label>
                                    <input id="field-name" type="text" name="names[]" class="form-control">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="field-title">{{ __("Field title") }}</label>
                                    <input id="field-title" type="text" name="titles[]" class="form-control">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="field-type">{{ __("Fild type") }}</label>
                                    <select id="field-type" type="text" name="types[]" class="form-control">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="field-default">{{ __("Field default value") }}</label>
                                    <input id="field-default" type="text" name="default[]" class="form-control">
                                </div>

                                <div class="form-check col-md-3 ml-3 mb-3">
                                    <input type="checkbox" class="form-check-input" name="nullable[]" checked>
                                    <label class="form-check-label" for="nullableCheck">{{ __('Nullable') }}</label>
                                </div>
                                <div class="form-check col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" name="fillable[]" checked>
                                    <label class="form-check-label" for="fillableCheck">{{ __('Fillable') }}</label>
                                </div>
                                <div class="form-check col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" name="inlist[]" checked>
                                    <label class="form-check-label" for="inlistCheck">{{ __('In list') }}</label>
                                </div>

                            </div>

                            <div class="row" id="form-inner">

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button id="add-field" type="button"
                                            class="btn btn-success">{{ __('+ Add field') }}</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button id="store-fields" type="button"
                                            class="btn btn-success float-right">{{ __('Save') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



