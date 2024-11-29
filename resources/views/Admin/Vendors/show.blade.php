@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <!-- Session Alerts -->
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
                        <h2>Detail Vendor</h2>
                    </div>
                    <div class="card-body">
                        <!-- Vendor Details -->
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $vendor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $vendor->email }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <td>{{ $vendor->nama_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $vendor->no_telp }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $vendor->alamat }}</td>
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

                        <!-- Back to Vendor List -->
                        <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">Kembali ke Daftar Vendor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Custom CSS for Card Styles -->
@section('styles')
    <style>
        .card {
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
@endsection
