@extends('layouts.master-admin')

@section('title', 'Master Admin Login')

@section('content')

<div class="login-container container-fluid py-5">
    <div class="row h-100 align-items-center justify-content-center my-5">
        <div class="col-11 col-md-8 col-lg-6 col-xl-5">
            <div class="card login-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h4 class="text-white mb-3">Master Admin Signup</h4>
                        <p class="text-white-50">Enter your email and password to signup</p>
                    </div>

                    <form action="{{ route('master-admin.signup') }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label text-white">Name</label>
                            <input type="text" name="name" class="form-control text-white login-input" placeholder="Your name">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-white">Email</label>
                            <input type="email" name="email" class="form-control text-white login-input" placeholder="Your email address">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-white">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control text-white login-input" placeholder="Your password">
                                <button class="btn login-input text-white" type="button" onclick="togglePassword('password')">
                                    <i class="fas fa-eye" id="password-icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-white">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" class="form-control text-white login-input" placeholder="Confirm your password">
                                <button class="btn login-input text-white" type="button" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye" id="password_confirmation-icon"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            function togglePassword(field) {
                                const input = document.querySelector(`input[name="${field}"]`);
                                const icon = document.getElementById(`${field}-icon`);
                                
                                if (input.type === 'password') {
                                    input.type = 'text';
                                    icon.classList.remove('fa-eye');
                                    icon.classList.add('fa-eye-slash');
                                } else {
                                    input.type = 'password';
                                    icon.classList.remove('fa-eye-slash');
                                    icon.classList.add('fa-eye');
                                }
                            }
                        </script>

                        <div class="mb-4">
                            <button type="submit" class="btn login-btn w-100 py-2 mb-4">
                                SIGNUP
                            </button>
                        </div>

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