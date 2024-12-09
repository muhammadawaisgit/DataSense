@extends('layouts.dashboard')

@section('title', 'Appearance Settings')

@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: var(--card-bg-dark); backdrop-filter: blur(var(--content-blur));">
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close text-black" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close text-black" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white mb-0">Color Scheme Settings</h5>
                        <button onclick="document.getElementById('appearance-settings-form').submit()" class="btn btn-primary rounded-3 px-4" style="background-color: var(--primary-color); border: none;">
                            <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
                        </button>
                    </div>

                    <form id="appearance-settings-form" action="{{ route('admin.appearance.settings.update') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <!-- Primary Colors Section -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: var(--card-bg-light);">
                                <h6 class="text-white mb-4">Primary Colors</h6>
                                
                                <div class="mb-4">
                                    <label class="form-label text-white-50">Primary Color</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="primary_color" class="form-control form-control-color p-1 color-input" value="{{ session('primaryColor') }}" title="Primary color" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('primaryColor') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Primary Gradient Start</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="primary_gradient_start" class="form-control form-control-color p-1 color-input" value="{{ session('primaryGradientStart') }}" title="Primary gradient start" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('primaryGradientStart') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Primary Gradient End</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="primary_gradient_end" class="form-control form-control-color p-1 color-input" value="{{ session('primaryGradientEnd') }}" title="Primary gradient end" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('primaryGradientEnd') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <!-- Sidebar Colors -->
                                <h6 class="text-white mb-4 mt-5">Sidebar Colors</h6>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Background Start</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_bg_start" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarBgStart') }}" title="Sidebar background start" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarBgStart') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Background Mid</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_bg_mid" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarBgMid') }}" title="Sidebar background mid" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarBgMid') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Background End</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_bg_end" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarBgEnd') }}" title="Sidebar background end" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarBgEnd') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Text Color</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_text_color" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarTextColor') }}" title="Sidebar text color" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarTextColor') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Menu Icon Background</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_menu_icon_bg" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarMenuIconBg') }}" title="Menu icon background" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarMenuIconBg') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Menu Icon Hover</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_menu_icon_hover" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarMenuIconHover') }}" title="Menu icon hover" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarMenuIconHover') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Line Color</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_line_color" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarLineColor') }}" title="Sidebar line color" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarLineColor') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Sidebar Menu Hover Background</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="sidebar_menu_hover_bg" class="form-control form-control-color p-1 color-input" value="{{ session('sidebarMenuHoverBg') }}" title="Sidebar menu hover background" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('sidebarMenuHoverBg') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Header & Content Colors -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: var(--card-bg-light);">
                                <h6 class="text-white mb-4">Header Colors</h6>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Background Start</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_bg_start" class="form-control form-control-color p-1 color-input" value="{{ session('headerBgStart') }}" title="Header background start" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerBgStart') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Background Mid</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_bg_mid" class="form-control form-control-color p-1 color-input" value="{{ session('headerBgMid') }}" title="Header background mid" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerBgMid') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Background End</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_bg_end" class="form-control form-control-color p-1 color-input" value="{{ session('headerBgEnd') }}" title="Header background end" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerBgEnd') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Text Color</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_text_color" class="form-control form-control-color p-1 color-input" value="{{ session('headerTextColor') }}" title="Header text color" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerTextColor') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Text Muted</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_text_muted" class="form-control form-control-color p-1 color-input" value="{{ session('headerTextMuted') }}" title="Header text muted" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerTextMuted') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Header Icon Hover</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="header_icon_hover" class="form-control form-control-color p-1 color-input" value="{{ session('headerIconHover') }}" title="Header icon hover" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('headerIconHover') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <!-- Content/Background Colors -->
                                <h6 class="text-white mb-4 mt-5">Content Colors</h6>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Body Background Overlay</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="body_bg_overlay" class="form-control form-control-color p-1 color-input" value="{{ session('bodyBgOverlay') }}" title="Body background overlay" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('bodyBgOverlay') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Content Background Dark</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="content_bg_dark" class="form-control form-control-color p-1 color-input" value="{{ session('contentBgDark') }}" title="Content background dark" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('contentBgDark') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Content Background Light</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="content_bg_light" class="form-control form-control-color p-1 color-input" value="{{ session('contentBgLight') }}" title="Content background light" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('contentBgLight') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card & Form Colors -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: var(--card-bg-light);">
                                <h6 class="text-white mb-4">Card Colors</h6>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card Background Dark</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="card_bg_dark" class="form-control form-control-color p-1 color-input" value="{{ session('cardBgDark') }}" title="Card background dark" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('cardBgDark') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card Background Light</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="card_bg_light" class="form-control form-control-color p-1 color-input" value="{{ session('cardBgLight') }}" title="Card background light" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('cardBgLight') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card Border</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="card_border" class="form-control form-control-color p-1 color-input" value="{{ session('cardBorder') }}" title="Card border" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('cardBorder') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card Text</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="card_text" class="form-control form-control-color p-1 color-input" value="{{ session('cardText') }}" title="Card text" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('cardText') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Card Text Muted</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="card_text_muted" class="form-control form-control-color p-1 color-input" value="{{ session('cardTextMuted') }}" title="Card text muted" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('cardTextMuted') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form/Input Colors -->
                        <div class="col-md-6">
                            <div class="p-3 rounded-3" style="background: var(--card-bg-light);">
                                <h6 class="text-white mb-4">Form/Input Colors</h6>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Input Background</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="input_bg" class="form-control form-control-color p-1 color-input" value="{{ session('inputBg') }}" title="Input background" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('inputBg') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Input Border</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="input_border" class="form-control form-control-color p-1 color-input" value="{{ session('inputBorder') }}" title="Input border" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('inputBorder') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Input Text</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="input_text" class="form-control form-control-color p-1 color-input" value="{{ session('inputText') }}" title="Input text" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('inputText') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-white-50">Input Placeholder</label>
                                    <div class="d-flex gap-3">
                                        <input type="color" name="input_placeholder" class="form-control form-control-color p-1 color-input" value="{{ session('inputPlaceholder') }}" title="Input placeholder" style="height: 42px; background: transparent; border: 1px solid var(--input-border);">
                                        <input type="text" class="form-control text-white text-input" value="{{ session('inputPlaceholder') }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.color-input').forEach((colorInput, i) => {
        const textInput = document.querySelectorAll('.text-input')[i];
        
        colorInput.addEventListener('input', () => {
            textInput.value = colorInput.value;
        });

        textInput.addEventListener('input', () => {
            if(/^#[0-9A-F]{6}$/i.test(textInput.value)) {
                colorInput.value = textInput.value;
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const colorInputs = document.querySelectorAll('.color-input');

    let cssVarMap = {
        'primary_color': '--primary-color',
        'primary_gradient_start': '--primary-gradient-start', 
        'primary_gradient_end': '--primary-gradient-end',
        'sidebar_bg_start': '--sidebar-bg-start',
        'sidebar_bg_mid': '--sidebar-bg-mid',
        'sidebar_bg_end': '--sidebar-bg-end',
        'sidebar_text_color': '--sidebar-text-color',
        'sidebar_menu_icon_bg': '--sidebar-menu-icon-bg',
        'sidebar_menu_icon_hover': '--sidebar-menu-icon-hover',
        'sidebar_line_color': '--sidebar-line-color',
        'sidebar_menu_hover_bg': '--sidebar-menu-hover-bg',
        'header_bg_start': '--header-bg-start',
        'header_bg_mid': '--header-bg-mid',
        'header_bg_end': '--header-bg-end',
        'header_text_color': '--header-text-color',
        'header_text_muted': '--header-text-muted',
        'header_icon_hover': '--header-icon-hover',
        'body_bg_overlay': '--body-bg-overlay',
        'content_bg_dark': '--content-bg-dark',
        'content_bg_light': '--content-bg-light',
        'content_blur': '--content-blur',
        'card_bg_dark': '--card-bg-dark',
        'card_bg_light': '--card-bg-light',
        'card_border': '--card-border',
        'card_text': '--card-text',
        'card_text_muted': '--card-text-muted',
        'input_bg': '--input-bg',
        'input_border': '--input-border',
        'input_text': '--input-text',
        'input_placeholder': '--input-placeholder',
        'danger_bg': '--danger-bg',
        'danger_border': '--danger-border',
        'danger_text': '--danger-text'
    };

    colorInputs.forEach(input => {
        // Initial value set
        const varName = cssVarMap[input.name];
        if (varName) {
            let value = input.value;
            document.documentElement.style.setProperty(varName, value);
        }

        // Change event listener
        input.addEventListener('change', () => {
            const varName = cssVarMap[input.name];
            if (!varName) return;

            let value = input.value;
            document.documentElement.style.setProperty(varName, value);
        });

        // Input event listener for real-time updates
        input.addEventListener('input', () => {
            const varName = cssVarMap[input.name];
            if (!varName) return;

            let value = input.value;
            document.documentElement.style.setProperty(varName, value);
        });
    });
});
</script>


@endsection
