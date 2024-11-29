@extends('layouts.Member.master')

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
                            <h4 class="mb-0 text-white text-center">{{ __('messages.selling_product') }}</h4>
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
    <link rel="stylesheet" href="{{ asset('assets/css/location-leaflet.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-pulse-icon@1.0.0/dist/L.Icon.Pulse.css" />
    <script src="{{ asset('assets/js/location-leaflet.js') }}"></script>
    <script src="https://unpkg.com/leaflet-pulse-icon@1.0.0/dist/L.Icon.Pulse.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.7.1-web/css/all.css') }}" />

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-1.8694501185333308, 115.36224445532018], 5);

        //tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Terjemahan dari server untuk konten popup
        let translationTemplate =
            `{{ __('messages.members_in_province', ['count' => ':count', 'province' => ':province']) }}`;

        function addMarker(lat, lng, province, userCount, users) {
            // Membuat ikon FontAwesome untuk marker
            var fontAwesomeIcon = L.divIcon({
                className: 'fa-icon-marker', // Kelas CSS untuk ikon
                html: '<i class="fas fa-map-marker-alt" style="font-size: 24px; color: #ff5733;"></i>', // Ganti dengan ikon FontAwesome yang Anda inginkan
                iconSize: [30, 30], // Ukuran ikon
                iconAnchor: [15, 30], // Penempatan ikon (tengah bagian bawah)
                popupAnchor: [0, -30] // Penempatan popup
            });

            var marker = L.marker([lat, lng], {
                icon: fontAwesomeIcon // Terapkan ikon FontAwesome
            }).addTo(map);

            // Buat daftar pengguna
            let userList = '<ul>';
            users.forEach(function(user) {
                userList += `<li>${user.nama_perusahaan} (Became a Member on: ${user.created_at})</li>`;
            });
            userList += '</ul>';

            // Terjemahan dinamis
            let popupText = translationTemplate
                .replace(':count', userCount)
                .replace(':province', province);

            // Konten popup untuk marker
            marker.bindPopup(`
        <div class="info-window">
            <h3 class="popup-title">${province}</h3>
            <p class="popup-description">${popupText}</p>
            ${userList}
        </div>
    `);

            // Tooltip
            marker.bindTooltip(`<div>${province}</div>`, {
                permanent: false,
                direction: 'top',
                offset: [0, -20],
                className: 'marker-tooltip'
            });

            marker.on('mouseover', function(e) {
                this.openTooltip();
            });
            marker.on('mouseout', function(e) {
                this.closeTooltip();
            });
        }

        fetch("{{ url('/locations') }}")
            .then(response => response.json())
            .then(data => {
                console.log("Received Data:", data); // Debugging to check data
                data.forEach(location => {
                    if (location.user_count > 0) {
                        console.log("Adding marker for:", location.province, "with", location.user_count,
                            "users.");
                        addMarker(location.latitude, location.longitude, location.province, location.user_count,
                            location.user_data);
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
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
