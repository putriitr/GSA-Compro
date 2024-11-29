@extends('layouts.Member.master')

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
            <div class="header-carousel-item  position-relative">
                <img src="{{ asset('assets/img/bg.jpg') }}" class="img-fluid w-100" alt="Default Image">
                <div
                    class="carousel-caption d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle">
                    <div class="container py-4">
                        <div class="row g-5 align-items-center">
                            <div class="col-xl-12 text-center">
                                <div>
                                    <h5 class="text-primary text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                                        {{ __('messages.slider_not_available') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach ($sliders as $slider)
                <div class="header-carousel-item position-relative">
                    <img src="{{ asset($slider->image_url) }}" class="img-fluid w-100" alt="{{ $slider->title }}">
                    <div
                        class="carousel-caption d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle">
                        <div class="container py-4">
                            <div class="row g-5 align-items-center">
                                <div class="col-xl-12 text-center">
                                    <div>
                                        <h5 class="text-primary text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                                            {{ $slider->subtitle }}
                                        </h5>
                                        <h1 class="display-4 text-uppercase text-white mb-4">
                                            {{ $slider->title }}
                                        </h1>
                                        <p class="mb-4 fs-5">{{ $slider->description }}</p>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                                                href="{{ $slider->button_url }}">{{ $slider->button_text }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <img src="{{ $company && $company->about_gambar ? asset('storage/' . $company->about_gambar) : asset('assets/img/about.jpg') }}"
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
                                    class="attractions-name"
                                    style="font-size: 20px; text-align:center; padding: 5px 10px;">{{ $produk->nama }}</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-white text-center">{{ __('messages.product_not_available') }}</p>
            @endif
        </div>
        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
            <a class="btn btn-primary rounded-pill text-white py-3 px-5"
                href="{{ route('product.index') }}">{{ __('messages.show_more') }}</a>
        </div>
    </div>
    <br><br><br><br><br>
    <!-- Product End -->

    <!-- Brand Start -->
    <div id="brand" class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.our_brands1') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.our_brands') }}</h1>
                <p class="mb-0">{{ __('messages.brands_desc') }}</p>
            </div>
            @if ($partners->isEmpty())
                <div class="carousel-container" style="overflow: hidden; position: relative; height: 150px;">
                    <div class="carousel-rows" style="display: flex; flex-direction: column; height: 100%;">
                        <div class="carousel-row"
                            style="display: flex; white-space: nowrap; align-items: center; justify-content: center; height: 100%; animation: marquee 35s linear infinite;">
                            <div>
                                <p class="text-dark text-center" style="letter-spacing: 2px; margin: 0;">
                                    {{ __('messages.brand_not_available') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="carousel-container">
                    <div class="carousel-rows">
                        @foreach ($partners as $partner)
                            <div class="brand-item">
                                <img src="{{ asset($partner->gambar) }}" class="img-fluid" alt="{{ $partner->nama }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Brand End -->

    <style>
        .carousel-container {
            position: relative;
            overflow: hidden;
            height: 150px;
            /* Adjust height for two rows */
        }

        .carousel-rows {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            /* 4 images per row */
            grid-auto-rows: 120px;
            /* Fixed height for each row */
            animation: marquee 50s linear infinite;
            position: relative;
        }

        .brand-item {
            margin: 10px;
            border: 2px solid #ddd;
            /* Border around each image */
            border-radius: 5px;
            /* Rounded corners for the border */
            display: flex;
            justify-content: center;
            /* Center the image inside the item */
            align-items: center;
            /* Center the image vertically */
            overflow: hidden;
            /* Hide overflow if image is too big */
        }

        img {
            width: 100%;
            /* Make image fill the container */
            height: 100%;
            /* Maintain height for uniformity */
            object-fit: cover;
            /* Cover the area of the item */
        }

        @keyframes marquee {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const carouselRows = document.getElementById("carouselRows");
            const container = document.querySelector('.carousel-container');

            // Clone the carousel rows to create a seamless loop
            const clonedRows = carouselRows.cloneNode(true);
            carouselRows.appendChild(clonedRows);

            // Calculate total height after cloning
            const totalHeight = carouselRows.scrollHeight; // Get the total height of the images
            const containerHeight = container.clientHeight;

            // Set animation duration based on the total height
            // The factor of 120 can be adjusted based on the speed you desire
            const duration = (totalHeight / 120) * 30; // Adjust based on desired speed

            // Ensure the animation runs smoothly
            carouselRows.style.animation = `marquee ${duration}s linear infinite`;

            // Initial position for the cloned content
            carouselRows.style.transform = `translateY(0)`;

            // Function to reset scroll position when reaching the end of the first set
            const resetScrollPosition = () => {
                const scrollTop = container.scrollTop;

                // Reset position when the original rows are scrolled out of view
                if (scrollTop >= totalHeight / 2) {
                    // Reset the scroll position back to the start
                    carouselRows.style.transform = `translateY(0)`;
                    container.scrollTop = 0; // Reset scroll position
                }
            };

            // Listen for scroll events to reset position
            container.addEventListener('scroll', resetScrollPosition);
        });
    </script>
@endsection
