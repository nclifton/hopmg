<div class="card">
    <div class="card-header">{{ __('Enter as Guest') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('guestLogin') }}">
            @csrf

            <div class="form-group row">
                <label for="email"
                       class="col-md-4 col-form-label text-md-right">{{ __('What year were you born?') }}</label>

                <div class="col-md-6">
                    {{--<input id="year" type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}"--}}
                    {{--name="year" value="{{ old('year') }}"  autofocus>--}}

                    <year-of-birth-input-component
                            :initial-century="19"
                    >
                    </year-of-birth-input-component>

                    @if ($errors->has('year'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" name="login" value="login" class="btn btn-primary">
                        {{ __('Continue') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>