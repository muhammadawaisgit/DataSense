<div class="sidebar-main d-flex justify-content-center align-items-center">
    <div class="sidebar-container w-100 h-100">
        <div class="sidebar-header d-flex justify-content-center align-items-center">
            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid"> --}}
            <h3 class="text-white text-uppercase mb-0" style="font-size: 14px;letter-spacing: 8px;">Vision</h3>
        </div>
        <div class="sidebar-line mx-auto mb-3"></div>
        <div class="sidebar-menu">
            @if (Auth::guard('master-admin')->check())
                <a href="{{ route('master-admin.dashboard') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-house p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Dashboard</span>
                </a>
            @elseif (Auth::guard('user-admin')->check())
                <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-house p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Dashboard</span>
                </a>
            @endif

            @if (Auth::guard('user-admin')->check())
                <a href="{{ route('admin.appearance-settings') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-gear p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Appearance Settings</span>
                </a>

                <a href="{{ route('admin.fields-settings') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-gear p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Fields Settings</span>
                </a>

                <a href="{{ route('admin.custom-ads-settings') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-gear p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Custom Ads Settings</span>
                </a>

            @endif

            @if (Auth::guard('user-admin')->check())
                <a href="#" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-user p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Profile</span>
                </a>
            @endif
            
            @if (Auth::guard('master-admin')->check())
                <a href="{{ route('master-admin.logout') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-sign-out p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Logout</span>
                </a>
            @elseif (Auth::guard('user-admin')->check())
                <a href="{{ route('admin.logout') }}" class="sidebar-menu-item d-flex align-items-center p-2 w-100">
                    <div class="sidebar-menu-icon-container">
                        <i class="sidebar-menu-icon fa-solid fa-sign-out p-2"></i>
                    </div>
                    <span class="sidebar-menu-text text-white">Logout</span>
                </a>
            @endif

            <img class="sidebar-need-help-img" src="{{ asset('assets/images/elements/need-help.png') }}" alt="Need Help" class="img-fluid">

        </div>
    </div>
</div>