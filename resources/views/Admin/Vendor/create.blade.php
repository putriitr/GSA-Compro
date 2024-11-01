@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Vendor</h1>
    <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" class="form-control" name="nama_perusahaan" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" name="no_telepon" required>
        </div>

        <div class="form-group">
            <label for="nama_pic">Nama PIC</label>
            <input type="text" class="form-control" name="nama_pic" required>
        </div>

        <div class="form-group">
            <label for="no_telepon_pic">No Telepon PIC</label>
            <input type="text" class="form-control" name="no_telepon_pic" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="akta">Upload Akta</label>
            <input type="file" class="form-control-file" name="akta">
        </div>

        <div class="form-group">
            <label for="nib">Upload NIB</label>
            <input type="file" class="form-control-file" name="nib">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
