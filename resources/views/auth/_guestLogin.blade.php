<form method="POST" action="{{ route('guestLogin') }}"
>
    @csrf

        <h2 class="w-100 text-center">
            {{ __('Enter as guest') }}
        </h2>
    <div class="form-group">
        <label for="email"
               class="text-md-center subtitle">
            {{ __('What year were you born?') }}
        </label>

        <div class="text-md-center">
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
        <div class="col-md-12 text-center">
            <button type="submit" name="login" value="login" class="btn btn-primary">
                {{ __('Continue') }}
            </button>
        </div>
    </div>
</form>
