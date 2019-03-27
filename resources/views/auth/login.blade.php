@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('auth._guestLogin')
            </div>
            <div class="col-md-6">
                @include('auth._accountLogin')
            </div>
        </div>
    </div>
@endsection
