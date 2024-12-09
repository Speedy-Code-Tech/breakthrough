
@extends('layouts.admin')
@section('title','Login - Breakthrough')
@section('main')
<div class="container-fluid d-flex flex-column h-100">
    <div class="title"></div>
    <div class="line"></div>
    <div class="mainContent h-100 d-flex justify-content-center pt-3">
        <div class="bg-login">
            <div class="container-fluid d-flex justify-content-center gap-3 align-items-center flex-column   ">
                <div class="shapeWhite">
                    <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="Sample">
                </div>
                <h3 class="adminText">ADMINISTRATOR</h3>
            </div>
            <div class="container-fluid midSection mt-5">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="row d-flex flex-column gap-2 justify-content-center align-items-center">
                        <div class="col d-flex gap-2 justify-content-center align-items-center">
                            <p class="p-0 m-0 fw-bold text-white">Name:</p>
                            <input type="text" class="form-control ms-5 @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus name="name" id="username">
                        </div>
                        <div class="col d-flex gap-2 justify-content-center align-items-center">
                            <p class="p-0 m-0 fw-bold text-white">Email:</p>
                            <input type="text" class="form-control ms-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus name="email" id="username">
                        </div>
                        <div class="col d-flex gap-2 justify-content-center align-items-center">
                            <p class="p-0 m-0 fw-bold text-white">Password:</p>
                            <input type="password" class="form-control ms-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="col d-flex gap-2 justify-content-center align-items-center">
                            <p class="p-0 m-0 fw-bold text-white">Confirm Password:</p>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                        </div>
                        
                        <button class="loginbtn" style="width: 150px;">Register</button>
                        <a href="{{ route('login') }}" class="loginbtn text-decoration-none" style="width: 300px; text-align: center;">Already have an Account?</a>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
@endsection




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
