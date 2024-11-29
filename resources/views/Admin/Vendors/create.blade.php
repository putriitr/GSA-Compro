@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Buat Akun Vendor</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.vendors.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Nama Vendor :</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="no_telp" class="form-label">Nomor Telepon :</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                                            value="{{ old('no_telp') }}">
                                        @if ($errors->has('no_telp'))
                                            <small class="text-danger">{{ $errors->first('no_telp') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="alamat" class="form-label">Alamat :</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="{{ old('alamat') }}">
                                        @if ($errors->has('alamat'))
                                            <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan :</label>
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                    value="{{ old('nama_perusahaan') }}">
                                @if ($errors->has('nama_perusahaan'))
                                    <small class="text-danger">{{ $errors->first('nama_perusahaan') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="loa">Letter of Acceptance (LoA)</label>
                                <input type="file" class="form-control" id="loa" name="loa"
                                    accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="product_list">Product List (Excel)</label>
                                <input type="file" class="form-control" id="product_list" name="product_list"
                                    accept=".xlsx, .xls" required>
                            </div><br>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
