@extends('layouts.admin.master')

@section('content')
    <div class="container mt-5">
        <h1>Edit Lokasi Pengguna</h1>

        <!-- Menampilkan pesan sukses atau kesalahan -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('userlocations.update', $userLocation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $userLocation->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
                <small>Biarkan kosong jika Anda tidak ingin mengubah gambar.</small>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Garis Lintang</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $userLocation->latitude) }}" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Garis Bujur</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $userLocation->longitude) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
