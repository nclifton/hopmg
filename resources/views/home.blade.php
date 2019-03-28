@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!</p>

                        @if(Auth::getUser()->first_name=="Guest")
                            <p>You are a guest</p>
                            <p>Restricted content</p>
                        @else
                            <p>You are a registered customer</p>
                            <p>Full Content</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
