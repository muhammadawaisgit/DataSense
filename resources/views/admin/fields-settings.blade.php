@extends('layouts.dashboard')

@section('title', 'Fields Settings')

@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: var(--card-bg-dark); backdrop-filter: blur(var(--content-blur));">
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @error('error')
                        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="text-white mb-1">Field Settings</h4>
                            <p class="text-white-50 mb-0">Configure form fields and their properties</p>
                        </div>
                        <button onclick="document.getElementById('fields-settings-form').submit()" class="btn btn-primary rounded-3 px-4 d-flex align-items-center" style="background-color: var(--primary-color); border: none;">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            <span>Save Settings</span>
                        </button>
                    </div>

                    @php
                        $fieldSettings = \App\Models\FieldSettings::where('user_admin_id', Auth::guard('user-admin')->user()->id)->first();
                        $settings = $fieldSettings ? json_decode($fieldSettings->fields_settings, true) : [];
                    @endphp

                    <form id="fields-settings-form" action="{{ route('admin.fields-settings.update') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-4 rounded-3" style="background: var(--card-bg-light);">
                                    <div class="row">
                                        @foreach([
                                            'firstName' => ['label' => 'First Name', 'icon' => 'fa-user'],
                                            'lastName' => ['label' => 'Last Name', 'icon' => 'fa-user'],
                                            'email' => ['label' => 'Email Address', 'icon' => 'fa-envelope'],
                                            'company' => ['label' => 'Company Name', 'icon' => 'fa-building'],
                                            'phone' => ['label' => 'Phone Number', 'icon' => 'fa-phone'],
                                            'mobile' => ['label' => 'Mobile Number', 'icon' => 'fa-mobile-screen'],
                                            'address' => ['label' => 'Street Address', 'icon' => 'fa-location-dot'],
                                            'city' => ['label' => 'City', 'icon' => 'fa-city'],
                                            'state' => ['label' => 'State/Province', 'icon' => 'fa-map'],
                                            'zipcode' => ['label' => 'ZIP/Postal Code', 'icon' => 'fa-map-pin'],
                                            'birthMonth' => ['label' => 'Birth Month', 'icon' => 'fa-calendar'],
                                            'birthDay' => ['label' => 'Birth Day', 'icon' => 'fa-calendar-day'],
                                            'physicalMailing' => ['label' => 'Physical Mailing', 'icon' => 'fa-envelope-open-text'],
                                            'digitalMailing' => ['label' => 'Digital Mailing', 'icon' => 'fa-at'],
                                            'loyaltyEnrollment' => ['label' => 'Loyalty Program', 'icon' => 'fa-star']
                                        ] as $name => $field)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="field-card p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid var(--card-border);">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fa-solid {{ $field['icon'] }} text-white-50 me-2"></i>
                                                    <label for="{{ $name }}" class="form-label text-white h6 mb-0 label-text flex-grow-1" id="label-{{ $name }}">{{ $settings[$name]['label'] ?? $field['label'] }}</label>
                                                    <input type="text" class="form-control text-white d-none label-input" id="input-{{ $name }}" value="{{ $settings[$name]['label'] ?? $field['label'] }}" name="label_{{ $name }}" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                                    <button type="button" class="btn btn-link p-0 edit-label-icon" data-id="{{ $name }}">
                                                        <i class="fa-solid fa-pencil text-white-50"></i>
                                                    </button>
                                                </div>

                                                @if(in_array($name, ['birthMonth', 'birthDay', 'physicalMailing', 'digitalMailing', 'loyaltyEnrollment']))
                                                    <select class="form-select text-white mb-3" id="{{ $name }}" name="{{ $name }}_value" style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                                        @if(in_array($name, ['birthMonth', 'birthDay']))
                                                            <option selected>Select {{ $settings[$name]['label'] ?? $field['label'] }}</option>
                                                            @if($name === 'birthMonth')
                                                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                                                                    <option value="{{ $index + 1 }}" {{ ($settings[$name]['value'] ?? '') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option value="{{ $i }}" {{ ($settings[$name]['value'] ?? '') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                                                @endfor
                                                            @endif
                                                        @else
                                                            <option value="allow" {{ ($settings[$name]['value'] ?? '') == 'allow' ? 'selected' : '' }}>Allow</option>
                                                            <option value="deny" {{ ($settings[$name]['value'] ?? '') == 'deny' ? 'selected' : '' }}>Deny</option>
                                                        @endif
                                                    </select>
                                                @else
                                                    <input type="{{ $name === 'email' ? 'email' : 'text' }}" 
                                                           class="form-control text-white mb-3" 
                                                           id="{{ $name }}"
                                                           name="{{ $name }}_value"
                                                           value="{{ $settings[$name]['value'] ?? '' }}"
                                                           placeholder="Enter {{ strtolower($field['label']) }}"
                                                           style="background: var(--input-bg); border: 1px solid var(--input-border);">
                                                @endif

                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="{{ $name }}Display" name="{{ $name }}_display" {{ ($settings[$name]['display'] ?? true) ? 'checked' : '' }}>
                                                        <label class="form-check-label text-white-50" for="{{ $name }}Display">Display</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="{{ $name }}Required" name="{{ $name }}_required" {{ ($settings[$name]['required'] ?? false) ? 'checked' : '' }}>
                                                        <label class="form-check-label text-white-50" for="{{ $name }}Required">Required</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
    // Edit label functionality
    document.querySelectorAll('.edit-label-icon').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const labelText = document.getElementById(`label-${id}`);
            const labelInput = document.getElementById(`input-${id}`);
            
            labelText.classList.add('d-none');
            labelInput.classList.remove('d-none');
            labelInput.focus();
        });
    });

    // Save label on blur
    document.querySelectorAll('.label-input').forEach(input => {
        input.addEventListener('blur', function() {
            const id = this.id.replace('input-', '');
            const labelText = document.getElementById(`label-${id}`);
            
            if (this.value.trim() !== '') {
                labelText.textContent = this.value;
            }
            labelText.classList.remove('d-none');
            this.classList.add('d-none');
        });

        // Save label on Enter key
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.blur();
            }
        });
    });
});
</script>
@endsection