@extends('layouts.member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/page-header.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary">About</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <br><br>
    <div class="container-fluid about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">{{ __('messages.about_us') }}</h4>
                            <h1 class="display-5 mb-4">{{ $company->nama_perusahaan ?? 'Gudang Solusi Acommerce' }}</h1>
                            <p class="mb-5" style="text-align: justify;">{{ $company->sejarah_singkat ?? ' ' }}</p>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-glass-cheers fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Food & Drinks</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-dot-circle fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Many Attractions</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-hand-holding-usd fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Affordable Price</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-lock fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Safety Lockers</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="position-relative rounded">
                            <div class="rounded" style="margin-top: 40px;">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="rounded mb-4">
                                            <img src="{{ $company && $company->about_gambar ? asset('storage/' . $company->about_gambar) : asset('storage/bg.jpg') }}"
                                                class="img-fluid rounded w-100"
                                                style="object-fit: cover; transition: transform 0.3s ease; cursor: pointer;"
                                                alt="Image" onmouseover="this.style.transform='scale(1.1)'"
                                                onmouseout="this.style.transform='scale(1)'">
                                        </div>
                                        <div class="row gx-4 gy-0">
                                            <div class="col-6">
                                                <div class="counter-item bg-primary rounded text-center p-4 h-100"
                                                    style="transition: background-color 0.1s ease, box-shadow 0.5s ease, opacity 0.3s ease;"
                                                    onmouseover="this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.4)'; this.style.opacity='0.9'; this.style.backgroundColor='#0056b3';"
                                                    onmouseout="this.style.boxShadow='none'; this.style.opacity='1'; this.style.backgroundColor='#0d6efd';">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-file-alt fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                        <span class="h4 fw-bold text-white">{{ __('messages.NIB') }}</span>
                                                    </div>
                                                    <h5 class="text-white mb-0">{{ $company->nomor_induk_berusaha }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="counter-item bg-dark rounded text-center p-4 h-100"
                                                    style="transition: background-color 0.1s ease, box-shadow 0.5s ease, opacity 0.3s ease;"
                                                    onmouseover="this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.4)'; this.style.opacity='0.9'; this.style.backgroundColor='#333333';"
                                                    onmouseout="this.style.boxShadow='none'; this.style.opacity='1'; this.style.backgroundColor='#000000';">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-file-signature fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                        <span class="h4 fw-bold text-white">{{ __('messages.SK') }}</span>
                                                    </div>
                                                    <h5 class="text-white mb-0">{{ $company->surat_keterangan }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded bg-primary p-4 position-absolute d-flex justify-content-center align-items-center"
                                style="width: 70%; height: 60px; top: -30px; left: 50%; transform: translateX(-50%);">
                                <h4 class="mb-0 text-white text-center">Selling Advanced Product</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.tujuan_kami') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.visi_misi_perusahaan') }}</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item"
                        style="position: relative; overflow: hidden; transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out; cursor: pointer;"
                        onmouseover="this.style.transform='translateY(-25px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.2)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        <img src="{{ asset('assets/img/visi-1.jpg') }}" class="img-fluid rounded w-100" alt="Image"
                            style="transition: transform 0.5s ease-in-out;" onmouseover="this.style.transform='scale(1.1)';"
                            onmouseout="this.style.transform='scale(1)';">
                        <div class="feature-content p-4">
                            <div class="feature-content-inner"
                                style="text-align: center; transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;">
                                <h2 style="font-weight: bold; margin-bottom: 3rem;" class="text-white">
                                    {{ __('messages.visimisi_1') }}
                                </h2>
                                <p class="text-white">{{ $company->visimisi_1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item"
                        style="position: relative; overflow: hidden; transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out; cursor: pointer;"
                        onmouseover="this.style.transform='translateY(-25px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.2)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        <img src="{{ asset('assets/img/visi-2.jpg') }}" class="img-fluid rounded w-100" alt="Image"
                            style="transition: transform 0.5s ease-in-out;"
                            onmouseover="this.style.transform='scale(1.1)';"
                            onmouseout="this.style.transform='scale(1)';">
                        <div class="feature-content p-4">
                            <div class="feature-content-inner"
                                style="text-align: center; transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;">
                                <h2 style="font-weight: bold; margin-bottom: 3rem;" class="text-white">
                                    {{ __('messages.visimisi_2') }}</h2>
                                <p class="text-white">{{ $company->visimisi_1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item"
                        style="position: relative; overflow: hidden; transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out; cursor: pointer;"
                        onmouseover="this.style.transform='translateY(-25px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.2)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        <img src="{{ asset('assets/img/visi-3.jpg') }}" class="img-fluid rounded w-100" alt="Image"
                            style="transition: transform 0.5s ease-in-out;"
                            onmouseover="this.style.transform='scale(1.1)';"
                            onmouseout="this.style.transform='scale(1)';">
                        <div class="feature-content p-4">
                            <div class="feature-content-inner"
                                style="text-align: center; transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;">
                                <h2 style="font-weight: bold; margin-bottom: 3rem;" class="text-white">
                                    {{ __('messages.visimisi_3') }}</h2>
                                <p class="text-white">{{ $company->visimisi_1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- User Start -->
    <div class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.our_customers1') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.our_customers') }}</h1>
            </div>
            <div class="map-container"
                style="background: url('{{ asset('assets/img/peta.png') }}'); background-size: cover; width: 100%; height: 400px; position: relative;">
                <div class="map">
                    <!-- Titik dan garis untuk pengguna 1 -->
                    <div class="location" style="top: 30%; left: 40%;"></div>
                    <div class="line" style="top: 30%; left: 40%; height: 100px; transform: translateX(-50%);"></div>
                    <div class="label" style="top: 140px; left: 35%; transform: translateX(-50%);">
                        <img src="{{ asset('storage/user.png') }}" alt="User 1"
                            style="width: 50px; border-radius: 50%;">
                        <p>User 1</p>
                    </div>

                    <!-- Titik dan garis untuk pengguna 2 -->
                    <div class="location" style="top: 50%; left: 60%;"></div>
                    <div class="line" style="top: 50%; left: 60%; height: 80px; transform: translateX(-50%);"></div>
                    <div class="label" style="top: 140px; left: 55%; transform: translateX(-50%);">
                        <img src="{{ asset('storage/user.png') }}" alt="User 2"
                            style="width: 50px; border-radius: 50%;">
                        <p>User 2</p>
                    </div>

                    <!-- Tambahkan lebih banyak lokasi sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    <!-- User End -->

    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .map-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .location {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: red;
            /* Warna titik */
            border-radius: 50%;
        }

        .label {
            position: absolute;
            color: #000;
            font-weight: bold;
            background-color: white;
            /* Warna latar belakang label */
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            transform: translate(-50%, 0);
            /* Memastikan label berada di tengah horizontal */
        }

        /* Garis penghubung */
        .line {
            position: absolute;
            width: 2px;
            background-color: black;
            /* Warna garis */
            transform: translateX(-50%);
            /* Memastikan garis berada di tengah horizontal */
        }
    </style>
@endsection
