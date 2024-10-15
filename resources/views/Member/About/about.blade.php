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
                    @if ($userLocations ?? collect()->isEmpty())
                        <p>{{ __('messages.no_locations_found') }}</p>
                    @else
                        @foreach ($userLocations as $location)
                            <div class="location"
                                style="top: {{ $location->latitude }}%; left: {{ $location->longitude }}%;"></div>
                            <div class="line"
                                style="top: {{ $location->latitude }}%; left: {{ $location->longitude }}%; height: 100px; transform: translateX(-50%);">
                            </div>
                            <div class="label"
                                style="top: {{ $location->latitude + 100 }}px; left: {{ $location->longitude }}%; transform: translateX(-50%);">
                                <img src="{{ asset('assets/img/' . $location->image) }}" alt="{{ $location->name }}"
                                    style="width: 50px; border-radius: 50%;">
                                <p>{{ $location->name }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- User End -->

    <style>
        .map {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .location {
            position: absolute;
            width: 10px;
            /* Ubah sesuai ukuran yang diinginkan */
            height: 10px;
            /* Ubah sesuai ukuran yang diinginkan */
            background-color: red;
            /* Warna untuk menunjukkan lokasi */
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            /* Efek bayangan */
        }

        .line {
            position: absolute;
            width: 2px;
            /* Lebar garis */
            background-color: blue;
            /* Warna garis */
            z-index: 1;
            /* Menempatkan garis di bawah label */
        }

        .label {
            position: absolute;
            text-align: center;
            z-index: 2;
            /* Menempatkan label di atas garis dan lokasi */
        }

        .label img {
            border-radius: 50%;
            margin-bottom: 5px;
            /* Jarak antara gambar dan nama */
        }
    </style>

    <script>
        document.querySelectorAll('.location').forEach(location => {
            location.addEventListener('click', function() {
                const label = this.nextElementSibling; // Ambil elemen label yang sesuai
                alert(label.querySelector('p').textContent); // Tampilkan nama lokasi
            });
        });
    </script>
@endsection
