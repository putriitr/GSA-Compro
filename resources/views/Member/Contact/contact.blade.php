@extends('layouts.member.master')

@php
$compro = \App\Models\CompanyParameter::first();
$brand = \App\Models\BrandPartner::where('type', 'brand', 'nama')->get();
@endphp

@section('content')
 <!-- Header Start -->
 <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/page-header.jpg') }}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.contact_us') }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item active text-primary">{{ __('messages.contact_us') }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-12 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                <div>
                    <div class="pb-5">
                        <h4 class="text-primary">{{ __('messages.hubungi_langsung') }}</h4>
                        <p class="mb-0">{{ __('messages.contact_desc') }}</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="contact-add-item rounded bg-light p-4">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>{{ __('messages.address') }}</h4>
                                    <p class="mb-0">{{ $compro->alamat }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-add-item rounded bg-light p-4">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-0">{{ $compro->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-add-item rounded bg-light p-4">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fab fa-whatsapp fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Whatsapp</h4>
                                    <p class="mb-0">{{ $compro->no_wa }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-add-item rounded bg-light p-4">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fas fa-globe fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Website</h4>
                                    <p class="mb-0">{{ $compro->website }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-around bg-light rounded p-4">
                                <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="bg-light p-5 rounded h-100">
                    <h4 class="text-primary mb-4">{{ __('messages.leave_message') }}</h4>
                    <form>
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="name" placeholder="Your Name">
                                    <label for="name">{{ __('messages.your_name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email" placeholder="Your Email">
                                    <label for="email">{{ __('messages.your_email') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control border-0" id="phone" placeholder="Phone">
                                    <label for="phone">{{ __('messages.phone') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="project" placeholder="Project">
                                    <label for="project">{{ __('messages.your_company') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                    <label for="message">{{ __('messages.your_message') }}</label>
                                </div>

                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3">{{ __('messages.send_message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="rounded">
                    <iframe class="rounded w-100"
                    style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
