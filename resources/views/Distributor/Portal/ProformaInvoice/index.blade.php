@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                {{ __('messages.proforma_invoice') }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.proforma_invoice') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.daftar_pi') }}</strong></h4>
                    <a href="{{ route('distribution') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('messages.back') }}
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Cek apakah ada Proforma Invoices -->
                @if ($proformaInvoices->isEmpty())
                    <div class="alert alert-info">
                        <p>{{ __('messages.blm_pi') }}</p>
                        <p>{{ __('messages.buat_po') }}</p>
                        <a href="{{ route('distributor.purchase-orders.index') }}"
                            class="btn btn-primary">{{ __('messages.proforma_invoice') }}</a>
                    </div>
                @else
                    <!-- Tombol untuk mengarahkan ke halaman index invoice -->
                    <div class="mb-3">
                        <a href="{{ route('distributor.invoices.index') }}"
                            class="btn btn-success">{{ __('messages.invoice') }}</a>
                    </div>

                    <!-- Jika ada Proforma Invoices, tampilkan tabelnya -->
                    <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                        <div class="table-responsive card-body p-0" style="overflow-x:auto;">
                            <table class="table table-bordered table-hover mb-0">
                                <thead style="background-color: #4C6B8C;" class="text-white text-center">
                                    <tr>
                                        <th class="text-center"
                                            style="width: 5%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.id') }}</th>
                                        <th class="text-center"
                                            style="width: 10%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.pi_number') }}</th>
                                        <th class="text-center"
                                            style="width: 10%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.pi_date') }}</th>
                                        <th class="text-center"
                                            style="width: 10%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.po_number') }}</th>
                                        <th class="text-center"
                                            style="width: 15%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.quo_number') }}</th>
                                        <th class="text-center"
                                            style="width: 10%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.subtotal') }}</th>
                                        <th class="text-center"
                                            style="width: 15%; border-right: 1px solid #ddd; vertical-align: middle;">
                                            {{ __('messages.aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformaInvoices as $invoice)
                                        <tr>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $invoice->id }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $invoice->pi_number }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                {{ \Carbon\Carbon::parse($invoice->pi_date)->format('d M Y') }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $invoice->purchaseOrder->po_number }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                {{ $invoice->purchaseOrder->quotation->quotation_number ?? 'N/A' }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ number_format($invoice->subtotal, 2) }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                <!-- Button to go to detail page -->
                                                <a href="{{ route('distributor.proforma-invoices.show', $invoice->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> {{ __('messages.proforma_invoice') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
