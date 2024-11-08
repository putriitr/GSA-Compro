@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0" style="display: flex; justify-content: center; align-items: center;">
                            <strong>Detail Permintaan Quotation</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p><strong>Nama Produk :</strong> {{ $quotation->produk->nama ?? 'Produk tidak tersedia' }}</p>
                            <p><strong>Quantity :</strong> {{ $quotation->quantity }}</p>
                            <p><strong>{{ __('messages.status') }} :</strong> {{ ucfirst($quotation->status) }}</p>
                            <p><strong>{{ __('messages.tanggal_pengajuan') }} :</strong> {{ $quotation->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('distribution.request-quotation') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
            </div>
        </div>
    </div>
@endsection
