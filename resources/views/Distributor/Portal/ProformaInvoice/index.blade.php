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
            <div class="col-lg-12">
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
                        <a href="{{ route('distributor.purchase-orders.index') }}" class="btn btn-primary">{{ __('messages.proforma_invoice') }}</a>
                    </div>
                @else
                    <!-- Tombol untuk mengarahkan ke halaman index invoice -->
                    <div class="mb-3">
                        <a href="{{ route('distributor.invoices.index') }}" class="btn btn-success">{{ __('messages.invoice') }}</a>
                    </div>

                    <!-- Jika ada Proforma Invoices, tampilkan tabelnya -->
                    <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                        <div class="table-responsive card-body p-0" style="overflow-x:auto;">
                            <table class="table table-bordered table-hover mb-0">
                                <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                    <tr>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.id') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.pi_number') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.pi_date') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.po_number') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.subtotal') }}</th>
                                        <th class="text-center" style="width: 5%; border-right: 1px solid #dee2e6; vertical-align: middle;">PPN</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.grand_total') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.down_payment') }}</th>
                                        <th class="text-center" style="width: 10%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.remaining_payment') }}</th>
                                        <th class="text-center" style="width: 20%; border-right: 1px solid #dee2e6; vertical-align: middle;">{{ __('messages.aksi') }}</th>
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
                                                        <span class="fw-bold">File PDF : </span>
                                                        <a href="{{ asset($invoice->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                            <span>{{ __('messages.view') }}</span>
                                                        </a>
                                                        <a href="{{ asset($invoice->file_path) }}" download class="btn btn-success btn-sm">
                                                            <i class="fas fa-download"></i>
                                                            <span>{{ __('messages.unduh1') }}</span>
                                                        </a>
                                                    </div>

                                                    <!-- Cek apakah ada bukti pembayaran DP -->
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <span class="fw-bold">{{ __('messages.down_payment_proof') }} : </span>
                                                            @if ($invoice->payment_proof_path)
                                                                <a href="{{ asset($invoice->payment_proof_path) }}" target="_blank" class="btn btn-info btn-sm d-flex align-items-center gap-1">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span>{{ __('messages.view') }}</span>
                                                                </a>
                                                                <a href="{{ asset($invoice->payment_proof_path) }}" download class="btn btn-success btn-sm d-flex align-items-center gap-1">
                                                                    <i class="fas fa-download"></i>
                                                                    <span>{{ __('messages.unduh1') }}</span>
                                                                </a>
                                                            @else
                                                                <form action="{{ route('distributor.proforma-invoices.upload', $invoice->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2 mt-2">
                                                                    @csrf
                                                                    <input type="file" name="payment_proof" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" required>
                                                                    <button type="submit" class="btn btn-warning btn-sm">{{ __('messages.upload_dp_proof') }}</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        @if (!$invoice->payment_proof_path)
                                                            <p class="text-muted mb-0" style="font-size: 0.9rem;"><strong>{{ __('messages.down_payment') }} : Rp{{ number_format($invoice->dp, 2) }} ({{ $invoice->dp_percent }}%)</strong></p>
                                                        @endif
                                                    </div>


                                                    <!-- Cek apakah ada bukti pembayaran Remaining Payment -->
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <span class="fw-bold">{{ __('messages.remaining_payment_proof') }} : </span>

                                                            @if ($invoice->second_payment_proof_path)
                                                                <a href="{{ asset($invoice->second_payment_proof_path) }}" target="_blank" class="btn btn-info btn-sm d-flex align-items-center gap-1">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span>{{ __('messages.view') }}</span>
                                                                </a>
                                                                <a href="{{ asset($invoice->second_payment_proof_path) }}" download class="btn btn-success btn-sm d-flex align-items-center gap-1">
                                                                    <i class="fas fa-download"></i>
                                                                    <span>{{ __('messages.unduh1') }}</span>
                                                                </a>
                                                            @else
                                                                <form action="{{ route('distributor.proforma-invoices.upload', $invoice->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2 mt-2">
                                                                    @csrf
                                                                    <input type="file" name="payment_proof" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" required>
                                                                    <button type="submit" class="btn btn-warning btn-sm">{{ __('messages.upload_rp_proof') }}</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        @if (!$invoice->second_payment_proof_path)
                                                            <p class="text-muted mb-0" style="font-size: 0.9rem;"><strong>{{ __('messages.remaining_payment') }} : Rp{{ number_format($invoice->remaining_payment, 2) }}</strong></p>
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
