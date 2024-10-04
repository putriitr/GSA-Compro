@extends('layouts.member.master')

@section('content')

    <!-- Menampilkan pesan error -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Ada Kesalahan:</h4>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <h4 class="alert-heading"><i class="fas fa-check-circle"></i> Berhasil!</h4>
            <p>{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        @if ($sliders->isEmpty())
            <div class="header-carousel-item">
                <img src="{{ asset('storage/hero-img.jpg') }}" class="img-fluid w-100" alt="Default Image">
                <div class="carousel-caption w-100">
                    <div class="container py-4">
                        <div class="row g-12">
                            <div class="col-xl-12 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s"
                                style="animation-delay: 1s;">
                                <div class="text-start">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                                        {{ __('messages.company_name') }}
                                    </h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">
                                        {{ __('messages.tagline') }}
                                    </h1>
                                    <p class="mb-4 fs-5 text-white">{{ __('messages.description') }}</p>
                                    <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="{{ route('about') }}">
                                        {{ __('messages.about_us') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Loop through sliders if data exists -->
            @foreach ($sliders as $slider)
                <div class="header-carousel-item">
                    <img src="{{ asset($slider->image_url) }}" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="carousel-caption-content p-3">
                            <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                                {{ $slider->subtitle }}
                            </h5>
                            <h1 class="display-1 text-capitalize text-white mb-4">
                                {{ $slider->title }}
                            </h1>
                            <p class="mb-5 fs-5">{{ $slider->description }}</p>
                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="{{ $slider->button_url }}">
                                {{ $slider->button_text }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


    <!-- About Start -->
    <br><br>
    <div class="container-fluid about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">About Us</h4>
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
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                            <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                                href="{{ route('about') }}">{{ __('messages.about_us') }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="position-relative rounded">
                            <div class="rounded" style="margin-top: 40px;">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="rounded mb-4">
                                            <img src="{{ $company && $company->about_gambar ? asset('storage/' . $company->about_gambar) : asset('storage/bg.jpg') }}"
                                                class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                                        </div>
                                        <div class="row gx-4 gy-0">
                                            <div class="col-6">
                                                <div class="counter-item bg-primary rounded text-center p-4 h-100">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-thumbs-up fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                        <span class="text-white fs-2 fw-bold"
                                                            data-toggle="counter-up">150</span>
                                                        <span class="h1 fw-bold text-white">K +</span>
                                                    </div>
                                                    <h5 class="text-white mb-0">Happy Visitors</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="counter-item bg-dark rounded text-center p-4 h-100">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-certificate fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                        <span class="text-white fs-2 fw-bold"
                                                            data-toggle="counter-up">122</span>
                                                        <span class="h1 fw-bold text-white"> +</span>
                                                    </div>
                                                    <h5 class="text-white mb-0">Awwards Winning</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded bg-primary p-4 position-absolute d-flex justify-content-center"
                                style="width: 90%; height: 80px; top: -40px; left: 50%; transform: translateX(-50%);">
                                <h3 class="mb-0 text-white">Selling Advanced Product</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.tujuan_kami') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.visi_misi_perusahaan') }}</h1>
                {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p> --}}
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item p-4">
                        <div class="team-content">
                            <div class="d-flex justify-content-between border-bottom pb-4">
                                <div class="text-start">
                                    <h5 class="mb-0">EXCELLENT</h5>
                                    <p class="mb-0">QUALITY</p>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/machine.jpg') }}" class="img-fluid rounded"
                                        style="width: 120px; height: 120px;" alt="">
                                </div>
                            </div><br>
                            <p class="text-center mb-0">Kami berkomitmen untuk terus berinovasi dan menghadirkan produk
                                dengan kualitas terbaik, yang dirancang dengan presisi dan ketelitian tinggi.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item p-4">
                        <div class="team-content">
                            <div class="d-flex justify-content-between border-bottom pb-4">
                                <div class="text-start">
                                    <h5 class="mb-0">EXCELLENT</h5>
                                    <p class="mb-0">QUALITY</p>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/machine.jpg') }}" class="img-fluid rounded"
                                        style="width: 120px; height: 120px;" alt="">
                                </div>
                            </div><br>
                            <p class="text-center mb-0">Kami berkomitmen untuk terus berinovasi dan menghadirkan produk
                                dengan kualitas terbaik, yang dirancang dengan presisi dan ketelitian tinggi.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item p-4">
                        <div class="team-content">
                            <div class="d-flex justify-content-between border-bottom pb-4">
                                <div class="text-start">
                                    <h5 class="mb-0">EXCELLENT</h5>
                                    <p class="mb-0">QUALITY</p>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/machine.jpg') }}" class="img-fluid rounded"
                                        style="width: 120px; height: 120px;" alt="">
                                </div>
                            </div><br>
                            <p class="text-center mb-0">Kami berkomitmen untuk terus berinovasi dan menghadirkan produk
                                dengan kualitas terbaik, yang dirancang dengan presisi dan ketelitian tinggi.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Team End -->

    <!-- Product Start -->
    @if (!$produks->isEmpty())
        <div class="container-fluid attractions py-5">
            <div class="container attractions-section py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">{{ __('messages.find_products') }}</h4>
                    <h1 class="display-5 text-white mb-4">{{ __('messages.our_products') }}</h1>
                    <p class="text-white mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci
                        facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa
                        deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="owl-carousel attractions-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($produks as $produk)
                        <div class="attractions-item wow fadeInUp" data-wow-delay="0.2s">
                            <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                class="img-fluid rounded w-100" alt="">
                            <a href="{{ route('product.show', $produk->id) }}"
                                class="attractions-name">{{ $produk->nama }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                    href="{{ route('product.index') }}">{{ __('messages.show_more') }}</a>
            </div>
        </div>
    @endif
    <!-- Product End -->

    <!-- Brand Start -->
    @if ($partners->isNotEmpty())
        <div class="container-fluid gallery pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">{{ __('messages.partnership') }}</h4>
                    <h1 class="display-5 mb-4">{{ __('messages.our_partners') }}</h1>
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                        cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                        sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="container overflow-hidden">
                    <div class="row g-4">
                        @foreach ($partners as $key => $p)
                            <div class="col-md-3 wow fadeInUp {{ $key >= 8 ? 'd-none' : '' }}" data-wow-delay="0.2s">
                                <div class="gallery-item">
                                    <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->name }}"
                                        width="100%" height="100" style="object-fit:contain;">
                                    <div class="search-icon">
                                        <a href="{{ asset('storage/' . $p->gambar) }}" class="btn btn-light btn-lg-square rounded-circle"
                                            data-lightbox="Gallery-1"><i class="fas fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($partners->count() > 4)
                    <div class="text-center mt-4">
                        <button id="show-more-partners" class="btn btn-primary">{{ __('messages.show_more') }}</button>
                        <button id="show-less-partners"
                            class="btn btn-secondary d-none">{{ __('messages.show_less') }}</button>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <!-- Brand End -->


    {{-- <!-- Principal Section Start -->
    @if ($principals->isNotEmpty())
        <div class="container-fluid wow zoomInDown" data-wow-delay="0.1s">
            <div class="container">
                <div class="section-title">
                    <div class="sub-style">
                        <h4 class="sub-title px-3 mb-0">{{ __('messages.trusted_collaboration') }}</h4>
                    </div>
                    <h1 class="display-3 mb-4">{{ __('messages.distributor_company') }}</h1>
                </div>
                <div class="container overflow-hidden">
                    <div class="row gy-4">
                        @foreach ($principals as $key => $p)
                            <div
                                class="col-6 col-md-4 col-xl-3 text-center principal-item {{ $key >= 10 ? 'd-none' : '' }}">
                                <div class="bg-light px-4 py-3 px-md-6 py-md-4 px-lg-8 py-lg-5">
                                    <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->name }}"
                                        width="100%" height="65">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($principals->count() > 8)
                        <div class="text-center mt-4">
                            <button id="show-more-principals"
                                class="btn btn-primary">{{ __('messages.show_more') }}</button>
                            <button id="show-less-principals"
                                class="btn btn-secondary d-none">{{ __('messages.show_less') }}</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <!-- Principal Section End --> --}}

    <!-- Script to Show More and Show Less Items -->
    <script>
        document.getElementById('show-more-partners').addEventListener('click', function() {
            document.querySelectorAll('.partner-item.d-none').forEach(function(item) {
                item.classList.remove('d-none');
            });
            this.style.display = 'none';
            document.getElementById('show-less-partners').classList.remove('d-none');
        });

        document.getElementById('show-less-partners').addEventListener('click', function() {
            document.querySelectorAll('.partner-item').forEach(function(item, index) {
                if (index >= 8) {
                    item.classList.add('d-none');
                }
            });
            this.classList.add('d-none');
            document.getElementById('show-more-partners').style.display = 'inline-block';
        });

        document.getElementById('show-more-principals').addEventListener('click', function() {
            document.querySelectorAll('.principal-item.d-none').forEach(function(item) {
                item.classList.remove('d-none');
            });
            this.style.display = 'none';
            document.getElementById('show-less-principals').classList.remove('d-none');
        });

        document.getElementById('show-less-principals').addEventListener('click', function() {
            document.querySelectorAll('.principal-item').forEach(function(item, index) {
                if (index >= 8) {
                    item.classList.add('d-none');
                }
            });
            this.classList.add('d-none');
            document.getElementById('show-more-principals').style.display = 'inline-block';
        });
    </script>




    /

    <!-- Map Start -->
    <div class="container"
        style="
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 20px;
    background-color: #fff;
    text-align: center; ">

        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">{{ __('messages.our_loyal_customers') }}</h4>
            </div>
            <h1 class="display-3 mb-4">{{ __('messages.our_customers') }}</h1>
        </div>

        <hr>

        <div id="umalo" style=" width: 100%; height: 600px; border-radius: 10px; overflow: hidden;"></div>
    </div> <br> <br>
    <!-- Map End -->

    <!-- Include Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Inisialisasi peta
        var map = L.map('umalo').setView([-2.548926, 118.0148634], 5); // Pusat Indonesia

        //tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Terjemahan dari server untuk konten popup
        let translationTemplate =
            `{{ __('messages.members_in_province', ['count' => ':count', 'province' => ':province']) }}`;

        function addMarker(lat, lng, province, userCount, users) {
            var marker = L.marker([lat, lng]).addTo(map);

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

    <style>
        .logo-container {
            width: 100%;
            overflow: hidden;
            background-color: #ffffff;
            padding: 10px 0;
        }

        .logo-scroller {
            display: flex;
            width: max-content;
        }

        /* Partner Section Animation */
        .partner-scroller {
            animation: scroll-right 10s linear infinite;
        }

        /* Principal Section Animation */
        .principal-scroller {
            animation: scroll-left 10s linear infinite;
        }

        /* Static section for E-commerce, no animation */
        .logo-static {
            display: flex;
            justify-content: center;
            /* Center the logos horizontally */
            align-items: center;
            /* Vertically align the logos */
            flex-wrap: wrap;
            /* Allow logos to wrap in mobile view */
        }

        .logo {
            width: 300px;
            margin-right: 20px;
            height: 120px;
            object-fit: contain;
        }

        @keyframes scroll-right {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(100%);
            }
        }

        @keyframes scroll-left {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Media query for mobile view */
        @media (max-width: 768px) {
            .logo-static {
                flex-direction: column;
                /* Stack logos vertically in mobile view */
            }

            .logo {
                margin: 10px 0;
                /* Add vertical spacing between logos in mobile view */
            }
        }
    </style>
    <!-- Ecommerce End -->
@endsection
