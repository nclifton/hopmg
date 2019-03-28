@extends('layouts.app')

@section('content')
    <div class="container login-form">
        <div class="d-flex flex-row justify-content-center">
            <div class="card p-0">
                <div class="card-header bg-white border-0 title w-100 text-center">
                    <h1>{{ __('BEER REWARDS') }}</h1>
                </div>
                <div class="card-body d-flex flex-row justify-content-between">
                    @include('auth._guestLogin')
                    @include('auth._accountLogin')
                </div>
            </div>
        </div>
    </div>
@endsection
