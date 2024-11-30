@extends('layouts.master-admin')

@section('title', 'Master Admin Login')

@section('content')

<div class="login-container container-fluid vh-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-11 col-md-8 col-lg-6 col-xl-5">
            <div class="card login-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h4 class="text-white mb-3">Master Admin Login</h4>
                        <p class="text-white-50">Enter your email and password to login</p>
                    </div>

                    <form action="{{ route('master-admin.login') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label text-white">Email</label>
                            <input type="email" name="email" class="form-control text-white login-input" placeholder="Your email address">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control text-white login-input" placeholder="Your password">
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input login-checkbox" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label text-white-50" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn login-btn w-100 py-2 mb-4">
                            LOGIN
                        </button>

                        {{-- <p class="text-center text-white-50 mb-0">
                            Don't have an account? <a href="#" class="login-link">Sign up</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection