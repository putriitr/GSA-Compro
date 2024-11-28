@extends('layouts.Member.master')

@section('content')
    <!-- Services Start -->
    <div class="container-fluid service py-5"
        style="margin-top: 0; background-image: url('http://localhost:8080/GSA-Compro/public/assets/img/bg-1.jpg'); background-size: cover; background-position: center;">
        <div class="container service-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Portal Member</h4>
                <h1 class="display-5 text-white mb-4">Portal Member</h1>
                <p class="mb-0 text-white">{{ __('messages.portal_desc') }}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="fa fa-box fa-7x me-2"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.my_product') }}</a>
                            <p class="mb-0">{{ __('messages.my_product_desc') }}</p>
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
                                <i class="fa fa-book fa-7x me-2"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.user_manual') }}</a>
                            <p class="mb-0">{{ __('messages.user_manual_desc') }}</p>
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
                                <i class="fa fa-file-alt fa-7x me-2"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.doc_cert') }}</a>
                            <p class="mb-0">{{ __('messages.doc_cert_desc') }}</p>
                            <a href="{{ route('portal.document') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="fa fa-video fa-7x me-2"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.tutor') }}</a>
                            <p class="mb-0">{{ __('messages.tutor_desc') }}</p>
                            <a href="{{ route('portal.tutorials') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">{{ __('messages.show_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content text-center">
                            <div class="mb-4">
                                <i class="fa fa-headset fa-7x me-2"></i>
                            </div>
                            <h4 class="h4 d-inline-block mb-3">{{ __('messages.ticketing') }}</h4>
                            <p class="mb-0">{{ __('messages.ticketing_desc') }}</p>
                            <a href="{{ route('tickets.index') }}"
                                class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2"
                                style="transition: background-color 0.3s ease, color 0.3s ease; margin-top: 15px;">
                                {{ __('messages.show_more') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item p-4" style="transition: all 0.3s ease;">
                        <div class="service-content">
                            <div class="mb-4">
                                <i class="fa fa-question-circle fa-7x me-2"></i>
                            </div>
                            <a href="#" class="h4 d-inline-block mb-3">{{ __('messages.qna') }}</a>
                            <p class="mb-0">{{ __('messages.qna_desc') }}</p>
                            <a href="{{ route('portal.qna') }}"
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
