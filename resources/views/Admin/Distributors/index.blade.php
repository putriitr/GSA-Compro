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
                    <h1 class="card-title">Daftar Distributor</h1>
                    <a href="{{ route('distributors.create') }}" class="btn btn-primary">Tambah Distributor</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distributors as $distributor)
                                    <tr>
                                        <td>{{ $distributor->nama_perusahaan }}</td>
                                        <td>{{ $distributor->email }}</td>
                                        <td>{{ $distributor->no_telepon }}</td>
                                        <td>
                                            <a href="{{ route('distributors.show', $distributor->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('distributors.edit', $distributor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this distributor?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $distributors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
