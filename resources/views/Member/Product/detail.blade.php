@extends('layouts.Member.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                {{-- <div class="col-lg-12 col-xl-7 wow fadeInUp" data-wow-delay="0.2s">

                </div> --}}
                <div class="row" style="display: flex; align-items: stretch;">
                    <div class="col-lg-12 col-xl-5 wow fadeInUp" data-wow-delay="0.2s"
                        style="display: flex; flex-direction: column;">
                        @if ($produk->images->count() > 1)
                            <div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel" style="flex: 1;">
                                <div class="carousel-inner">
                                    @foreach ($produk->images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image->gambar) }}" alt="{{ $produk->nama }}"
                                                class="img-fluid"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#productImageCarousel" role="button"
                                    data-bs-slide="prev"
                                    style="width: 40px; height: 40px; background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; display: flex; justify-content: center; align-items: center; top: 50%; transform: translateY(-50%);">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="filter: invert(1); width: 20px; height: 20px;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#productImageCarousel" role="button"
                                    data-bs-slide="next"
                                    style="width: 40px; height: 40px; background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; display: flex; justify-content: center; align-items: center; top: 50%; transform: translateY(-50%);">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="filter: invert(1); width: 20px; height: 20px;"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        @else
                            <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                alt="{{ $produk->nama }}" class="img-fluid"
                                style="width: 100%; height: 470px; object-fit: cover; border-radius: 10px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);">
                        @endif
                    </div>

                    <div class="col-lg-12 col-xl-7 wow fadeInUp" data-wow-delay="0.4s"
                        style="display: flex; flex-direction: column;">
                        <div class="pricing-item bg-light rounded p-5 h-100">
                            <div class="packages-item h-100">
                                <h4 class="text-primary">{{ __('messages.detail_product') }}</h4>
                                <h3 class="display-6 mb-4">{{ $produk->nama }}</h3>
                                <p class="mb-4" style="text-align: justify;">{{ $produk->tentang_produk }}</p>


                                <p style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fa fa-circle text-primary small-bullet" style="margin-right: 10px;"></i>
                                    <span style="width: 100px; font-weight: bold;">{{ __('messages.kegunaan') }}</span>
                                    <span
                                        style="font-weight: normal; color: #555; margin-left: 10px;">{{ $produk->kegunaan }}</span>
                                </p>
                                <p style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fa fa-circle text-primary small-bullet" style="margin-right: 10px;"></i>
                                    <span style="width: 100px; font-weight: bold;">{{ __('messages.merk') }}</span>
                                    <span
                                        style="font-weight: normal; color: #555; margin-left: 10px;">{{ $produk->merk }}</span>
                                </p>
                                <p style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fa fa-circle text-primary small-bullet" style="margin-right: 10px;"></i>
                                    <span style="width: 100px; font-weight: bold;">{{ __('messages.type') }}</span>
                                    <span
                                        style="font-weight: normal; color: #555; margin-left: 10px;">{{ $produk->tipe }}</span>
                                </p>
                                <p style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fa fa-circle text-primary small-bullet" style="margin-right: 10px;"></i>
                                    <span style="width: 100px; font-weight: bold;">{{ __('messages.link') }}</span>
                                    <span style="font-weight: normal; color: #555; margin-left: 10px;">
                                        <a href="{{ $produk->link }}" target="_blank" style="text-decoration: none;">
                                            {{ __('messages.click_here') }}
                                            <i class='bx bx-hand-up' style="margin-left: 5px;"></i>
                                        </a>
                                    </span>
                                </p>
                                {{-- <a href="#" class="btn btn-primary rounded-pill py-3 px-5">
                                    <i class="fas fa-shopping-cart" style="margin-right: 8px;"></i>
                                    Add to cart
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">
                                    <b>{{ __('messages.description_product') }}</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">
                                    <b>{{ __('messages.specification_product') }}</b>
                                </a>
                            </li>
                            {{-- <div class="tab-pane fade" id="tabs-2" role="tabpanel">

                            </div> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc"><br>
                                    <h4 style="font-weight: bold;">{{ __('messages.description_product') }}</h4>
                                    <p style="text-align: justify;">{!! $produk->deskripsi !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc"><br>
                                    <h4 style="font-weight: bold;">{{ __('messages.specification_product') }}</h4>
                                    <ul>
                                        @foreach (explode("\n", $produk->spesifikasi) as $spesifikasi)
                                            <li>{{ $spesifikasi }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom CSS -->
            <style>
                /* Flexbox for tab navigation */
                .nav-tabs {
                    display: flex;
                    justify-content: space-between;
                }

                .nav-tabs .nav-item {
                    flex: 1;
                }

                .nav-tabs .nav-link {
                    text-align: center;
                    padding: 10px 20px;
                    white-space: nowrap;
                    /* Prevent text wrapping */
                }

                /* Remove horizontal scroll for mobile */
                @media (max-width: 768px) {
                    .nav-tabs {
                        flex-direction: row;
                        /* Ensure tabs are in a row */
                    }
                }
            </style>

        </div>
    </div>
    <!-- Spacer -->
    <div class="my-5"></div>

    <div class="container mt-4 py-5 mb-5"
        style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <!-- Similar Products Section -->
        <h2 class="text-center text-uppercase font-weight-bold mb-5" style="letter-spacing: 2px;">
            {{ __('messages.similar_product') }}</h2>
        <div class="bg-light p-5 rounded" style="box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);">
            <div class="row">
                @foreach ($produkSerupa as $similarProduct)
                    <div class="col-md-3 mb-4">
                        <div class="product-card text-center"
                            style="border-radius: 10px; overflow: hidden; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
                            @php
                                $name = $similarProduct->nama;
                                $limitedName = strlen($name) > 22 ? substr($name, 0, 22) . '...' : $name;
                            @endphp
                            <a href="{{ route('product.show', $similarProduct->id) }}" class="d-block"
                                style="text-decoration: none;">
                                <img src="{{ asset($similarProduct->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                    class="img-fluid w-100" alt="{{ $similarProduct->nama }}"
                                    style="max-height: 220px; object-fit: cover; transition: transform 0.3s ease;">
                            </a>
                            <div class="p-3" style="background-color: #fff;">
                                <h5 class="mt-2 text-dark font-weight-bold">{{ $limitedName }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>

    <!-- Custom CSS -->
    <style>
        /* Hover effect on product cards */
        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-card img:hover {
            transform: scale(1.1);
        }

        /* Text Styles */
        .text-primary {
            color: #007bff !important;
        }

        /* Font weight and shadow for heading */
        h1,
        h2 {
            font-weight: 700;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
