@extends('layouts.Member.master')

@section('content')
  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Pilih Produk & Permintaan Quotation</h3>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('distribution') }}">Portal Distributor</a></li>
            <li class="breadcrumb-item active text-primary">Pilih Produk & Permintaan Quotation</li>
        </ol>
    </div>
</div>
<!-- Header End --><br><br>
<div class="container">
    <h2>Pilih Produk & Permintaan Quotation</h2>
    <p>Di sini Anda dapat memilih produk dan mengajukan permintaan quotation.</p>
    <!-- Tambahkan formulir atau daftar produk di sini sesuai kebutuhan Anda -->
</div>
@endsection