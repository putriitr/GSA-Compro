@extends('layouts.Admin.master')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: rgb(60, 60, 179);"><strong>Daftar Permintaan Quotation</strong></h2>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Quotation Table -->
        <div class="card shadow-lg border-0 rounded">
            <div class="table-responsive card-body p-0">
                <table class="table table-hover mb-0">
                    <thead style="background: linear-gradient(135deg, #00796b, #004d40); color: #fff;">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Pengajuan</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Distributor</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #f9f9f9;">
                        @forelse($quotations as $key => $quotation)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $quotation->nomor_pengajuan ?? 'Nomor tidak tersedia' }}</td>
                                <td>
                                    @foreach ($quotation->quotationProducts as $product)
                                        <div>- {{ $product->equipment_name ?? 'Produk tidak tersedia' }}</div>
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $quotation->user->name ?? 'Tidak ada pengguna' }}</td>
                                <td>
                                    @foreach ($quotation->quotationProducts as $product)
                                        <div class="text-center">{{ $product->quantity }}</div>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <span class="badge
                                        @if ($quotation->status === 'cancelled') bg-danger
                                        @elseif($quotation->status === 'quotation') bg-success
                                        @else bg-warning
                                        @endif">
                                        {{ ucfirst($quotation->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.quotations.show', $quotation->id) }}" class="btn btn-primary btn-sm rounded-pill shadow-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        @if ($quotation->status !== 'cancelled')
                                            <a href="{{ route('admin.quotations.edit', $quotation->id) }}" class="btn btn-secondary btn-sm rounded-pill shadow-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada permintaan quotation.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
