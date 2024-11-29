@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h1>Produk</h1>
                        </div>
                        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary mb-3">Tambah Produk Baru</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Search Form -->
                        <form action="{{ route('admin.produk.index') }}" method="GET" class="mb-4">
                            <div class="row align-items-center shadow-sm p-3 rounded"
                                style="background-color: #f9f9f9; border-radius: 15px;">
                                <!-- Search by Keyword -->
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="input-group"
                                        style="border-radius: 10px; overflow: hidden; background-color: #fff; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                                        <span class="input-group-text bg-transparent border-0"
                                            style="color: #6c757d; font-size: 18px; padding: 0 15px;">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control border-0"
                                            placeholder="Cari nama produk ..."
                                            value="{{ request()->input('search') }}"
                                            style="background-color: transparent; font-size: 16px; padding: 10px 15px;">
                                    </div>
                                </div>

                                <!-- Filter by Kategori -->
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <select name="kategori" class="form-select shadow-sm"
                                        style="border-radius: 10px; font-size: 16px; padding: 10px 15px; background-color: #fff; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                                        <option value="">🗂️ Semua Kategori</option>
                                        @foreach ($kategori as $kat)
                                            <option value="{{ $kat->id }}"
                                                {{ request()->input('kategori') == $kat->id ? 'selected' : '' }}>
                                                {{ $kat->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100 shadow-sm" type="submit"
                                        style="border-radius: 10px; font-size: 16px; padding: 10px 0; background-color: #4CAF50; border: none;">
                                        🚀 Filter
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Nama Produk</th>
                                            <th>Merk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produks as $produk)
                                            <tr>
                                                <td class="text-center">{{ $produk->id }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $produk->nama }}</td>
                                                <td class="text-center text-truncate" style="max-width: 100px;">{{ $produk->merk }}</td>
                                                <td class="text-center">{{ $produk->kategori->nama }}</td>
                                                <td>
                                                    @foreach ($produk->images as $image)
                                                        <img src="{{ asset($image->gambar) }}" class="img-fluid w-100"
                                                            alt="{{ $produk->nama }}"
                                                            style="max-width: 250px; height: auto;">
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.produk.show', $produk->id) }}"
                                                        class="btn btn-info btn-sm">Tampilkan</a>
                                                    <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('admin.produk.destroy', $produk->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada produk ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $produks->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
