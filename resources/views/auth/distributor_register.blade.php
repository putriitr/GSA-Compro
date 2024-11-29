@extends('layouts.member.master3')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/login/css/login.css') }}">
        <link rel="icon" href="{{ asset('assets/img/logo-gsa2.png') }}" type="image/png">
        <title>Register First</title>
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card w-100">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-8">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-body w-100">
                                <p class="login-card-description">{{ __('messages.register_desc') }}</p>

                                <!-- Form Register -->
                                <form action="{{ route('distributors.register') }}" method="POST" class="w-100"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Name & Email Field -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Name" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password Field -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="form-label">{{ __('messages.password') }}</label>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Enter Password" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="password_confirmation"
                                                    class="form-label">{{ __('messages.password1') }}</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control"
                                                    placeholder="Enter Password Again" required>
                                                @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone Number & Address Field -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_telp" class="form-label">{{ __('messages.phone') }}</label>
                                                <input type="text" id="no_telp" name="no_telp" class="form-control"
                                                    placeholder="Phone Number" required>
                                                @error('no_telp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="alamat"
                                                    class="form-label">{{ __('messages.address') }}</label>
                                                <input type="text" id="alamat" name="alamat" class="form-control"
                                                    placeholder="Address" required></input>
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Company Name Field -->
                                    <div class="form-group mb-3">
                                        <label for="nama_perusahaan"
                                            class="form-label">{{ __('messages.company_name1') }}</label>
                                        <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                                            class="form-control" placeholder="Company" required>
                                        @error('nama_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- PIC Field -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pic"
                                                    class="form-label">{{ __('messages.pic_name') }}</label>
                                                <input type="text" id="pic" name="pic" class="form-control"
                                                    placeholder="Name" required>
                                                @error('pic')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nomor_telp_pic"
                                                    class="form-label">{{ __('messages.pic_phone') }}</label>
                                                <input type="text" id="nomor_telp_pic" name="nomor_telp_pic"
                                                    class="form-control" placeholder="Phone Number" required>
                                                @error('nomor_telp_pic')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Akta Document Upload Field -->
                                    <div class="form-group mb-3">
                                        <label for="akta" class="form-label">{{ __('messages.upload_doc1') }}</label>
                                        <input type="file" id="akta" name="akta"
                                            style="display: block; width: 100%; padding: 10px; font-size: 14px;
                  border: 1px solid #ccc; border-radius: 5px; background-color: #d5dae2;
                  cursor: pointer;"
                                            required>
                                        @error('akta')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- NIB Document Upload Field -->
                                    <div class="form-group mb-3">
                                        <label for="nib" class="form-label">{{ __('messages.upload_doc2') }}</label>
                                        <input type="file" id="nib" name="nib"
                                            style="display: block; width: 100%; padding: 10px; font-size: 14px;
                  border: 1px solid #ccc; border-radius: 5px; background-color: #d5dae2;
                  cursor: pointer;"
                                            required>
                                        @error('nib')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-lg text-white w-100 fs-6"
                                        style="background: #5bc0de;">
                                        {{ __('messages.daftar') }}
                                    </button>
                                </form><br>

                                <div class="form-prompt-wrapper d-flex justify-content-center mb-4 mt-3">
                                    <div class="register-distributor">{{ __('messages.login_acc') }}
                                        <a href="{{ route('login') }}" class="" style="color: #5bc0de;">
                                            {{ __('messages.login_here') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img src="{{ asset('assets/img/page-header.jpg') }}" alt="login" class="login-card-img">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>

        <style>
            .login-card form {
                max-width: none !important;
            }

            .form-control {
                border: 1px solid white;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
