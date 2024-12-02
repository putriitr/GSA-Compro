@extends('layouts.Member.master')

@section('content')
    <!-- Activity Detail Start -->
    <div id="act-1" class="container-fluid appointment py-5">
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

            @if (!$activity)
                <div class="alert alert-warning">No activity found.</div>
            @else
                <div class="row g-5 align-items-center">
                    <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="section-title text-start">
                            <h1 class="display-4 mb-4">{{ $activity->title }}</h1>
                            <p class="mb-4" style="font-size: 0.875rem; color: #6c757d; margin: 0; line-height: 1.5; overflow: hidden; white-space: normal; word-wrap: break-word; text-align: justify; font-weight: bold;">
                                <i class="fa fa-calendar-alt text-primary"></i>
                                {{ $activity->date->format('d M Y') }}
                            </p>
                            <div class="row g-4">
                                <div class="col-sm-12">
                                    <div class="video h-100">
                                        <img src="{{ asset($activity->image_url) }}" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 400px; margin-bottom: 10px;" alt="Activity Image">
                                    </div>
                                </div>
                            </div>

                            <h3 class="mb-4" style="font-size: 1rem; color: black; margin: 0; line-height: 1.5; text-align: justify; margin-top: 10px;">
                                {{ $activity->description }}
                            </h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('member.activity') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-chevron-left me-1" style="color: #6196FF;"></i> {{ __('messages.back') }}
                </a>
            @endif
        </div>
    </div>
@endsection
