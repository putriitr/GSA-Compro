@extends('layouts.admin.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="h4">Lokasi Pengguna</h1>
                <a href="{{ route('userlocations.create') }}" class="btn btn-primary">Tambah Lokasi Pengguna</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Garis Lintang</th>
                                <th>Garis Bujur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userLocations as $userLocation)
                                <tr>
                                    <td>{{ $userLocation->name }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/' . $userLocation->image) }}" alt="{{ $userLocation->name }}" width="50">
                                    </td>
                                    <td>{{ $userLocation->latitude }}</td>
                                    <td>{{ $userLocation->longitude }}</td>
                                    <td>
                                        <a href="{{ route('userlocations.edit', $userLocation) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('userlocations.destroy', $userLocation->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus lokasi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data lokasi pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
