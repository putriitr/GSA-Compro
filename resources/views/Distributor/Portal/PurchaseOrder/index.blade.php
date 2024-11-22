@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.po') }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.po') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.daftar_po') }}</strong></h4>
                    <a href="{{ route('distribution') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('messages.back') }}
                    </a>
                </div>

                @if ($purchaseOrders->isEmpty())
                    <!-- Tampilkan pesan jika tidak ada Purchase Orders -->
                    <div class="alert alert-info">
                        <p>Anda belum memiliki Purchase Order. Silakan lihat Quotation Anda dan ajukan quotation untuk
                            memulai
                            proses.</p>
                        <a href="{{ route('distribution.request-quotation') }}" class="btn btn-primary">{{ __('messages.your_quotation') }}</a>
                    </div>
                @else
                    <div class="mb-3">
                        <a href="{{ route('distribution.request-quotation') }}" class="btn btn-primary">{{ __('messages.your_quotation') }}</a>
                    </div>

                    <!-- PO Table -->
                    <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                        <div class="card-body p-0">
                            <div style="border-radius: 8px; overflow: hidden;">
                                <table class="table table-border mb-0">
                                    <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                        <tr>
                                            <th style="width: 5%; border-right: 1px solid #dee2e6;">{{ __('messages.id') }}
                                            </th>
                                            <th style="width: 20%; border-right: 1px solid #dee2e6;">{{ __('messages.po_number') }}</th>
                                            <th style="width: 20%; border-right: 1px solid #dee2e6;">{{ __('messages.po_date') }}</th>
                                            <th style="width: 15%; border-right: 1px solid #dee2e6;">
                                                {{ __('messages.status') }}</th>
                                            <th style="width: 40%; border-right: 1px solid #dee2e6;">
                                                {{ __('messages.aksi') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseOrders as $po)
                                            <tr class="text-center">
                                                <td>{{ $po->id }}</td>
                                                <td>{{ $po->po_number }}</td>
                                                <td>{{ $po->po_date }}</td>
                                                <td>{{ ucfirst($po->status) }}</td>
                                                <td>
                                                    <a href="{{ route('quotations.show', $po->quotation_id) }}"
                                                        class="btn btn-info btn-sm">{{ __('messages.quotation') }}</a>
                                                    <!-- Kondisi berdasarkan status dan keberadaan Proforma Invoice -->
                                                    @if ($po->status === 'pending')
                                                        <br><span class="text-muted small">PO masih dalam peninjauan</span>
                                                    @elseif ($po->status === 'approved')
                                                        @if ($po->proformaInvoice)
                                                            <a href="{{ route('distributor.proforma-invoices.index', $po->proformaInvoice->id) }}"
                                                                class="btn btn-success btn-sm">{{ __('messages.proforma_invoice') }}</a>
                                                        @else
                                                            <span class="text-muted">Proforma Invoice akan segera
                                                                dikirim</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
