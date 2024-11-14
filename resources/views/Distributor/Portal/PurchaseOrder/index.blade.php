@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.nego') }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.nego') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>Your Purchase Orders</strong></h4>
                </div>

                <!-- PO Table -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <table class="table table-border mb-0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%;">{{ __('messages.id') }}</th>
                                    <th style="width: 30%;">PO Number</th>
                                    <th style="width: 30%;">PO Date</th>
                                    <th style="width: 20%;">{{ __('messages.status') }}</th>
                                    <th style="width: 15%;">{{ __('messages.aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($purchaseOrders as $po)
                                    <tr>
                                        <td>{{ $po->id }}</td>
                                        <td>{{ $po->po_number }}</td>
                                        <td>{{ $po->po_date }}</td>
                                        <td>{{ ucfirst($po->status) }}</td>
                                        <td>
                                            <a href="{{ route('quotations.show', $po->quotation_id) }}"
                                                class="btn btn-info btn-sm">{{ __('messages.view') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">{{ __('messages.blm_quo') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
