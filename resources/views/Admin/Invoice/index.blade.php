@extends('layouts.Admin.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-3">
        <div class="card-body">
            <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #00796b; font-weight: bold;">Daftar Invoices</h2>

            <!-- Flash Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Search Form -->
            <form action="{{ route('invoices.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nomor invoice, status, atau total..."
                           value="{{ request()->input('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            <!-- Tabel Invoice -->
            <div class="table-responsive">
                <table class="table table-hover shadow-sm rounded">
                    <thead class="bg-gradient-custom text-white">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Invoice Number</th>
                            <th class="text-center">Invoice Date</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">PPN</th>
                            <th class="text-center">Grand Total</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="custom-table-body">
                        @forelse ($invoices as $invoice)
                            <tr class="table-row">
                                <td class="text-center">{{ $invoice->id }}</td>
                                <td class="text-center">{{ $invoice->invoice_number }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</td>
                                <td class="text-center">Rp{{ number_format($invoice->subtotal, 2) }}</td>
                                <td class="text-center">Rp{{ number_format($invoice->ppn, 2) }}</td>
                                <td class="text-center">Rp{{ number_format($invoice->grand_total_include_ppn, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge
                                        @if ($invoice->status === 'paid') bg-success
                                        @elseif ($invoice->status === 'unpaid') bg-warning
                                        @else bg-danger
                                        @endif">
                                        {{ ucfirst($invoice->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ asset($invoice->file_path) }}" target="_blank" class="btn btn-info btn-sm rounded-pill shadow-sm animate__animated animate__fadeIn">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                        <a href="{{ asset($invoice->file_path) }}" download class="btn btn-secondary btn-sm rounded-pill shadow-sm animate__animated animate__fadeIn">
                                            <i class="fas fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    @if(request()->has('search'))
                                        Data tidak ditemukan.
                                    @else
                                        Belum ada Invoice.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $invoices->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <style>
        .bg-gradient-custom {
            background: linear-gradient(135deg, #00796b, #004d40);
        }

        .custom-table-body tr {
            transition: all 0.3s ease;
        }

        .custom-table-body tr:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #f1f1f1;
        }

        .badge {
            padding: 8px 15px;
            font-size: 0.9rem;
            text-transform: capitalize;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table th {
            border-bottom: 2px solid #00796b;
        }

        .animate__fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

    </style>
@endsection
