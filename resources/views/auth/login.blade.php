@extends('layouts.app')

@section('content')
    <div class="container login-form">
        <div class="card p-0">
            <div class="card-header bg-white border-0 title text-center">
                <h1>{{ __('BEER REWARDS') }}</h1>
            </div>
            <div class="card-body d-flex flex-sm-column flex-md-row justify-content-between">
                @include('auth._guestLogin')
                <div class="label align-self-center">
                    or
                </div>
                @include('auth._accountLogin')
            </div>
        </div>
    </div>
@endsection
