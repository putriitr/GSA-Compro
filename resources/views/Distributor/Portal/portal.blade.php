@extends('layouts.Member.master')

@section('content')
    <!-- Services Start -->
    <div class="container-fluid service py-5"
        style="margin-top: 0; background-image: url('http://localhost:8080/GSA-Compro/public/assets/img/bg-1.jpg'); background-size: cover; background-position: center;">
        <div class="container service-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.portal_partner') }}</h4>
                <h1 class="display-5 text-white mb-4">{{ __('messages.portal_partner') }}</h1>
                <p class="mb-0 text-white">{{ __('messages.portal-dist_desc') }}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Pilih Produk & Minta Quotation -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-receipt fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.pro_quo') }}</a>
                            <p class="mb-0">{{ __('messages.pro_quo_desc') }}</p>
                            <a href="{{ route('distribution.request-quotation') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-1 wow fadeInUp"></div>

                <!-- Kelola Invoice -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-file doc fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.invoice') }}</a>
                            <p class="mb-0">{{ __('messages.invoice_desc') }}</p>
                            <a href="{{ route('distribution.invoices') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-1 wow fadeInUp"></div>

                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-conversation fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.nego') }}</a>
                            <p class="mb-0">{{ __('messages.nego_desc') }}</p>
                            <a href="{{ route('distributor.quotations.negotiations.index') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div><br><br>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-cart fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.po') }}</a>
                            <p class="mb-0">{{ __('messages.po_desc') }}</p>
                            <a href="{{ route('distributor.purchase-orders.index') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-1 wow fadeInUp"></div>

                <!-- Ticketing -->
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="bx bx-support fa-10x"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.ticketing') }}</a>
                            <p class="mb-0">{{ __('messages.ticketing_desc') }}</p>
                            <a href="{{ route('distribution.tickets.index') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection
