@extends('layouts.Member.master')

@section('content')
    <!-- Services Start -->
    <div class="container-fluid service py-5"
        style="margin-top: 0; background-image: url('http://localhost:8080/GSA-Compro/public/assets/img/bg-1.jpg'); background-size: cover; background-position: center;">
        <div class="container service-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Portal Vendor</h4>
                <h1 class="display-5 text-white mb-4">Portal Vendor</h1>
                <p class="mb-0 text-white">{{ __('messages.portal_desc') }}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lgv-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-package fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">Product & Price List</a>
                            <p class="mb-0">{{ __('messages.product_pricelist') }}</p>
                            <a href="{{ route('portal.user-product') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-book fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">Penawaran</a>
                            <p class="mb-0">{{ __('messages.penawaran_desc') }}</p>
                            <a href="{{ route('portal.instructions') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-file doc fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">Contracts</a>
                            <p class="mb-0">{{ __('messages.contract_desc') }}</p>
                            <a href="{{ route('portal.document') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lgv-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-package fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">Invoice</a>
                            <p class="mb-0">{{ __('messages.vendor_inv_desc') }}</p>
                            <a href="{{ route('portal.user-product') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-book fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">Warranty</a>
                            <p class="mb-0">{{ __('messages.warranty_desc') }}</p>
                            <a href="{{ route('portal.instructions') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <script>
        // Tambahkan event listener untuk hover pada elemen service-item
        document.querySelectorAll('.service-item').forEach(item => {
            item.addEventListener('mouseover', function() {
                const button = item.querySelector('.btn');
                button.style.backgroundColor = '#000'; // Ubah background jadi hitam
                button.style.color = '#fff'; // Ubah teks jadi putih
            });

            item.addEventListener('mouseout', function() {
                const button = item.querySelector('.btn');
                button.style.backgroundColor = '#3CBEEE'; // Kembalikan ke warna biru awal
                button.style.color = '#fff'; // Kembalikan teks jadi putih
            });
        });
    </script>
@endsection
