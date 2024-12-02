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
                            <i class="fa-solid fa-plus me-2"></i>Add New
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="text-white-50" style="font-weight: 400;">NAME</th>
                                    <th class="text-white-50" style="font-weight: 400;">EMAIL</th>
                                    <th class="text-white-50" style="font-weight: 400;">ROLE</th>
                                    <th class="text-white-50" style="font-weight: 400;">STATUS</th>
                                    <th class="text-white-50" style="font-weight: 400;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle me-3" style="width: 40px; height: 40px; background-color: #1A1F37;">
                                                <i class="fa-solid fa-user text-white-50 p-2 d-flex justify-content-center align-items-center h-100"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-white mb-0">John Michael</h6>
                                                <small class="text-white-50">john@creative-tim.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="text-white mb-0">Manager</h6>
                                            <small class="text-white-50">Organization</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: rgba(0,201,167,0.1); color: #00C9A7;">Online</span>
                                    </td>
                                    <td>
                                        <span class="text-white-50">23/04/18</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-link text-decoration-none p-0 me-3">
                                            <i class="edit-icon fa-solid fa-pen text-white-50"></i>
                                        </a>
                                        <a class="btn btn-link text-decoration-none p-0">
                                            <i class="delete-icon fa-solid fa-trash text-white-50"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle me-3" style="width: 40px; height: 40px; background-color: #1A1F37;">
                                                <i class="fa-solid fa-user text-white-50 p-2 d-flex justify-content-center align-items-center h-100"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-white mb-0">Alexa Liras</h6>
                                                <small class="text-white-50">alexa@creative-tim.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="text-white mb-0">Programator</h6>
                                            <small class="text-white-50">Developer</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: rgba(130,134,139,0.1); color: #82868B;">Offline</span>
                                    </td>
                                    <td>
                                        <span class="text-white-50">11/01/19</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-link text-decoration-none p-0 me-3">
                                            <i class="edit-icon fa-solid fa-pen text-white-50"></i>
                                        </a>
                                        <a class="btn btn-link text-decoration-none p-0">
                                            <i class="delete-icon fa-solid fa-trash text-white-50"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

