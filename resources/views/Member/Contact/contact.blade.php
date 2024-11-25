@extends('layouts.member.master')

@php
    $compro = \App\Models\CompanyParameter::first();
    $brand = \App\Models\BrandPartner::where('type', 'brand', 'nama')->get();
@endphp

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/contact.jpg') }}'); background-size: cover; height: 300px;">
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
                            <h1 class="text-primary">{{ __('messages.hubungi_langsung') }}</h1>
                            <p class="mb-0">{{ __('messages.contact_desc') }}</p>
                        </div>
                        <div class="row g-4">
                            <!-- Address -->
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
                            <!-- Whatsapp -->
                            <div class="col-lg-6">
                                <div class="contact-add-item rounded bg-light p-4">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fab fa-whatsapp fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Whatsapp</h4>
                                        <p class="mb-0">Whatsapp 1 : <br>{{ $compro->no_telepon }}</p><br>
                                        <p class="mb-0">Whatsapp 2 : <br>{{ $compro->no_wa }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
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
                            <!-- Website -->
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
                            <!-- Social Media -->
                            {{-- <div class="col-12">
                                <div class="d-flex justify-content-around bg-light rounded p-4">
                                    <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-xl-square btn-primary rounded-circle" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="bg-light p-5 rounded h-100">
                        <h3 class="text-primary mb-4">{{ __('messages.leave_message') }}</h3>
                        <form action="{{ route('guest-messages.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="first_name"
                                            placeholder="Your First Name" name="first_name" required>
                                        <label for="first_name">{{ __('messages.first_name') }} <span
                                            class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="last_name"
                                            placeholder="Your Last Name" name="last_name" required>
                                        <label for="last_name">{{ __('messages.last_name') }} <span
                                            class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email"
                                            placeholder="Your Email" name="email" required>
                                        <label for="email">{{ __('messages.your_email') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0" id="phone"
                                            placeholder="Your Phone" name="phone" required pattern="^\62[0-9]{1,13}$"
                                            title="Phone number must start with 62 and be followed by 1 to 11 digits."
                                            inputmode="numeric" maxlength="13"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        <label for="phone">{{ __('messages.phone') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="company"
                                            placeholder="Your Company" name="company">
                                        <label for="company">{{ __('messages.your_company') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subject"
                                            placeholder="Your Subject" name="subject" required>
                                        <label for="subject">{{ __('messages.your_subject') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 150px"
                                            name="message" required></textarea>
                                        <label for="message">{{ __('messages.your_message') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">{{ __('messages.send_message') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="rounded">
                        <iframe class="rounded w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3160.1684442273086!2d107.1561942749911!3d-6.302885293686325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b18c0fabf4d%3A0x8b184e00d9610c51!2sPT%20GUDANG%20SOLUSI%20ACOMMERCE!5e1!3m2!1sid!2sid!4v1732164758719!5m2!1sid!2sid"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector('form'); // Pilih form Anda

        form.addEventListener('submit', function(e) {
            const phoneInput = document.getElementById('phone');
            const phonePattern = /^\62[0-9]{1,11}$/;

            // Validasi nomor telepon
            if (!phonePattern.test(phoneInput.value)) {
                e.preventDefault(); // Hentikan submit form jika tidak valid
                alert(
                'Please enter a valid phone number starting with 62 followed by up to 11 digits.');
                phoneInput.focus();
                return; // Keluar dari fungsi untuk menghindari submit
            }

            // Jika validasi berhasil, tampilkan pesan pop-up
            e.preventDefault(); // Hentikan submit form untuk menampilkan pesan sukses
            alert('Message sent successfully.');

            // Lanjutkan submit form setelah alert
            setTimeout(() => {
                form.submit();
            }, 1000);
        });
    });
</script>
