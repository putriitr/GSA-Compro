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
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.proforma_invoice') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
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
                        <p>Belum ada Proforma Invoice tersedia.</p>
                        <p>Silakan buat Purchase Order (PO) terlebih dahulu untuk memulai proses.</p>
                        <a href="{{ route('distributor.purchase-orders.index') }}" class="btn btn-primary">{{ __('messages.proforma_invoice') }}</a>
                    </div>
                @else
                    <!-- Tombol untuk mengarahkan ke halaman index invoice -->
                    <div class="mb-3">
                        <a href="{{ route('distributor.invoices.index') }}" class="btn btn-success">{{ __('messages.invoice') }}</a>
                    </div>

                    <!-- Jika ada Proforma Invoices, tampilkan tabelnya -->
                    <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                        <div class="table-responsive card-body p-0">
                            <table class="table table-border mb-0">
                                <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                    <tr>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">ID</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">PI Number</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">PI Date</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">PO Number</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">Subtotal</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">PPN</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">Grand Total</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">DP</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">Remaining Payment</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformaInvoices as $invoice)
                                        <tr>
                                            <td class="text-center">{{ $invoice->id }}</td>
                                            <td class="text-center">{{ $invoice->pi_number }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($invoice->pi_date)->format('d M Y') }}</td>
                                            <td class="text-center">{{ $invoice->purchaseOrder->po_number }}</td>
                                            <td class="text-center">{{ number_format($invoice->subtotal, 2) }}</td>
                                            <td class="text-center">{{ number_format($invoice->ppn, 2) }}</td>
                                            <td class="text-center">{{ number_format($invoice->grand_total_include_ppn, 2) }}</td>
                                            <td class="text-center">{{ number_format($invoice->dp, 2) }} ({{ $invoice->dp_percent }}%)</td>
                                            <td class="text-center">{{ number_format($invoice->remaining_payment, 2) }}</td>
                                            <td>
                                                <div class="d-flex flex-column gap-2">
                                                    <!-- Tombol View dan Download PDF Proforma Invoice -->
                                                    <div class="d-inline-flex align-items-center gap-2">
                                                        <span class="fw-normal">File PDF</span>
                                                        <a href="{{ asset($invoice->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ asset($invoice->file_path) }}" download class="btn btn-secondary btn-sm">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>

                                                    <!-- Cek apakah ada bukti pembayaran DP -->
                                                    <div class="d-inline-flex align-items-center gap-2">
                                                        <span class="fw-normal">Down Payment Proof</span>
                                                        @if ($invoice->payment_proof_path)
                                                            <a href="{{ asset($invoice->payment_proof_path) }}" target="_blank" class="btn btn-success btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ asset($invoice->payment_proof_path) }}" download class="btn btn-secondary btn-sm">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        @else
                                                            <form action="{{ route('distributor.proforma-invoices.upload', $invoice->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                                                @csrf
                                                                <input type="file" name="payment_proof" class="form-control mb-2" accept=".pdf,.jpg,.jpeg,.png" required>
                                                                <button type="submit" class="btn btn-warning btn-sm">Upload DP Proof</button>
                                                                <p class="text-muted">DP: Rp{{ number_format($invoice->dp, 2) }} ({{ $invoice->dp_percent }}%)</p>
                                                            </form>
                                                        @endif
                                                    </div>

                                                    <!-- Cek apakah ada bukti pembayaran Remaining Payment -->
                                                    <div class="d-inline-flex align-items-center gap-2">
                                                        <span class="fw-normal">Remaining Payment Proof</span>
                                                        @if ($invoice->second_payment_proof_path)
                                                            <a href="{{ asset($invoice->second_payment_proof_path) }}" target="_blank" class="btn btn-success btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ asset($invoice->second_payment_proof_path) }}" download class="btn btn-secondary btn-sm">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        @else
                                                            <form action="{{ route('distributor.proforma-invoices.upload', $invoice->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                                                @csrf
                                                                <input type="file" name="payment_proof" class="form-control mb-2" accept=".pdf,.jpg,.jpeg,.png" required>
                                                                <button type="submit" class="btn btn-warning btn-sm">Upload Remaining Payment Proof</button>
                                                                <p class="text-muted">Remaining Payment: Rp{{ number_format($invoice->remaining_payment, 2) }}</p>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
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
