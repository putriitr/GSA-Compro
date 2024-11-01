@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Vendor</h1>
    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" class="form-control" name="nama_perusahaan" value="{{ $vendor->nama_perusahaan }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $vendor->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" name="no_telepon" value="{{ $vendor->no_telepon }}" required>
        </div>

        <div class="form-group">
            <label for="nama_pic">Nama PIC</label>
            <input type="text" class="form-control" name="nama_pic" value="{{ $vendor->nama_pic }}" required>
        </div>

        <div class="form-group">
            <label for="no_telepon_pic">No Telepon PIC</label>
            <input type="text" class="form-control" name="no_telepon_pic" value="{{ $vendor->no_telepon_pic }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $vendor->email }}" required>
        </div>

        <div class="form-group">
            <label for="akta">Upload Akta</label>
            <input type="file" class="form-control-file" name="akta">
            @if ($vendor->akta)
                <p>File saat ini: <a href="{{ asset('storage/' . $vendor->akta) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>

        <div class="form-group">
            <label for="nib">Upload NIB</label>
            <input type="file" class="form-control-file" name="nib">
            @if ($vendor->nib)
                <p>File saat ini: <a href="{{ asset('storage/' . $vendor->nib) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
