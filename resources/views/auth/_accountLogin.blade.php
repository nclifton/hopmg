<form method="POST" action="{{ route('login') }}" class="m-3">
    @csrf
    <h2 class="w-100 text-center">
        {{ __('Have an account?') }}
    </h2>
    <div class="form-group d-flex flex-column align-items-center">
        <div for="email"
             class="text-center label">
            {{ __('Login with your beer rewards account') }}
        </div>
        <input id="email"
               type="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email"
               value="{{ old('email') }}"
               placeholder="{{ __('EMAIL') }}"
               aria-placeholder="{{ __('EMAIL') }}"
               required autofocus

        >

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="form-group d-flex flex-column align-items-center">

        <login-password-component
                show-password-text="{{ __('show') }}"
                hide-password-text="{{ __('hide') }}"
                placeholder="{{ __('PASSWORD') }}"
        ></login-password-component>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>

    <div class="form-group d-flex flex-row justify-content-between">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <button type="submit" class="btn btn-primary px-3">
                {{ __('Continue') }}
            </button>
    </div>

    <div class="w-100 text-center">
        @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register for a new account') }}</a>
        @endif
    </div>
</form>
