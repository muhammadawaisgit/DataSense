<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
    <main class="login-container container-fluid vh-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-11 col-md-8 col-lg-6 col-xl-5">
                <div class="card login-card">
                    @error('error')
                        <div class="alert alert-dark alert-dismissible fade show m-4 mb-0" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h4 class="text-white mb-3">@yield('title')</h4>
                            <p class="text-white-50">Enter your email and password to login</p>
                        </div>
                        <form action="@yield('route')" method="post">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control text-white login-input @error('email') is-invalid @enderror" placeholder="Your email address" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label text-white">Password</label>
                                <input type="password" name="password" class="form-control text-white login-input @error('password') is-invalid @enderror" placeholder="Your password">
                                @error('password')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    </main>
</body>
@include('components.scripts')
</html>