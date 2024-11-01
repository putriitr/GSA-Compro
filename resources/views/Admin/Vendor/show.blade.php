@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Vendor</h1>
    <div class="form-group">
        <label>Nama Perusahaan:</label>
        <p>{{ $vendor->nama_perusahaan }}</p>
    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <p>{{ $vendor->alamat }}</p>
    </div>
    <div class="form-group">
        <label>No Telepon:</label>
        <p>{{ $vendor->no_telepon }}</p>
    </div>
    <div class="form-group">
        <label>Nama PIC:</label>
        <p>{{ $vendor->nama_pic }}</p>
    </div>
    <div class="form-group">
        <label>No Telepon PIC:</label>
        <p>{{ $vendor->no_telepon_pic }}</p>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <p>{{ $vendor->email }}</p>
    </div>
    <div class="form-group">
        <label>Akta:</label>
        @if ($vendor->akta)
            <p><a href="{{ asset('storage/' . $vendor->akta) }}" target="_blank">Lihat File</a></p>
        @else
            <p>Tidak ada file akta.</p>
        @endif
    </div>
    <div class="form-group">
        <label>NIB:</label>
        @if ($vendor->nib)
            <p><a href="{{ asset('storage/' . $vendor->nib) }}" target="_blank">Lihat File</a></p>
        @else
            <p>Tidak ada file NIB.</p>
        @endif
    </div>
    <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
