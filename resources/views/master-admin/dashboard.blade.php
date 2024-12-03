@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: rgba(6,11,38,0.8); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">User Admins Table</h5>
                        <a href="{{ route('master-admin.add-user') }}" class="btn btn-primary rounded-3 px-4" style="background-color: #0075FF; border: none;">
                            <i class="fa-solid fa-plus me-2"></i>Add New User
                        </a>
                    </div>

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
                                @forelse($userAdmins as $admin)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle me-3" style="width: 40px; height: 40px; background-color: #1A1F37;">
                                                    <i class="fa-solid fa-user text-white-50 p-2 d-flex justify-content-center align-items-center h-100"></i>
                                                </div>
                                                <div>
                                                    <h6 class="text-white mb-0">{{ $admin->name }}</h6>
                                                    <small class="text-white-50">{{ $admin->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="text-white mb-0">{{ $admin->role }}</h6>
                                                <small class="text-white-50">{{ $admin->department }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-2" 
                                                  style="background-color: {{ $admin->status == 'active' ? 'rgba(0,201,167,0.1)' : 'rgba(130,134,139,0.1)' }}; 
                                                         color: {{ $admin->status == 'active' ? '#00C9A7' : '#82868B' }};">
                                                {{ $admin->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white-50">{{ $admin->created_at->format('d/M/Y') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('master-admin.edit-user', $admin->id) }}" class="btn btn-link text-decoration-none p-0 me-3">
                                                <i class="edit-icon fa-solid fa-pen text-white-50"></i>
                                            </a>
                                            <a href="#" class="btn btn-link text-decoration-none p-0" 
                                               onclick="event.preventDefault(); 
                                                        if(confirm('Are you sure you want to delete this user?')) {
                                                            document.getElementById('delete-form-{{ $admin->id }}').submit();
                                                        }">
                                                <i class="delete-icon fa-solid fa-trash text-white-50"></i>
                                            </a>
                                            <form id="delete-form-{{ $admin->id }}" 
                                                  action="{{ route('master-admin.delete-user', $admin->id) }}" 
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-white-50">No user admins found</td>
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

