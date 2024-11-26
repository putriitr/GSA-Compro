@extends('layouts.member.master')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- User Profile Card -->
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0" style="font-weight: bold;">Profil Pengguna</h2>
                    </div>
                    <div class="card-body p-4">
                        <!-- Personal Info -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-user"></i> {{ __('messages.name') }} :
                                </label>
                                <p class="text-muted">{{ $user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-envelope"></i> Email :
                                </label>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                        </div>

                        <!-- Company Info -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-building-house"></i> {{ __('messages.nama_perusahaan') }} :
                                </label>
                                <p class="text-muted">{{ $user->nama_perusahaan ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-briefcase"></i> {{ __('messages.bidang_perusahaan') }} :
                                </label>
                                <p class="text-muted">{{ $user->bidangPerusahaan->name ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-phone"></i> {{ __('messages.phone') }} :
                                </label>
                                <p class="text-muted">{{ $user->no_telp ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bx bx-map"></i> {{ __('messages.address') }} :
                                </label>
                                <p class="text-muted">{{ $user->alamat ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center bg-light py-3">
                        @if (auth()->check())
                            <a href="{{ auth()->user()->type === 'member' ? route('profile.edit') : route('distributor.profile.edit') }}"
                                class="btn btn-primary px-4 py-2">
                                <i class="bx bx-pencil"></i> Edit Profil
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection