@extends('layouts.dashboard')

@section('title', 'Appearance Settings')

@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: rgba(6,11,38,0.8); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">Color Scheme Settings</h5>
                        <button class="btn btn-primary rounded-3 px-4" style="background-color: #0075FF; border: none;">
                            <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
                        </button>
                    </div>

                    <div class="row g-4">
                        <!-- Primary Colors Section -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: rgba(26,31,55,0.5);">
                                <h6 class="text-white mb-4">Primary Colors</h6>
                                
                                <div class="mb-4">
                                    <label class="form-label text-white-50">Primary Buttons & Links (#0075FF)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#0075FF" title="Used for primary buttons and links" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#0075FF" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Active Items & Highlights (#4318FF)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#4318FF" title="Used for active sidebar items and highlights" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#4318FF" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Notification Badges & Secondary Highlights (#9F7AEA)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#9F7AEA" title="Used for notification badges and secondary highlights" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#9F7AEA" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Background Colors Section -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: rgba(26,31,55,0.5);">
                                <h6 class="text-white mb-4">Background Colors</h6>
                                
                                <div class="mb-4">
                                    <label class="form-label text-white-50">Main Dashboard Background (#060B26)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#060B26" title="Main dashboard background color" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#060B26" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card & Sidebar Background (#1A1F37)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#1A1F37" title="Used for cards and sidebar background" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#1A1F37" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Modal & Dropdown Background (#0A0E23)</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" class="form-control form-control-color p-1" value="#0A0E23" title="Used for modals and dropdowns" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                        <input type="text" class="form-control text-white" value="#0A0E23" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Colors Section -->
                        <div class="col-12">
                            <div class="p-3 rounded-3" style="background: rgba(26,31,55,0.5);">
                                <h6 class="text-white mb-4">Status Colors</h6>
                                
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50">Success States & Active Status (#00C9A7)</label>
                                        <div class="d-flex gap-3">
                                            <input type="color" class="form-control form-control-color p-1" value="#00C9A7" title="Used for success messages and active status" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                            <input type="text" class="form-control text-white" value="#00C9A7" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50">Warning Messages & Alerts (#FFB547)</label>
                                        <div class="d-flex gap-3">
                                            <input type="color" class="form-control form-control-color p-1" value="#FFB547" title="Used for warning messages and alerts" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                            <input type="text" class="form-control text-white" value="#FFB547" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50">Error Messages & Delete Actions (#DC3545)</label>
                                        <div class="d-flex gap-3">
                                            <input type="color" class="form-control form-control-color p-1" value="#DC3545" title="Used for error messages and delete actions" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                            <input type="text" class="form-control text-white" value="#DC3545" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50">Info Messages & Help Text (#0dcaf0)</label>
                                        <div class="d-flex gap-3">
                                            <input type="color" class="form-control form-control-color p-1" value="#0dcaf0" title="Used for information messages and help text" style="height: 42px; background: transparent; border: 1px solid rgba(255,255,255,0.1);">
                                            <input type="text" class="form-control text-white" value="#0dcaf0" style="background: rgba(6,11,38,0.5); border: 1px solid rgba(255,255,255,0.1);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
