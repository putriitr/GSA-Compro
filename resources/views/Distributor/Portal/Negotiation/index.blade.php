@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.nego') }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.nego') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>Daftar Negosiasi</strong></h4>
                </div>

                <!-- Negotiation Table -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <table class="table table-border mb-0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%;">{{ __('messages.id') }}</th>
                                    <th style="width: 20%;">Quotation Number</th>
                                    <th style="width: 20%;">Negotiated Price</th>
                                    <th style="width: 10%;">{{ __('messages.status') }}</th>
                                    <th style="width: 25%;">Notes</th>
                                    <th style="width: 20%;">Admin Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($negotiations as $negotiation)
                                    <tr>
                                        <td>{{ $negotiation->id }}</td>
                                        <td>{{ $negotiation->quotation->quotation_number }}</td>
                                        <td>{{ number_format($negotiation->negotiated_price, 2) }}</td>
                                        <td>{{ ucfirst($negotiation->status) }}</td>
                                        <td>{{ $negotiation->notes }}</td>
                                        <td>{{ $negotiation->admin_notes ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">{{ __('messages.blm_quo') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
