@extends('layouts.admin.master')

@section('content')
    <div class="container mt-5">
        <h2>Daftar Proforma Invoices</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Cek apakah ada Proforma Invoices -->
        @if ($proformaInvoices->isEmpty())
            <div class="alert alert-info">
                <p>Belum ada Proforma Invoice yang tersedia saat ini.</p>
            </div>
        @else
            <!-- Jika ada Proforma Invoices, tampilkan tabelnya -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">ID</th>
                            <th class="col-1 text-center">PI Number</th>
                            <th class="col-1 text-center">PI Date</th>
                            <th class="col-2 text-center">PO Number</th>
                            <th class="col-2 text-center">Distributor</th>
                            <th class="col-2 text-center">Subtotal</th>
                            <th class="col-1 text-center">PPN</th>
                            <th class="col-2 text-center">Grand Total</th>
                            <th class="col-1 text-center">DP</th>
                            <th class="col-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proformaInvoices as $invoice)
                            <tr>
                                <td class="col-1 text-center">{{ $invoice->id }}</td>
                                <td class="col-1 text-center">{{ $invoice->pi_number }}</td>
                                <td class="col-1 text-center">
                                    {{ \Carbon\Carbon::parse($invoice->pi_date)->format('d M Y') }}</td>
                                <td class="col-2 text-center">{{ $invoice->purchaseOrder->po_number }}</td>
                                <td class="col-2 text-center">{{ $invoice->purchaseOrder->user->name }}</td>
                                <td class="col-2 text-end">{{ number_format($invoice->subtotal, 2) }}</td>
                                <td class="col-1 text-end">{{ number_format($invoice->ppn, 2) }}</td>
                                <td class="col-2 text-end">{{ number_format($invoice->grand_total_include_ppn, 2) }}</td>
                                <td class="col-1 text-end">{{ number_format($invoice->dp, 2) }}</td>
                                <td class="col-3">
                                    <div class="d-flex flex-column gap-2 align-items-start">
                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-bold mb-1">File PDF</span>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ asset($invoice->file_path) }}" target="_blank"
                                                    class="btn btn-info btn-sm" title="View PDF">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($invoice->file_path) }}" download
                                                    class="btn btn-secondary btn-sm" title="Download PDF">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Tombol View dan Download Bukti Pembayaran -->
                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-bold">First Payment Proof</span>
                                            @if ($invoice->payment_proof_path)
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ asset($invoice->payment_proof_path) }}" target="_blank"
                                                    class="btn btn-success btn-sm mb-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{ asset($invoice->payment_proof_path) }}" download
                                                    class="btn btn-secondary btn-sm mb-1"><i
                                                        class="fas fa-download"></i></a>
                                            </div>
                                            @else
                                                <span class="text-muted mt-1">Not Available.</span>
                                            @endif
                                        </div>

                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-bold">Final Payment Proof</span>
                                            @if ($invoice->second_payment_proof_path)
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ asset($invoice->second_payment_proof_path) }}" target="_blank"
                                                    class="btn btn-success btn-sm mb-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{ asset($invoice->second_payment_proof_path) }}" download
                                                    class="btn btn-secondary btn-sm mb-1"><i
                                                        class="fas fa-download"></i></a>
                                            </div>
                                            @else
                                                <span class="text-muted mt-1">Not Available.</span>
                                            @endif
                                        </div>

                                        <!-- Tombol Create Invoice, hanya muncul jika status "partially_paid" atau "paid" -->
                                        @if (in_array($invoice->status, ['partially_paid', 'paid']))
                                            <a href="{{ route('invoices.create', $invoice->id) }}"
                                                class="btn btn-primary btn-sm mt-1">Create Invoice</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
