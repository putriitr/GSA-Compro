@extends('layouts.Member.master')

@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.pro_quo') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.pro_quo') }}</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.pilih_quo') }}</strong></h4>
                    <div class="d-flex">
                        <a href="{{ url('/en/products') }}" class="btn btn-success me-2">
                            <i class="fas fa-plus-circle me-2"></i>{{ __('messages.create_quo') }}
                        </a>
                        <a href="{{ route('quotations.cart') }}" class="btn btn-warning">
                            <i class="fas fa-shopping-cart me-2"></i>{{ __('messages.cart') }}
                        </a>
                    </div>
                </div>
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('distribution.request-quotation') }}" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <input type="text" name="search" class="form-control"
                                placeholder="Cari Nomor Pengajuan atau Status" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-2"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Quotation Requests Table -->
                <br>
                <div class="border-0" style="border-radius: 8px; overflow: hidden;">
                    <div class="card-body p-0">
                        <h4><strong>{{ __('messages.daftar_quo') }}</strong></h4>
                        <div style="border-radius: 8px; overflow: hidden;">
                            <table class="table table-border mb-0" style="border-collapse: collapse;">
                                <thead style="background-color: #4C6B8C;" class="text-white text-center">
                                    <tr>
                                        <th style="width: 5%; border-right: 1px solid #ddd;">{{ __('messages.id') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #ddd;">
                                            {{ __('messages.nomor_pengajuan') }}</th>
                                        <th style="width: 15%; border-right: 1px solid #ddd;">
                                            {{ __('messages.date') }}</th>
                                        <th style="width: 30%; border-right: 1px solid #ddd;">
                                            {{ __('messages.topik') }}</th>
                                        <th style="width: 10%; border-right: 1px solid #ddd;">
                                            {{ __('messages.status') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #ddd;">{{ __('messages.aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($quotations as $key => $quotation)
                                        <tr class="text-center">
                                            <td style="border: 1px solid #ddd;">{{ $key + 1 }}</td>
                                            <td style="border: 1px solid #ddd;">{{ $quotation->nomor_pengajuan ?? 'Nomor pengajuan tidak tersedia' }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                {{ $quotation->created_at->format('d M Y') ?? 'Tanggal tidak tersedia' }}
                                            </td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $quotation->topik ?? 'Topik tidak tersedia' }}</td>
                                            <td style="border: 1px solid #ddd;">
                                                <span
                                                    class="badge
                                                    @if ($quotation->status === 'cancelled') bg-danger
                                                    @elseif ($quotation->status === 'quotation') bg-success
                                                    @else bg-warning @endif">
                                                    {{ ucfirst($quotation->status) }}
                                                </span>
                                            </td>

                                            <!-- Actions -->
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                <a href="{{ route('quotations.show', $quotation->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fas fa-eye"></i> {{ __('messages.view') }}
                                                </a>
                                                <!-- Tombol Download PDF -->
                                                @if ($quotation->pdf_path)
                                                    <a href="{{ asset($quotation->pdf_path) }}" download
                                                        class="btn btn-warning btn-sm rounded-pill">
                                                        <i class="fas fa-download me-2"></i>{{ __('messages.unduh1') }}
                                                    </a>
                                                @endif

                                                @if ($quotation->status === 'pending')
                                                    <form action="{{ route('quotations.cancel', $quotation->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan permintaan quotation ini?');">
                                                            {{ __('messages.batal') }}
                                                        </button>
                                                    </form>
                                                @elseif ($quotation->status === 'quotation' && !$quotation->purchaseOrder)
                                                    <!-- Tampilkan tombol Nego hanya jika status negosiasi bukan 'accepted' -->
                                                    @if (!$quotation->negotiation || $quotation->negotiation->status !== 'accepted')
                                                        <a href="{{ route('distributor.quotations.negotiations.create', $quotation->id) }}"
                                                            class="btn btn-warning btn-sm rounded-pill">
                                                            <i class="fas fa-handshake"></i> Nego
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('quotations.create_po', $quotation->id) }}"
                                                        class="btn btn-success btn-sm rounded-pill">
                                                        <i class="fas fa-file-invoice-dollar"></i> PO
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">{{ __('messages.blm_quo') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class="mt-4 d-flex justify-content-center">
                                {{ $quotations->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('distribution') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
