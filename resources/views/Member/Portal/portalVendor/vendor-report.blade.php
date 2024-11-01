@extends('layouts.Member.master')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb"
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.customer_report') }}</h3>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/distportal') }}">{{ __('messages.portal_partner') }}</a></li>
            <li class="breadcrumb-item active text-primary">{{ __('messages.customer_report') }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Main Content Start -->
<div class="container py-5">
    <div class="row g-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="col-md-8">
                    <form action="{{ url('/customer-report') }}" method="GET" class="d-flex flex-grow-1 me-3">
                        <input type="text" name="search" class="form-control"
                            placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="bi bi-search me-1"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ url('/export-customer-report') }}" class="btn btn-success">
                        {{ __('messages.export_to_excel') }} <i class="bi bi-file-earmark-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                {{-- @forelse($customerReports as $report) --}}
                <div class="col-md-4 mb-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title">{{ __('messages.customer_name') }}: </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>{{ __('messages.email') }}:</strong> </p>
                            <p class="card-text"><strong>{{ __('messages.phone_number') }}:</strong> </p>
                            <p class="card-text"><strong>{{ __('messages.company') }}:</strong> </p>
                            <p class="card-text"><strong>{{ __('messages.location') }}:</strong> </p>
                            <p class="card-text"><strong>{{ __('messages.purchase_date') }}:</strong> </p>
                        </div>
                    </div>
                </div>
                {{-- @empty --}}
                <div class="col-12">
                    <div class="alert alert-warning text-center">{{ __('messages.no_data_found') }}</div>
                </div>
                {{-- @endforelse --}}
            </div>

        </div>
    </div>
</div>
<!-- Main Content End -->

@endsection
