@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/page-header.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.monitoring') }}</h3>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal_member') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.monitoring') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container mt-5">
        @if ($userProduks->isEmpty())
        <div class="col-12">
            <div class="alert alert-info text-center">
                <p class="mb-0">You don't have any products for monitoring.</p>
                <p class="mb-0">Member belum memiliki produk untuk dimonitor.</p>
            </div>
        </div>
        @else
            <div class="row">
                @foreach ($userProduks as $userProduk)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset($userProduk->produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                class="card-img-top img-fluid" alt="{{ $userProduk->produk->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $userProduk->produk->nama }}</h5>
                                <p class="card-text">{{ Str::limit($userProduk->produk->deskripsi, 100) }}</p>

                                <!-- Display Monitoring Info -->
                                @if ($userProduk->monitoring)
                                    <h6>Monitoring</h6>
                                    <p>Status Barang: {{ $userProduk->monitoring->status_barang }}</p>
                                    <p>Kondisi Terakhir: {{ $userProduk->monitoring->kondisi_terakhir_produk }}</p>
                                @else
                                    <p>No monitoring data available.</p>
                                @endif
                                <a href="{{ route('portal.monitoring.detail', $userProduk->id) }}"
                                    class="btn btn-primary mt-2">Detail Produk</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Services End -->
@endsection
