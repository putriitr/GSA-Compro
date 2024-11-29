@extends('layouts.Member.master3')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/login/css/login.css') }}">
        <link rel="icon" href="{{ asset('assets/img/logo-gsa2.png') }}" type="image/png">
        <title>Login Here</title>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f4f7fa;
            }

            .login-card {
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .login-card-img {
                border-radius: 15px 0 0 15px;
            }

            .brand-wrapper .logo {
                height: 70px;
                width: auto;
            }

            .login-card-description {
                font-size: 2rem;
                color: #333;
            }

            .form-control {
                border-radius: 10px;
                border: 1px solid #ced4da;
                padding: 12px;
                font-size: 1rem;
            }

            .btn {
                border-radius: 10px;
                background-color: #007bff;
                border: none;
                color: white;
                padding: 10px 20px;
                font-weight: 600;
            }

            .btn:hover {
                background-color: #0056b3;
            }

            .custom-control-input:checked ~ .custom-control-label::before {
                background-color: #007bff;
            }

            .form-prompt-wrapper .text-reset {
                color: #007bff;
            }

            .form-prompt-wrapper .text-reset:hover {
                color: #0056b3;
            }

            .register-distributor a {
                color: #007bff;
                font-weight: 600;
            }

            .register-distributor a:hover {
                color: #0056b3;
            }

            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
                border-radius: 10px;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/login.png') }}" alt="login" class="login-card-img">
                        </div>

                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    <img src="{{ asset('assets/img/logo-gsa2.png') }}" alt="logo" class="logo">
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <h3 class="login-card-description" style="font-weight: bold;">
                                    {{ __('messages.login_desc') }}
                                </h3>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">{{ __('messages.password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="{{ __('messages.password') }}" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-lg text-white w-100 fs-6">
                                        {{ __('messages.masuk') }}
                                    </button>
                                </form>
                                <div class="form-prompt-wrapper d-flex justify-content-between mb-4 mt-3">
                                    <div class="custom-control custom-checkbox login-card-check-box">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="customCheck1">{{ __('messages.remember') }}</label>
                                    </div>
                                    <div class="forgot">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="text-reset">{{ __('messages.forgot') }}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-prompt-wrapper d-flex mb-4 mt-3">
                                    <div class="register-distributor">{{ __('messages.dist_acc') }}
                                        <a href="{{ route('distributors.register') }}">{{ __('messages.create') }}</a>
                                    </div>
                                </div><br>
                                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-chevron-left me-1" style="color: #6196FF;"></i> <i class="fas fa-home me-1" style="color: #ff5733;"></i> {{ __('messages.home') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    </html>
@endsection
