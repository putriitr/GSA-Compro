@extends('layouts.member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/activity.jpg') }}'); background-size: cover; height: 300px;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.about_us') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.about_us') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <br><br>
    <div class="container-fluid about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">{{ __('messages.about_us') }}</h4>
                        <h1 class="display-5 mb-4">{{ $company->nama_perusahaan ?? 'Gudang Solusi Acommerce' }}</h1>
                        <p class="mb-5" style="text-align: justify;">{{ $company->sejarah_singkat ?? ' ' }}</p>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3"><i class="fas fa-hammer fa-3x text-primary"></i></div>
                                    <div>
                                        <h4>{{ __('messages.service1') }}</h4>
                                        <p>{{ __('messages.service1_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3"><i class="fas fa-truck fa-3x text-primary"></i></div>
                                    <div>
                                        <h4>{{ __('messages.service2') }}</h4>
                                        <p>{{ __('messages.service2_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3"><i class="fas fa-tags fa-3x text-primary"></i></div>
                                    <div>
                                        <h4>{{ __('messages.service3') }}</h4>
                                        <p>{{ __('messages.service3_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3"><i class="fas fa-shield-alt fa-3x text-primary"></i></div>
                                    <div>
                                        <h4>{{ __('messages.service4') }}</h4>
                                        <p>{{ __('messages.service4_desc') }}</p>
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
                                        <img src="{{ $company && $company->about_gambar ? asset('storage/' . $company->about_gambar) : asset('assets/img/bg-product.jpg') }}"
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
                                    {{ __('messages.visimisi_2') }}
                                </h2>
                                <p class="text-white">{{ $company->visimisi_2 }}</p>
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
                                    {{ __('messages.visimisi_3') }}
                                </h2>
                                <p class="text-white">{{ $company->visimisi_3 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Map Start -->
    <div class="container-fluid feature pb-5"
        style="width: 90%; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); padding: 20px; background-color: #fff; text-align: center;">
        <div class="container pb-5" data-wow-delay="0.1s">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.our_customers1') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.our_customers') }}</h1>
                <p class="mb-0">{{ __('messages.customer_desc') }}</p>
            </div>
            <div id="map"
            style="margin-left: auto; margin-right: auto; width: 100%; height: 500px; border-radius: 10px; overflow: hidden;">
        </div>
    </div>
    </div><br><br>
    <!-- Map End -->

    <!-- Include Leaflet.js and Pulse Icon -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-pulse-icon@1.0.0/dist/L.Icon.Pulse.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-pulse-icon@1.0.0/dist/L.Icon.Pulse.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi peta
            var map = L.map('map').setView([-1.8694501185333308, 115.36224445532018], 5);

            // Menambahkan layer tile ke peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Ambil data lokasi dari backend menggunakan AJAX (contoh menggunakan jQuery)
            $.ajax({
                url: '/path/to/your/api/locations', // Gantilah dengan URL API Anda
                method: 'GET',
                success: function(data) {
                    // Asumsikan data berbentuk array objek: [{latitude, longitude, name, image_url}, ...]
                    data.forEach(function(location) {
                        // Menambahkan marker ke peta dengan informasi dari data
                        var marker = L.marker([location.latitude, location.longitude]).addTo(
                                map)
                            .bindPopup(
                                `<div style="display: flex; align-items: center;">
                                    <img src="${location.image_url}" alt="Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                    <div>
                                        <b>${location.name}</b>
                                    </div>
                                </div>`
                            );
                    });
                },
                error: function(error) {
                    console.error('Error fetching locations:', error);
                }
            });
        });
    </script>

    <style>
        .marker-tooltip {
            background-color: #b3d9ff;
            border: 1px solid #80b3ff;
            padding: 5px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            font-size: 12px;
            color: #333;
        }

        .info-window img.popup-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        .popup-title {
            font-size: 20px;
            color: black;
            font-weight: bold;
        }

        .popup-description,
        .popup-address {
            font-size: 12px;
            color: #333;
            margin-top: 10px;
            text-align: justify;
        }

        /* Media query untuk perangkat dengan lebar maksimal 768px */
        @media (max-width: 768px) {
            .info-window {
                padding: 10px;
            }

            .popup-title {
                font-size: 18px;
            }

            .popup-description,
            .popup-address {
                font-size: 10px;
            }

            .info-window img.popup-image {
                margin-bottom: 5px
            }
        }

        /* Media query untuk perangkat dengan lebar maksimal 480px */
        @media (max-width: 480px) {
            .popup-title {
                font-size: 16px;
            }

            .popup-description,
            .popup-address {
                font-size: 9px;
            }
        }
    </style>
    <!-- Map End -->
@endsection
