@extends('layouts.admin.master')

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

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Vendor :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="company_name" class="form-label">Nama Perusahaan :</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
                            @if ($errors->has('company_name'))
                                <small class="text-danger">{{ $errors->first('company_name') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="bidang_perusahaan" class="form-label">Sektor Perusahaan :</label>
                            <select name="bidang_perusahaan" id="bidang_perusahaan" class="form-control" required>
                                <option value="" disabled selected>Pilih Sektor Perusahaan</option>
                                @foreach($bidangPerusahaan as $bidang)
                                    <option value="{{ $bidang->id }}" {{ old('bidang_perusahaan') == $bidang->id ? 'selected' : '' }}>
                                        {{ $bidang->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('bidang_perusahaan'))
                                <small class="text-danger">{{ $errors->first('bidang_perusahaan') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Nomor Telepon :</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Alamat :</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            @if ($errors->has('address'))
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="location_id" class="form-label">Lokasi :</label>
                            <select name="location_id" id="location_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Lokasi</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('location_id'))
                                <small class="text-danger">{{ $errors->first('location_id') }}</small>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
