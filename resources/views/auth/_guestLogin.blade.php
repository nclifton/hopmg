<form method="POST" action="{{ route('guestLogin') }}" class="m-3"
>
    @csrf

    <h2 class="w-100 text-center">
        {{ __('Enter as guest') }}
    </h2>
    <div class="form-group">
        <label for="email"
               class="text-center label">
            {{ __('What year were you born?') }}
        </label>

        <div class="text-md-center">

            <year-of-birth-input-component
                    class="year-of-birth-component{{ $errors->has('acceptTerms') ? ' is-invalid' : '' }}"
                    :initial-year="{{ old('year') ?? '1900'}}"
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
            <button type="submit" name="login" value="login" class="btn btn-primary px-3">
                {{ __('Continue') }}
            </button>
        </div>
    </div>
</form>
