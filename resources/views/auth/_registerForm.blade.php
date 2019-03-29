<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group row">
        <label for="email"
               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="title"
               class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <select id="title" class="form-control" name="title" value="{{ old('title') }}"
                    autofocus>
                <option>Mr</option>
                <option>Ms</option>
                <option>Mrs</option>
                <option>Dr</option>
            </select>

        </div>
    </div>

    <div class="form-group row">
        <label for="first_name"
               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

        <div class="col-md-6">
            <input id="first_name" type="text"
                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                   name="first_name" value="{{ old('first_name') }}" required autofocus>

            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name"
               class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

        <div class="col-md-6">
            <input id="last_name" type="text"
                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                   name="last_name" value="{{ old('last_name') }}" required autofocus>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="mobile"
               class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

        <div class="col-md-6">
            <input id="mobile" type="text"
                   class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                   name="mobile" value="{{ old('mobile') }}" required autofocus>

            @if ($errors->has('mobile'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="postcode"
               class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

        <div class="col-md-6">
            <input id="postcode" type="text"
                   class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                   name="postcode" value="{{ old('postcode') }}" required autofocus>

            @if ($errors->has('postcode'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="date_of_birth"
               class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

        <div class="col-md-6">
            <input id="date_of_birth" type="date"
                   max="{{ now()->addYears(-18)->format('Y-m-d') }}"
                   name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

            @if ($errors->has('date_of_birth'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password"
               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm"
               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4"></div>
        <div class="col-md-6">

            <label for="acceptTerms"
                   class="text-md-left form-control{{ $errors->has('acceptTerms') ? ' is-invalid' : '' }}">
                <input id="acceptTerms" type="checkbox" name="acceptTerms" class="mr-3">
                {{ __('I agree to terms of use') }}
            </label>

            @if ($errors->has('acceptTerms'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('acceptTerms') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>