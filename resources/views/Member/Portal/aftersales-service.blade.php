@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/page-header.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.aftersales_service') }}
            </h3>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal_member') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.aftersales_service') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Main Content Start -->
    <div class="container py-5">
        <div class="row g-4">
            @forelse($aftersalesservices as $aftersalesservice)
                <div class="mb-5">
                    <div class="accordion" id="afterSalesAccordion-{{ $aftersalesservice->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $aftersalesservice->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $aftersalesservice->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $aftersalesservice->id }}">
                                    {{ $aftersalesservice->judul }}
                                </button>
                            </h2>
                            <div id="collapse{{ $aftersalesservice->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $aftersalesservice->id }}"
                                data-bs-parent="#afterSalesAccordion-{{ $aftersalesservice->id }}">
                                <div class="accordion-body">
                                    <p>{{ $aftersalesservice->deskripsi }}</p>
                                    @if ($aftersalesservice->image)
                                        <img src="{{ asset($aftersalesservice->image) }}"
                                            alt="Image related to after sales service" class="img-fluid mt-3">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <p class="mb-0">No AfterSales Service available.</p>
                        <p class="mb-0">Tidak ada layanan yang tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Main Content End -->
@endsection
