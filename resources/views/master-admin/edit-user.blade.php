@extends('layouts.dashboard')
@section('title', 'Edit User Admin')
@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: rgba(6,11,38,0.8); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">Edit User Admin</h5>
                    </div>

                    <!-- alert -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('master-admin.edit-user', $userAdmin->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Full Name</label>
                                <input type="text" value="{{ $userAdmin->name }}" name="name" class="form-control bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Email</label>
                                <input type="email" value="{{ $userAdmin->email }}" name="email" class="form-control bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Role</label>
                                <select name="role" class="form-select bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                                    <option value="user-admin" {{ $userAdmin->role == 'user-admin' ? 'selected' : '' }}>User Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Status</label>
                                <select name="status" class="form-select bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                                    <option value="active" {{ $userAdmin->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $userAdmin->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('master-admin.dashboard') }}" type="button" class="btn btn-secondary me-2 rounded-3 px-4" style="background-color: #1A1F37; border: none;">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary rounded-3 px-4" style="background-color: #0075FF; border: none;">
                                <i class="fa-solid fa-plus me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
