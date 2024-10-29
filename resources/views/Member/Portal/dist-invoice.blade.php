@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.invoice') }}</h3>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/distportal') }}">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.invoice') }}</li>
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
                        <form action="{{ url('/invoice') }}" method="GET" class="d-flex flex-grow-1 me-3">
                            <input type="text" name="search" class="form-control"
                                placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ms-2">
                                <i class="bi bi-search me-1"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ url('/export-invoice') }}" class="btn btn-success">
                            {{ __('messages.export_to_excel') }}
                            <i class="bi bi-file-earmark-arrow-down ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>{{ __('messages.number') }}</th>
                                <th>{{ __('messages.customer_name') }}</th>
                                <th>{{ __('messages.purchase_date') }}</th>
                                <th>{{ __('messages.total_amount') }}</th>
                                <th>{{ __('messages.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse($invoices as $invoice) --}}
                            {{-- <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->customer_name }}</td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td>{{ $invoice->payment_status }}</td>
                            </tr> --}}
                            {{-- @empty --}}
                            <tr>
                                <td colspan="5" class="text-center">{{ __('messages.no_data_found') }}</td>
                            </tr>
                            {{-- @endforelse --}}
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                {{-- <div class="d-flex justify-content-center">
                {{ $invoices->links() }}
            </div> --}}
            </div>
        </div>
    </div>
    <!-- Main Content End -->
@endsection
