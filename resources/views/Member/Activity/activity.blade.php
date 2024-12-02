@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/activity.jpg') }}'); background-size: cover; height: 300px;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.activity') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.activity') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Activity Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('messages.company_activity') }}</h4>
                <h1 class="display-5 mb-4">{{ __('messages.activity') }}</h1>
                <p class="mb-0">{{ __('messages.activity_desc') }}</p>
            </div>
            <div class="row mb-4">
                <!-- Showing X-Y of Z -->
                <div class="col-md-4 d-flex align-items-center">
                    @if ($activities->count() > 0)
                        <p class="mb-0">{{ __('messages.showing') }} {{ $activities->firstItem() }} - {{ $activities->lastItem() }} {{ __('messages.from') }}
                            {{ $activities->total() }}
                        </p>
                    @else
                        <p class="mb-0">Tidak ada aktivitas yang tersedia.</p>
                    @endif
                </div>
                <!-- Show per Page and Sort By -->
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <div class="d-flex align-items-center">
                        <label for="sort-by" class="mb-0 me-4" style="display: inline-block; white-space: nowrap;">
                            {{ __('messages.sort_by') }} :
                        </label>
                        <select id="sort-by" class="form-select form-select-sm">
                            <option value="newest">{{ __('messages.newest') }}</option>
                            <option value="latest">{{ __('messages.latest') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row mt-4">
                <div class="col-12">
                    {{ $activities->links() }} <!-- Memanggil links untuk paginasi -->
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($activities as $activity)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ asset($activity->image_url) }}" class="img-fluid w-100 rounded-top"
                                        style="border-radius: 15px; width: 100%; height: 250px; object-fit: cover;"
                                        alt="{{ $activity->title }}">
                                </a>
                                <div class="blog-category py-2 px-4">{{ $activity->category->name }}</div>
                                <div class="blog-date"><i
                                        class="fas fa-clock me-2"></i>{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $activity->title }}</a>
                                <p class="mb-4">{{ Str::limit($activity->description, 40) }}</p>
                                <a href="{{ route('member.activity.detail-act', $activity->id) }}"
                                    class="btn btn-primary rounded-pill py-2 px-4">{{ __('messages.show_more') }} <i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-12">
            {{ $activities->links() }}
        </div>
    </div> --}}
    <!-- Activity End -->
@endsection
