@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-white border-0"><h1>{{ __('Create Account') }}</h1></div>
                    <div class="card-title text-center">{{__('Complete your account below')}}</div>
                    <div class="card-body d-flex flex-row justify-content-center">
                        {{-- @include('_registerForm')--}}
                        @include('auth._registerVueForm')
                    </div>
                    <div class="card-footer text-center bg-white border-0">
                        {{__('Get the facts DrinkWise.org.au')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
