@extends('layouts.frontend.master')

@section('title', 'Authentication')

@section('css')
<style>
    #loginForm label,
    #registerForm label {
        font-size: 0.875rem;
    }

    #loginForm input,
    #registerForm input {
        font-size: 0.813rem !important;
    }
</style>
@endsection

@section('content')
<div class="sec-auth py-5">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="row">
                    <h2 class="cmn-ttl text-uppercase mb-4">
                        Login
                    </h2>

                    <form action="{{ route('login') }}" method="POST" class="mt-2" id="loginForm">
                    @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" id="email"
                            name="email" placeholder="Enter Your Email Address">
                            <label for="floatingInput">Email Address</label>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control rounded-0" id="password"
                            name="password" placeholder="Enter Your Password">
                            <label for="floatingPassword">Password</label>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>

                        <div class="my-4">
                            <button type="submit" class="btn btn-dark rounded-0 w-100 py-2 text-uppercase fs-14">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="row">
                    <h2 class="cmn-ttl text-uppercase mb-4">
                        Register
                    </h2>

                    <form action="{{ route('register') }}" method="POST" class="mt-2" id="registerForm">
                    @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" id="name"
                            name="name" placeholder="Enter Your Name">
                            <label for="name">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" id="email"
                            name="email" placeholder="Enter Your Email Address">
                            <label for="email">Email Address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-0" id="password"
                            name="password" placeholder="Enter Your Password">
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control rounded-0" id="password_confirmation"
                            name="password_confirmation" placeholder="Confirm Your Password">
                            <label for="password_confirmation">Password Confirmation</label>
                        </div>

                        <div class="my-4">
                            <button type="submit" class="btn btn-dark rounded-0 w-100 py-2 text-uppercase fs-14">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.sec-product-list -->
@endsection
