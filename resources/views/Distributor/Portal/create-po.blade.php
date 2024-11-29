@extends('layouts.Member.master')

@section('content')
  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb"
  style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.po') }}</h3>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a></li>
            <li class="breadcrumb-item active text-primary">{{ __('messages.po') }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Content Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2><strong>{{ __('messages.req_po') }}</strong></h2>
            <p>{{ __('messages.pilih_po') }}</p>
            <br>

            <div class="card shadow-sm border-0 rounded">
                <div class="card-body p-0">
                    <table class="table table-borderless mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th style="width: 5%;">{{ __('messages.id') }}</th>
                                <th style="width: 15%;">{{ __('messages.jenis_layanan') }}</th>
                                <th style="width: 20%;">{{ __('messages.keterangan_pengajuan') }}</th>
                                <th style="width: 15%;">{{ __('messages.tanggal_pengajuan') }}</th>
                                <th style="width: 10%;">{{ __('messages.status') }}</th>
                                <th style="width: 15%;">{{ __('messages.tanggal_tindakan') }}</th>
                                <th style="width: 20%;">{{ __('messages.aksi') }}</th>
                            </tr>

                        </thead>
                    </table><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
