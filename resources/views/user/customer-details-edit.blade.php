@extends('layouts.user-dashboard')
@section('title', 'Edit Customer')
@section('content')
<div class="container-fluid min-vh-100 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 px-3">
        <div>
            <h4 class="mb-1" style="color: var(--card-text)">Edit Customer</h4>
            <p class="mb-0" style="color: var(--header-text-muted)">Editing details for {{ $customer->firstName }} {{ $customer->lastName }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('user.customer-details', $customer->id) }}" class="btn d-flex align-items-center gap-2" style="background: var(--primary-color); color: var(--card-text)">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card shadow-sm" style="background: var(--card-bg-dark); border: 1px solid var(--card-border); border-radius: 12px;">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body p-4">
                    @php
                        $settings = $fieldSettings ? json_decode($fieldSettings->fields_settings, true) : [];
                        $months = [
                            1 => 'January', 2 => 'February', 3 => 'March', 
                            4 => 'April', 5 => 'May', 6 => 'June',
                            7 => 'July', 8 => 'August', 9 => 'September',
                            10 => 'October', 11 => 'November', 12 => 'December'
                        ];
                    @endphp

                    <form action="{{ route('user.update-customer', $customer->id) }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            @foreach([
                                'firstName' => ['icon' => 'fa-user', 'type' => 'text'],
                                'lastName' => ['icon' => 'fa-user', 'type' => 'text'],
                                'email' => ['icon' => 'fa-envelope', 'type' => 'email'],
                                'company' => ['icon' => 'fa-building', 'type' => 'text'],
                                'phone' => ['icon' => 'fa-phone', 'type' => 'tel'],
                                'mobile' => ['icon' => 'fa-phone', 'type' => 'tel'],
                                'address' => ['icon' => 'fa-location-dot', 'type' => 'text'],
                                'city' => ['icon' => 'fa-city', 'type' => 'text'],
                                'state' => ['icon' => 'fa-map', 'type' => 'text'],
                                'zipcode' => ['icon' => 'fa-map-pin', 'type' => 'text'],
                                'birthMonth' => ['icon' => 'fa-calendar', 'type' => 'select'],
                                'birthDay' => ['icon' => 'fa-calendar-day', 'type' => 'number'],
                                'physicalMailing' => ['icon' => 'fa-envelope-open-text', 'type' => 'toggle'],
                                'digitalMailing' => ['icon' => 'fa-at', 'type' => 'toggle'],
                                'loyaltyEnrollment' => ['icon' => 'fa-star', 'type' => 'toggle']
                            ] as $field => $config)
                                @if(isset($settings[$field]) && $settings[$field]['display'])
                                    <div class="col-md-6 col-lg-4">
                                        <div class="p-3 rounded-3" style="background: var(--card-bg-light); border: 1px solid var(--card-border);">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fa-solid {{ $config['icon'] }} me-2" style="color: var(--primary-color)"></i>
                                                <label for="{{ $field }}" style="color: var(--header-text-muted)">{{ $settings[$field]['label'] }}</label>
                                            </div>
                                            <div style="color: var(--card-text)">
                                                @if($config['type'] === 'toggle')
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="{{ $field }}" name="{{ $field }}" value="1" {{ $customer->$field == 'allow' ? 'checked' : '' }}>
                                                    </div>
                                                @elseif($config['type'] === 'select' && $field === 'birthMonth')
                                                    <select class="form-select" id="{{ $field }}" name="{{ $field }}" style="background: var(--input-bg); border-color: var(--input-border); color: var(--input-text)">
                                                        <option value="">Select Month</option>
                                                        @foreach($months as $key => $month)
                                                            <option value="{{ $key }}" {{ $customer->$field == $key ? 'selected' : '' }}>{{ $month }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="{{ $config['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $customer->$field }}" style="background: var(--input-bg); border-color: var(--input-border); color: var(--input-text)">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn d-flex align-items-center gap-2" style="background: var(--primary-gradient-start); color: var(--card-text)">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
