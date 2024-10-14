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
                <img src="{{ asset('storage/bg-1.jpg') }}" class="img-fluid w-100" alt="Default Image">
                <div class="carousel-caption"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <div class="carousel-caption-content p-3">
                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                            No slider available.
                        </h5>
                    </div>
                </div>
            </div>
        @else
            @foreach ($sliders as $slider)
                <div class="header-carousel-item" style="position: relative;">
                    <img src="{{ asset($slider->image_url) }}" class="img-fluid w-100" alt="{{ $slider->title }}">
                    <div class="carousel-caption"
                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <div class="carousel-caption-content p-3">
                            <h5 class="text-white text-center text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
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
    <!-- Carousel End -->

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
                            <p class="mb-5" style="text-align: justify; font-size: 20px;">
                                {{ $company->sejarah_singkat ?? ' ' }}</p>
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
                                                class="img-fluid rounded w-100"
                                                style="object-fit: cover; transition: transform 0.3s ease; cursor: pointer;"
                                                alt="Image" onmouseover="this.style.transform='scale(1.1)'"
                                                onmouseout="this.style.transform='scale(1)'">
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

    <!-- Product Start -->
    <div class="container-fluid attractions py-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container attractions-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.find_products') }}</h4>
                <h1 class="display-5 text-white mb-4">{{ __('messages.our_products') }}</h1>
                <p class="text-white mb-0">{{ __('messages.product_desc') }}</p>
            </div>
            @if (!$produks->isEmpty())
                <div class="owl-carousel attractions-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($produks as $produk)
                        <div class="attractions-item wow fadeInUp" data-wow-delay="0.2s">
                            <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                class="img-fluid rounded w-100" alt=""
                                style="width: 300px; height: 300px; object-fit: cover;">
                            <a href="{{ route('product.show', $produk->id) }}"
                                class="attractions-name">{{ $produk->nama }}</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-white text-center">{{ __('messages.no_products_available') }}</p>
            @endif
        </div>
        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
            <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                href="{{ route('product.index') }}">{{ __('messages.show_more') }}</a>
        </div>
    </div><br><br><br><br><br>
    <!-- Product End -->

    <!-- Brand Start -->
    <div id="brand" class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.our_brands1') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.our_brands') }}</h1>
                <p class="mb-0">{{ __('messages.brands_desc') }}</p>
            </div>
            @if ($partners->isNotEmpty())
                <!-- Carousel Container -->
                <div class="carousel-container" style="overflow: hidden; position: relative;">
                    <!-- Container for both rows -->
                    <div class="carousel-rows" style="display: flex; flex-direction: column;">
                        <!-- First Row of Logos -->
                        <div class="carousel-row"
                            style="display: flex; white-space: nowrap; animation: marquee 45s linear infinite;">
                            @foreach ($partners->slice(0, ceil($partners->count() / 2)) as $p)
                                <!-- Baris 1: Ambil setengah pertama dari gambar -->
                                <div class="col-2" style="flex: 0 0 auto; padding: 0 10px;">
                                    <div class="gallery-item">
                                        <img src="{{ asset($p->gambar) }}"
                                            style="border: 2px solid #3cbeee; height:120px; width: 100%; transition: transform 0.3s ease;"
                                            class="img-fluid rounded" alt=""
                                            onmouseover="this.style.transform='scale(1.05)';"
                                            onmouseout="this.style.transform='scale(1)';">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Second Row of Logos -->
                        <div class="carousel-row"
                            style="display: flex; white-space: nowrap; animation: marquee 45s linear infinite;">
                            @foreach ($partners->slice(ceil($partners->count() / 2)) as $p)
                                <!-- Baris 2: Ambil setengah kedua dari gambar -->
                                <div class="col-2" style="flex: 0 0 auto; padding: 0 10px;">
                                    <div class="gallery-item">
                                        <img src="{{ asset($p->gambar) }}"
                                            style="border: 2px solid #3cbeee; height: 120px; width: 100%; transition: transform 0.3s ease;"
                                            class="img-fluid rounded" alt=""
                                            onmouseover="this.style.transform='scale(1.05)';"
                                            onmouseout="this.style.transform='scale(1)';">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Brand End -->



    <!-- Brand Section -->
    <script>
        $('.attractions-carousel').owlCarousel({
            items: 1, // Menampilkan produk sesuai jumlah sebenarnya
            loop: false, // Mencegah pengulangan item
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });


        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000, // 3 detik antar slide
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2 // Untuk layar kecil (mobile)
                    },
                    768: {
                        items: 4 // Untuk tablet
                    },
                    1000: {
                        items: 6 // Untuk desktop, 6 item per baris
                    }
                }
            });
        });
    </script>

    <!-- Include Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .carousel-container {
            overflow: hidden;
        }

        .carousel-row {
            display: flex;
            white-space: nowrap;
            padding: 15px;
        }

        .carousel-row img {
            transition: transform 0.3s ease;
        }

        .logo-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #3cbeee;
            transition: transform 0.3s ease;
        }

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
