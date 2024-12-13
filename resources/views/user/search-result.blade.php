@extends('layouts.user-dashboard')
@section('title', 'Search Results')
@section('content')
<div class="container-fluid min-vh-100 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 px-3">
        <div>
            <h4 class="mb-1" style="color: var(--card-text)">Search Results</h4>
            <p class="mb-0" style="color: var(--header-text-muted)">Found {{ $customers->count() }} customers matching your search</p>
        </div>
        <a href="{{ route('user.dashboard') }}" class="btn d-flex align-items-center gap-2" style="background: var(--primary-color); color: var(--card-text)">
            <i class="fas fa-arrow-left"></i>
            Back to Search
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card shadow-sm" style="background: var(--card-bg-dark); border: 1px solid var(--card-border); border-radius: 12px;">
                <div class="card-body p-4">
                    @if($customers->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-3x mb-3" style="color: var(--header-text-muted)"></i>
                            <h5 style="color: var(--card-text)">No Results Found</h5>
                            <p style="color: var(--header-text-muted)">No customers found matching your search criteria.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4" style="color: var(--header-text-muted); font-weight: 600;">Customer</th>
                                        <th style="color: var(--header-text-muted); font-weight: 600;">Contact</th>
                                        <th style="color: var(--header-text-muted); font-weight: 600;">Company</th>
                                        <th style="color: var(--header-text-muted); font-weight: 600;">Location</th>
                                        <th style="color: var(--header-text-muted); font-weight: 600;">Loyalty Status</th>
                                        <th style="color: var(--header-text-muted); font-weight: 600;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr style="color: var(--card-text); border-bottom: 1px solid var(--card-border)">
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background: var(--primary-gradient-start);">
                                                        <span class="text-white">{{ substr($customer->firstName, 0, 1) }}{{ substr($customer->lastName, 0, 1) }}</span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0" style="color: var(--card-text)">{{ $customer->firstName }} {{ $customer->lastName }}</h6>
                                                        <small style="color: var(--header-text-muted)">{{ $customer->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->company ?: '-' }}</td>
                                            <td>{{ $customer->city }}, {{ $customer->state }}</td>
                                            <td>
                                                @if($customer->loyaltyEnrollment)
                                                    <span class="badge rounded-pill px-3 py-2" style="background: var(--primary-gradient-start)">
                                                        <i class="fas fa-star me-1"></i> Enrolled
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill px-3 py-2" style="background: var(--content-bg-light); color: var(--header-text-muted)">
                                                        Not Enrolled
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('user.customer-details', $customer->id) }}" class="btn btn-sm rounded-pill px-3" style="background: var(--primary-gradient-start); color: var(--card-text)">
                                                    <i class="fas fa-eye me-1"></i> View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
