@extends('layouts.admin.master')

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
                    <a href="{{ route('vendors.create') }}" class="btn btn-primary">Tambah Vendor</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $vendor)
                                    <tr>
                                        <td>{{ $vendor->nama_perusahaan }}</td>
                                        <td>{{ $vendor->alamat }}</td>
                                        <td>{{ $vendor->no_telepon }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>
                                            <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $vendors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
