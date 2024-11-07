@extends('layouts.Member.master')

@section('content')
    <!-- Services Start -->
    <div class="container-fluid service py-5"
        style="margin-top: 0; background-image: url('http://localhost:8080/GSA-Compro/public/storage/bg-1.jpg'); background-size: cover; background-position: center;">
        <div class="container service-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Portal Distributor</h4>
                <h1 class="display-5 text-white mb-4">Portal Distributor</h1>
                <p class="mb-0 text-white">{{ __('messages.portal-dist_desc') }}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Pilih Produk & Minta Quotation -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-package fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.pro_quo') }}</a>
                            <p class="mb-0">{{ __('messages.my_product_desc') }}</p>
                            <a href="{{ route('distribution.request-quotation') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>

                

                <!-- Kirim Purchase Order (PO) -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded">
                        <div class="service-img rounded-top"
                            style="display: flex; justify-content: center; align-items: center; height: 200px; width: 200px; margin: 0 auto; background-color: #f8f9fa;">
                            <i class='bx bx-file' style="font-size: 200px; color: #000000;"></i>
                        </div>
                        <div class="service-content rounded-bottom bg-light p-4">
                            <div class="service-content-inner">
                                <h5 class="mb-4">{{ __('messages.po') }}</h5>
                                <a href="{{ route('distribution.create-po') }}"
                                    class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">{{ __('messages.show_more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelola Invoice -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded">
                        <div class="service-img rounded-top"
                            style="display: flex; justify-content: center; align-items: center; height: 200px; width: 200px; margin: 0 auto; background-color: #f8f9fa;">
                            <i class='bx bx-receipt' style="font-size: 200px; color: #000000;"></i>
                        </div>
                        <div class="service-content rounded-bottom bg-light p-4">
                            <div class="service-content-inner">
                                <h5 class="mb-4">{{ __('messages.invoice') }}</h5>
                                <a href="{{ route('distribution.invoices') }}"
                                    class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">{{ __('messages.show_more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ticketing -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded">
                        <div class="service-img rounded-top"
                            style="display: flex; justify-content: center; align-items: center; height: 200px; width: 200px; margin: 0 auto; background-color: #f8f9fa;">
                            <i class='bx bx-receipt' style="font-size: 200px; color: #000000;"></i>
                        </div>
                        <div class="service-content rounded-bottom bg-light p-4">
                            <div class="service-content-inner">
                                <h5 class="mb-4">{{ __('messages.ticketing') }}</h5>
                                <a href="{{ route('distribution.tickets.index') }}"
                                    class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">{{ __('messages.show_more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection
