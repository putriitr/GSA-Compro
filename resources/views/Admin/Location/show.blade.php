@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h2>Detail Lokasi</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <h5 class="card-title">{{ $location->name }}</h5>
            @if($location->image)
                <div class="mb-3">
                    <img src="{{ asset('assets/img/' . $location->image) }}" alt="{{ $location->name }}" width="200">
                </div>
            @endif
            <p class="card-text"><strong>Lintang :</strong> {{ $location->latitude }}</p>
            <p class="card-text"><strong>Bujur :</strong> {{ $location->longitude }}</p>

            <div class="mt-3">
                <a href="{{ route('admin.location.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.location.destroy', $location->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.location.index') }}" class="btn btn-secondary mt-3">Kembali ke Lokasi</a>
</div>
@endsection
