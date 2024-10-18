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
        <title>Login</title>
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ asset('assets/img/1729165544_page-header.jpg') }}" alt="login"
                                class="login-card-img">
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    <img src="{{ asset('storage/logo-gsa2.png') }}" alt="logo" class="logo"
                                        style="height: 80px; width: 200px;">
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <p class="login-card-description">Silakan Masuk ke Akun Anda</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email Anda" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Kata Sandi</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Kata Sandi" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-lg text-white w-100 fs-6"
                                        style="background: #5bc0de;">Masuk</button>
                                </form>
                                <div class="form-prompt-wrapper d-flex justify-content-between mb-4 mt-3">
                                    <div class="custom-control custom-checkbox login-card-check-box">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                    <div class="forgot">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-reset">Forgot
                                                password?</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
