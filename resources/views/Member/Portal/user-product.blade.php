@extends('layouts.Member.master')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb"
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
           url('{{ asset('assets/img/bg-1.jpg') }}');
           background-size: cover;
           background-position: center;
           width: 100%;
           height: 400px;">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.my_product') }}</h3>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal_member') }}</a></li>
            <li class="breadcrumb-item active text-primary">{{ __('messages.my_product') }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Main Content Start -->
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        @forelse($produks as $produk)
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                    <img src="{{ asset($produk->produk->images->first()->gambar ?? 'assets/img/default.jpg') }}" class="card-img-top" alt="{{ $produk->produk->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->produk->nama }}</h5>
                        <small class="text-muted"><strong>{{ __('messages.purchase_date') }} :</strong> {{ $produk->pembelian ?? 'N/A' }}</small>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('user-product.show', $produk->produk->id) }}" class="btn btn-primary rounded-pill">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <p class="mb-0">You don't have any products in your catalog.</p>
                    <p class="mb-0">Member belum memiliki produk yang di-claim oleh admin.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
<!-- Main Content End -->

@endsection
