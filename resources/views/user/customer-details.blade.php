@extends('layouts.user-dashboard')
@section('title', 'Customer Details')
@section('content')
<div class="container-fluid min-vh-100 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 px-3">
        <div>
            <h4 class="mb-1" style="color: var(--card-text)">Customer Details</h4>
            <p class="mb-0" style="color: var(--header-text-muted)">Viewing details for {{ $customer->firstName }} {{ $customer->lastName }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('user.dashboard') }}" class="btn d-flex align-items-center gap-2" style="background: var(--primary-color); color: var(--card-text)">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
            <a href="{{ route('user.edit-customer', $customer->id) }}" class="btn d-flex align-items-center gap-2" style="background: var(--primary-gradient-start); color: var(--card-text)">
                <i class="fas fa-edit"></i>
                Edit
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card shadow-sm" style="background: var(--card-bg-dark); border: 1px solid var(--card-border); border-radius: 12px;">
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

                    <div class="row g-4">
                        @foreach([
                            'firstName' => ['icon' => 'fa-user'],
                            'lastName' => ['icon' => 'fa-user'],
                            'email' => ['icon' => 'fa-envelope'],
                            'company' => ['icon' => 'fa-building'],
                            'phone' => ['icon' => 'fa-phone'],
                            'mobile' => ['icon' => 'fa-phone'],
                            'address' => ['icon' => 'fa-location-dot'],
                            'city' => ['icon' => 'fa-city'],
                            'state' => ['icon' => 'fa-map'],
                            'zipcode' => ['icon' => 'fa-map-pin'],
                            'birthMonth' => ['icon' => 'fa-calendar'],
                            'birthDay' => ['icon' => 'fa-calendar-day'],
                            'physicalMailing' => ['icon' => 'fa-envelope-open-text'],
                            'digitalMailing' => ['icon' => 'fa-at'],
                            'loyaltyEnrollment' => ['icon' => 'fa-star']
                        ] as $field => $config)
                            @if(isset($settings[$field]) && $settings[$field]['display'])
                                <div class="col-md-6 col-lg-4">
                                    <div class="p-3 rounded-3" style="background: var(--card-bg-light); border: 1px solid var(--card-border);">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fa-solid {{ $config['icon'] }} me-2" style="color: var(--primary-color)"></i>
                                            <span style="color: var(--header-text-muted)">{{ $settings[$field]['label'] }}</span>
                                        </div>
                                        <div style="color: var(--card-text)">
                                            @if(in_array($field, ['physicalMailing', 'digitalMailing', 'loyaltyEnrollment']))
                                                <span class="badge rounded-pill px-3 py-2" 
                                                      style="background: {{ $customer->$field == 'allow' ? 'var(--primary-gradient-start)' : 'var(--content-bg-light)' }}">
                                                    {{ $customer->$field == 'allow' ? 'Yes' : 'No' }}
                                                </span>
                                            @elseif($field === 'birthMonth')
                                                {{ $customer->$field ? $months[$customer->$field] : '-' }}
                                            @else
                                                {{ $customer->$field ?: '-' }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-lg-4">
                                    <h4 class="mb-1" style="color: var(--card-text)">Error</h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($custom_ads))
    @php
        $custom_ads = json_decode($custom_ads->custom_ads, true);
    @endphp
        <div class="row justify-content-center mt-4">
            <div class="col-11">
                <div class="row g-4">
                    @foreach(['ad1', 'ad2', 'ad3'] as $ad)
                        @if(isset($custom_ads[$ad]['image']) && $custom_ads[$ad]['image'])
                            <div class="col-md-4">
                                <a href="{{ $custom_ads[$ad]['link'] }}" target="_blank">
                                    <img src="{{ asset('storage/' . $custom_ads[$ad]['image']) }}" alt="Advertisement" class="img-fluid rounded-3">
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
