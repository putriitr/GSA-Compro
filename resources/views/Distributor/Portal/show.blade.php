@extends('layouts.Member.master')

@section('content')
    {{-- <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Detail Permintaan Quotation</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">Detail Permintaan Quotation</li>
            </ol>
        </div>
    </div>
    <!-- Header End --> --}}

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
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p><strong><i class="fas fa-info-circle me-2"></i>{{ __('messages.status') }} : <span
                                            class="badge bg-info text-dark px-3 py-2">{{ ucfirst($quotation->status) }}</span></strong>
                                </p>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.tanggal_pengajuan') }} :
                                        {{ $quotation->created_at->format('d M Y') }}</strong></p>
                            </div>
                        </div>
                        <hr>

                        <!-- Menampilkan Daftar Produk dalam Quotation -->
                        <br>
                        <h5 class="mb-0 text-center"><strong>{{ __('messages.product_in_quo') }}</strong></h5><br>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>{{ __('messages.id') }}</th>
                                    <th>{{ __('messages.produk_name') }}</th>
                                    <th>{{ __('messages.merk') }}</th>
                                    <th>{{ __('messages.quantity') }}</th>
                                    <th>{{ __('messages.unit_price') }}</th>
                                    <th>{{ __('messages.total_price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotation->quotationProducts as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->equipment_name ?? 'Produk tidak tersedia' }}</td>
                                        <td>{{ $product->merk_type ?? 'Tidak tersedia' }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ number_format($product->unit_price, 2) }}</td>
                                        <td>{{ number_format($product->total_price, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">{{ __('messages.no_product_quo') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Menampilkan file PDF jika ada -->
                        <div class="mt-4">
                            <strong>{{ __('messages.dok_pdf') }} : </strong>
                            @if ($quotation->pdf_path)
                                <p>
                                    <a href="{{ asset($quotation->pdf_path) }}" target="_blank" class="text-primary">
                                        <i class="fas fa-file-alt me-2"></i>{{ __('messages.dok_pdf') }}
                                    </a>
                                </p>
                                <p>
                                    <a href="{{ asset($quotation->pdf_path) }}" download class="text-secondary">
                                        <i class="fas fa-download me-2"></i>{{ __('messages.unduh') }}
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
