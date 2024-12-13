@extends('layouts.user-dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid vh-100">
    <div class="d-flex justify-content-end p-3">
        @if(Auth::guard('user')->user()->role === 'Admin')
        <a href="{{ route('admin.appearance-settings') }}" class="btn me-2" style="background: var(--primary-color); color: var(--card-text)">
            <i class="fas fa-user-shield me-2"></i>Admin Panel
        </a>
        @endif
        <a href="{{ route('user.logout') }}" class="btn btn-danger">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
    </div>

    <div class="row h-100 align-items-center justify-content-center" style="margin-top: -80px;">
        <div class="col-11 col-md-8 col-lg-6 col-xl-5">
            <div class="card" style="background: var(--card-bg-dark); border: 1px solid var(--card-border);">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h4 style="color: var(--card-text)">Customer Search</h4>
                        <p style="color: var(--header-text-muted)">Enter customer name or email to find their details</p>
                    </div>

                    <form action="{{ route('user.search-result') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" style="color: var(--card-text)">Name or Email</label>
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Enter customer name or email"
                                   style="background: var(--input-bg);
                                          border: 1px solid var(--input-border);
                                          color: var(--input-text);">
                        </div>

                        <div class="d-grid">
                            <button type="submit" 
                                    class="btn" 
                                    style="background: var(--primary-color);
                                           color: var(--card-text);">
                                <i class="fas fa-search me-2"></i>Search Customer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection