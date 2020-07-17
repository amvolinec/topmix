                            <div class="form-group row">
                                <label for="%1$s" class="col-md-4 col-form-label text-md-right">{{ __('%2$s') }}</label>

                                <div class="col-md-6">
                                    <input id="%1$s" type="datetime-local" class="form-control @error('%1$s') is-invalid @enderror" name="%1$s" value="{{ $%4$s->%1$s ?? old('%1$s') }}" autocomplete="%1$s" %3$s>

                                    @error('%1$s')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>
