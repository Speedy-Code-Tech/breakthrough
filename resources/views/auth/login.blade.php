@extends('layouts.admin')
@section('title', 'Login - Breakthrough')
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
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row d-flex flex-column gap-2 justify-content-center align-items-center">
                            <div class="col d-flex gap-1 flex-column justify-content-center align-items-center">

                                <div class="container-fluid d-flex gap-2 justify-content-center align-items-center">
                                    <p class="p-0 m-0 fw-bold text-white">Email:</p>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus name="email"
                                        id="username">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col d-flex gap-1 flex-column justify-content-center align-items-center">
                                <div class="container-fluid d-flex gap-2 justify-content-center align-items-center">
                                    <p class="p-0 m-0 fw-bold text-white">Password:</p>
                                    <input type="password" class="form-control ms-1 @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="loginbtn" style="width: 150px;">Login</button>
                            <a href="{{ route('register') }}" class="loginbtn text-decoration-none"
                                style="width: 200px; text-align: center;">Create Account</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
