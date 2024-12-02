@extends('layouts.member.master3')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>{{ __('messages.register_desc') }}</title>
        <link rel="icon" href="{{ asset('assets/img/logo-gsa2.png') }}" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet"
            href="{{ asset('assets/regis/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">

        <!-- STYLE CSS -->
        <link rel="stylesheet" href="{{ asset('assets/regis/css/style.css') }}">
    </head>

    <body>
        <div class="wrapper">
            <div class="inner">
                <div class="image-holder">
                    <img src="{{ asset('assets/img/register.jpg') }}" alt="" style="height: 100%;">
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('distributors.register') }}" method="POST" enctype="multipart/form-data">
                    <h3>{{ __('messages.register_desc') }}</h3>
                    @csrf
                    <!-- Name & Email Field -->
                    <div class="form-row">
                        <input type="text" class="form-control" name="name" placeholder="{{ __('messages.name') }}"
                            required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-row">
                        <input type="password" class="form-control" name="password"
                            placeholder="{{ __('messages.password') }}" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="{{ __('messages.password1') }}" required>
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone Number & Address Field -->
                    <div class="form-row">
                        <input type="text" class="form-control" name="no_telp" placeholder="{{ __('messages.phone') }}"
                            required>
                        @error('no_telp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="text" class="form-control" name="alamat"
                            placeholder="{{ __('messages.address') }}" required>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Company Field -->
                    <div class="form-row">
                        <input type="text" class="form-control w-100" name="nama_perusahaan"
                            placeholder="{{ __('messages.company_name1') }}" required>
                        @error('nama_perusahaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- PIC Field -->
                    <div class="form-row">
                        <input type="text" class="form-control" name="pic"
                            placeholder="{{ __('messages.pic_name') }}" required>
                        @error('pic')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="text" class="form-control" name="nomor_telp_pic"
                            placeholder="{{ __('messages.pic_phone') }}" required>
                        @error('nomor_telp_pic')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Akta Document Upload Field -->
                    <div class="form-row">
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
                    <div class="form-row">
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


                    <button type="submit" class="w-100 fs-6">{{ __('messages.daftar') }}
                        <i class="zmdi zmdi-long-arrow-right"></i>
                    </button>

                    <div class="form-row align-items-center justify-content-between mb-4 mt-3">
                        <!-- Login Prompt -->
                        <div class="form-prompt-wrapper">
                            <div class="register-distributor">
                                {{ __('messages.login_acc') }}
                                <a href="{{ route('login') }}" class="" style="color: #5bc0de; font-weight: bold;">
                                    {{ __('messages.login_here') }}
                                </a>
                            </div>
                        </div>

                        <!-- Home Button -->
                        <div class="form-prompt-wrapper">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-chevron-left me-1" style="color: #6196FF;"></i>
                                <i class="fas fa-home me-1" style="color: #ff5733;"></i>
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <script src="{{ asset('assets/regis/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/regis/js/main.js') }}"></script>
    </body>

    </html>
@endsection
