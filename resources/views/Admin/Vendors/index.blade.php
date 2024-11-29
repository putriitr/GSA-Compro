@extends('layouts.Admin.master')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="card-title">Daftar Vendor</h1>
                    <a href="{{ route('admin.vendors.create') }}" class="btn btn-primary">Tambah Vendor</a>
                </div>

                <div class="card-body">
                    <!-- Form Pencarian -->
                    <form action="{{ route('admin.vendors.index') }}" method="GET" class="mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama atau perusahaan..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search me-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vendors as $vendor)
                                    <tr>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ $vendor->nama_perusahaan }}</td>
                                        <td>{{ $vendor->no_telp }}</td>
                                        <td>{{ $vendor->alamat }}</td>
                                        <td>
                                            <a href="{{ route('admin.vendors.show', $vendor->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $vendors->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
