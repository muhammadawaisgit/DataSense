@extends('layouts.dashboard')
@section('title', 'Add User Admins')
@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: rgba(6,11,38,0.8); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">Add New User</h5>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Full Name</label>
                                <input type="text" class="form-control bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Email</label>
                                <input type="email" class="form-control bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Password</label>
                                <input type="password" class="form-control bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Role</label>
                                <select class="form-select bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                                    <option value="user-admin">User Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white-50">Status</label>
                                <select class="form-select bg-transparent text-white border-0" style="background-color: #1A1F37 !important;">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-secondary me-2 rounded-3 px-4" style="background-color: #1A1F37; border: none;">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary rounded-3 px-4" style="background-color: #0075FF; border: none;">
                                <i class="fa-solid fa-plus me-2"></i>Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
