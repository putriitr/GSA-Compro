@extends('layouts.admin.master')

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Distributor</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $distributor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $distributor->email }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <td>{{ $distributor->nama_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th>Sektor Perusahaan</th>
                                    <td>{{ $distributor->bidangPerusahaan->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $distributor->no_telp }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $distributor->alamat }}</td>
                                </tr>
                                @if (isset($password))
                                    <tr>
                                        <th>Password</th>
                                        <td>
                                            {{ $password }}
                                            <p class="text-danger">Mohon agar password dicatat karena password hanya
                                                ditampilkan sekali.</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <div class="card p-4 shadow">
                                <div class="card-header">
                                    <h4>Daftar Produk</h4>
                                </div>
                                <div class="card-body">
                                    @if ($distributor->userProduk && $distributor->userProduk->isNotEmpty())
                                        <div class="row">
                                            @foreach ($distributor->userProduk as $userProduk)
                                                @php
                                                    $firstImage = $userProduk->produk->images->first();
                                                    $imageSrc = $firstImage
                                                        ? $firstImage->gambar
                                                        : 'assets/img/default.jpg';
                                                @endphp
                                                <div class="col-md-3 mb-3">
                                                    <div class="card">
                                                        <img src="{{ asset($imageSrc) }}" class="card-img-top"
                                                            alt="{{ $userProduk->produk->nama }}"
                                                            style="height: 200px; object-fit: cover; width:100%;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $userProduk->produk->nama }}</h5>
                                                            <p class="card-text"><strong>Tanggal Pembelian :</strong>
                                                                {{ $userProduk->pembelian ? $userProduk->pembelian : 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>Distributor ini tidak memiliki produk.</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <style>
                            <style>.card {
                                height: 100%;
                                display: flex;
                                flex-direction: column;
                            }

                            .card-img-top {
                                height: 200px;
                                /* Fixed height for the images */
                                object-fit: cover;
                                /* Ensures the image covers the area */
                            }

                            .card-body {
                                flex-grow: 1;
                                /* Makes sure card body grows to take remaining space */
                                display: flex;
                                flex-direction: column;
                                justify-content: flex-end;
                                /* Ensures consistent vertical alignment */
                            }

                            .card-title {
                                font-size: 1rem;
                                /* Ensures the title text is consistent */
                                margin-bottom: 0.5rem;
                            }
                        </style>

                        </style>

                        <a href="{{ route('distributors.index') }}" class="btn btn-secondary">Kembali ke Daftar
                            Distributor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
