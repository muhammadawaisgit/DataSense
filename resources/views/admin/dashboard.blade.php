@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: rgba(6,11,38,0.8); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">Users Table</h5>
                        <a href="{{ route('admin.add-user') }}" class="btn btn-primary rounded-3 px-4" style="background-color: #0075FF; border: none;">
                            <i class="fa-solid fa-plus me-2"></i>Add New User
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="text-white-50" style="font-weight: 400;">NAME</th>
                                    <th class="text-white-50" style="font-weight: 400;">ROLE</th>
                                    <th class="text-white-50" style="font-weight: 400;">STATUS</th>
                                    <th class="text-white-50" style="font-weight: 400;">CREATED AT</th>
                                    <th class="text-white-50" style="font-weight: 400;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle me-3" style="width: 40px; height: 40px; background-color: #1A1F37;">
                                                    <i class="fa-solid fa-user text-white-50 p-2 d-flex justify-content-center align-items-center h-100"></i>
                                                </div>
                                                <div>
                                                    <h6 class="text-white mb-0">{{ $user->name }}</h6>
                                                    <small class="text-white-50">{{ $user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="text-white mb-0">{{ $user->role }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-2" 
                                                  style="background-color: {{ $user->status == 'active' ? 'rgba(0,201,167,0.1)' : 'rgba(130,134,139,0.1)' }}; 
                                                         color: {{ $user->status == 'active' ? '#00C9A7' : '#82868B' }};">
                                                {{ $user->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white-50">{{ $user->created_at->format('d/M/Y') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-link text-decoration-none p-0 me-3">
                                                <i class="edit-icon fa-solid fa-pen text-white-50"></i>
                                            </a>
                                            <a href="#" class="btn btn-link text-decoration-none p-0" 
                                               onclick="event.preventDefault(); 
                                                        if(confirm('Are you sure you want to delete this user?')) {
                                                            document.getElementById('delete-form-{{ $user->id }}').submit();
                                                        }">
                                                <i class="delete-icon fa-solid fa-trash text-white-50"></i>
                                            </a>
                                            <form id="delete-form-{{ $user->id }}" 
                                                  action="{{ route('admin.delete-user', $user->id) }}" 
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-white-50">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

