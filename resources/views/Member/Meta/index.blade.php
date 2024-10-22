@extends('layouts.member.master')

@section('content')
    <!-- Service Start -->
    <div class="container-fluid service py-5"
        style="margin-top: 10px; background-image: url('{{ asset('storage/promo.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container service-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-5 text-primary mb-4">{{ __('messages.meta') }}</h1>
                <p class="mb-0 text-white">{{ __('messages.meta_desc') }}</p>
            </div>
            <div class="row g-4">
                @if ($metas->isEmpty())
                    <div class="col-12 text-center">
                        <p class="text-white">No active meta content available at the moment.</p>
                    </div>
                @else
                    @foreach ($metas as $meta)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="service-item p-4">
                                <div class="service-content">
                                    <div class="mb-4">
                                        <i class="fas fa-bullhorn fa-4x"></i>
                                    </div>
                                    <a href="{{ route('member.meta.show', $meta->slug) }}" class="h4 d-inline-block mb-3">
                                        {{ $meta->title }}
                                    </a>
                                    <p class="mb-0">
                                    <p><strong>Start Date :</strong> {{ $meta->start_date }}</p>
                                    <p><strong>End Date :</strong> {{ $meta->end_date }}</p>
                                    </p>
                                    <a href="{{ route('member.meta.show', $meta->slug) }}" class="btn btn-primary">
                                        {{ __('messages.show_more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
