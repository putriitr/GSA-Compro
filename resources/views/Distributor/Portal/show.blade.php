@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0 rounded-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-file-invoice me-2"></i><strong>{{ __('messages.det_quo') }}</strong>
                        </h4>
                    </div>
                    <div class="card-body px-5 py-4">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.nomor_pengajuan') }} :
                                        {{ $quotation->nomor_pengajuan ?? 'Nomor pengajuan tidak tersedia' }}</strong></p>
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.quo_number') }} :
                                        @if ($quotation->status === 'quotation')
                                            {{ $quotation->quotation_number ?? 'Nomor quotation tidak tersedia' }}
                                        @else
                                            <span class="text-muted">Nomor quotation tidak tersedia</span>
                                        @endif
                                    </strong>
                                </p>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.tanggal_pengajuan') }} :
                                        {{ $quotation->created_at->format('d M Y') }}</strong></p>
                                <p><strong><i class="fas fa-info-circle me-2"></i>{{ __('messages.status') }} : <span
                                            class="badge
                                    @if ($quotation->status === 'cancelled') bg-danger
                                    @elseif ($quotation->status === 'quotation') bg-success
                                    @elseif ($quotation->status === 'pending') bg-warning
                                    @else bg-secondary @endif">
                                            {{ ucfirst($quotation->status) }}
                                        </span></strong>
                                </p>
                            </div>
                        </div>
                        <hr>

                        <!-- Menampilkan Daftar Produk dalam Quotation -->
                        <br>
                        <h5 class="mb-0 text-center"><strong>{{ __('messages.product_in_quo') }}</strong></h5><br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="col-1">{{ __('messages.id') }}</th>
                                        <th class="col-3">{{ __('messages.produk_name') }}</th>
                                        <th class="col-2">{{ __('messages.merk') }}</th>
                                        <th class="col-2">{{ __('messages.quantity') }}</th>
                                        <th class="col-2">{{ __('messages.unit_price') }}</th>
                                        <th class="col-2">{{ __('messages.total_price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($quotation->quotationProducts as $index => $product)
                                        <tr class="text-center">
                                            <td class="col-1">{{ $index + 1 }}</td>
                                            <td class="col-3">{{ $product->equipment_name ?? 'Produk tidak tersedia' }}
                                            </td>
                                            <td class="col-2">{{ $product->merk_type ?? 'Tidak tersedia' }}</td>
                                            <td class="col-2">{{ $product->quantity }}</td>
                                            <td class="col-2">{{ number_format($product->unit_price, 2) }}</td>
                                            <td class="col-2">{{ number_format($product->total_price, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                {{ __('messages.no_product_quo') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                        <!-- Menampilkan file PDF jika ada -->
                        <div class="mt-4">
                            <strong>{{ __('messages.dok_pdf') }} : </strong>
                            @if ($quotation->pdf_path)
                                <p class="d-flex align-items-center">
                                    <a href="{{ asset($quotation->pdf_path) }}" target="_blank" class="text-primary">
                                        <i class="fas fa-file-alt me-2"></i>{{ __('messages.dok_pdf') }}
                                    </a>
                                    <a href="{{ asset($quotation->pdf_path) }}" download
                                        class="btn btn-outline-primary btn-sm d-flex align-items-center ms-2">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </p>
                            @else
                                <p class="text-muted">{{ __('messages.no_file') }}</p>
                            @endif
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('distribution.request-quotation') }}" class="btn btn-outline-danger">
                                <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
