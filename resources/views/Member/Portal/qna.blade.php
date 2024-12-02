@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
           url('{{ asset('assets/img/bg-1.jpg') }}');
           background-size: cover;
           background-position: center;
           width: 100%;
           height: 400px;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.qna') }}</h3>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal_member') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.qna') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Main Content Start -->
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            @forelse($faqs as $faq)
                <div class="col-lg-10 mb-5">
                    <div class="accordion" id="qnaAccordion-{{ $faq->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}" style="font-weight: bold;">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">
                                    <strong>{{ $faq->pertanyaan }}</strong>
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $faq->id }}"
                                data-bs-parent="#qnaAccordion-{{ $faq->id }}">
                                <div class="accordion-body">
                                    <p>{{ $faq->jawaban }}</p>
                                    @if ($faq->image)
                                        <!-- Check if there is an associated image -->
                                        <img src="{{ asset($faq->image) }}" alt="Image related to FAQ"
                                            class="img-fluid mt-3">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-10">
                    <div class="alert alert-info text-center">
                        <p class="mb-0">No FAQ's available.</p>
                        <p class="mb-0">Tidak ada FAQ's yang tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Main Content End -->
@endsection
