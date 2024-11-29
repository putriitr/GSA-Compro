@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4 shadow-lg rounded-3 border-0">
                    <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #00796b;">
                        <strong>Detail Proforma Invoice</strong>
                    </h2>

                    <!-- Informasi Proforma Invoice -->
                    <table class="table table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="bg-light text-secondary">PI Number</th>
                                <td>{{ $proformaInvoice->pi_number }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">PI Date</th>
                                <td>{{ \Carbon\Carbon::parse($proformaInvoice->pi_date)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">PO Number</th>
                                <td>{{ $proformaInvoice->purchaseOrder->po_number }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Subtotal</th>
                                <td>Rp{{ number_format($proformaInvoice->subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">PPN</th>
                                <td>Rp{{ number_format($proformaInvoice->ppn, 2) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Grand Total</th>
                                <td><strong>Rp{{ number_format($proformaInvoice->grand_total_include_ppn, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">DP</th>
                                <td>Rp{{ number_format($proformaInvoice->dp, 2) }} ({{ $proformaInvoice->dp_percent }}%)</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Installments</th>
                                <td>{{ $proformaInvoice->installments }} kali pembayaran</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Next Payment Amount</th>
                                <td>
                                    @if ($proformaInvoice->next_payment_amount)
                                        {{ number_format($proformaInvoice->next_payment_amount, 2) }} IDR
                                        ({{ number_format(($proformaInvoice->next_payment_amount / $proformaInvoice->purchaseOrder->quotation->subtotal_price) * 100, 2) }}%)
                                    @else
                                        <span class="text-muted">Belum ada pembayaran berikutnya</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Payments Completed</th>
                                <td>{{ $proformaInvoice->payments_completed }} dari {{ $proformaInvoice->installments }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Status</th>
                                <td>
                                    <span class="badge {{ $proformaInvoice->status === 'unpaid' ? 'bg-danger' : ($proformaInvoice->status === 'partially_paid' ? 'bg-warning' : 'bg-success') }}">
                                        {{ ucfirst($proformaInvoice->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light text-secondary">Remarks</th>
                                <td>{{ $proformaInvoice->remarks ?? 'Belum ada catatan dari admin.' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row mt-4">
                        <!-- Dokumen PDF -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm p-3 border-0">
                                <h5 class="card-title text-secondary">Dokumen Proforma Invoice</h5>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset($proformaInvoice->file_path) }}" target="_blank" class="btn btn-info btn-sm rounded-pill">
                                        <i class="fas fa-file-pdf"></i> Lihat PDF
                                    </a>
                                    <a href="{{ asset($proformaInvoice->file_path) }}" download class="btn btn-secondary btn-sm rounded-pill">
                                        <i class="fas fa-download"></i> Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Upload Bukti Pembayaran -->
                        <div class="col-md-6">
                            <div class="card shadow-sm p-3 border-0">
                                <h5 class="card-title text-secondary">Upload Bukti Pembayaran</h5>
                                @if ($proformaInvoice->status !== 'paid' && $proformaInvoice->payments_completed < $proformaInvoice->installments)
                                    <form action="{{ route('distributor.proforma-invoices.upload', $proformaInvoice->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="payment_proof" class="form-control mb-2" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <button type="submit" class="btn btn-success btn-sm rounded-pill">
                                            <i class="fas fa-upload"></i> Upload Pembayaran ke-{{ $proformaInvoice->payments_completed + 1 }}
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">Semua pembayaran selesai atau menunggu persetujuan admin.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
    </div>
@endsection
