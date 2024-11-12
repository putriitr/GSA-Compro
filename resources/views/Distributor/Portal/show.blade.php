@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Detail Permintaan Quotation</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">Distributor Portal</a></li>
                <li class="breadcrumb-item active text-primary">Detail Permintaan Quotation</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

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
                                <p><strong><i class="fas fa-box-open me-2"></i>{{ __('messages.produk_name') }} :</strong>
                                </p>
                                <p>{{ $quotation->produk->nama ?? 'Produk tidak tersedia' }}</p>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p><strong><i class="fas fa-cubes me-2"></i>{{ __('messages.quantity') }} :
                                        {{ $quotation->quantity }}</strong></p>
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.tanggal_pengajuan') }} :
                                        {{ $quotation->created_at->format('d M Y') }}</strong></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><strong><i class="fas fa-info-circle me-2"></i>{{ __('messages.status') }} : <span
                                            class="badge bg-info text-dark px-3 py-2">{{ ucfirst($quotation->status) }}</span></strong>
                                </p>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('distribution.request-quotation') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
