@extends('layouts.member.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="packages-item h-100">
                        <h4 class="text-primary">{{ $meta->slug}}</h4>
                        <h1 class="display-5 mb-4">{{ $meta->title }}</h1>
                        <p class="mb-4" style="text-align: justify;">{!! $meta->content !!}</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Created on : {{ $meta->created_at->format('d F Y') }}</p><br>
                        <a href="{{ route('member.meta.index', $meta->slug) }}" class="btn btn-primary rounded-pill py-3 px-5">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            border-radius: 0.5rem;
        }

        .content-wrapper {
            padding: 1.5rem;
            border: 1px solid #e2e6ea;
            border-radius: 0.5rem;
            background-color: #f8f9fa;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: #f8c146;
        }

        @media (max-width: 767.98px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
@endsection
