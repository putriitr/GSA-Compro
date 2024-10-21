@extends('layouts.member.master')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">{{ $meta->title }}</h1>
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <div class="content-wrapper">
                    {!! $meta->content !!}
                </div>
                <p class="text-muted mt-3">Created on : {{ $meta->created_at->format('d F Y') }}</p>
            </div>
        </div>
    </div>
@endsection
a
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
