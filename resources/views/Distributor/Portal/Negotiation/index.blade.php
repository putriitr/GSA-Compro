@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('assets/img/bg-product.jpg') }}'); background-size: cover;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.nego') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">{{ __('messages.home') }}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}"
                        class="text-white">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.nego') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0"><strong>{{ __('messages.daftar_nego') }}</strong></h4>
                    <a href="{{ route('distribution') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('messages.back') }}
                    </a>
                </div>

                <!-- Negotiation Table -->
                <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                    <div class="card-body p-0">
                        <!-- Membungkus tabel dengan div untuk mengaktifkan border-radius -->
                        <div style="border-radius: 8px; overflow: hidden;">
                            <table class="table table-hover mb-0">
                                <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                    <tr>
                                        <th style="width: 5%; border-right: 1px solid #dee2e6;">{{ __('messages.id') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #dee2e6;">Quotation Number</th>
                                        <th style="width: 20%; border-right: 1px solid #dee2e6;">Negotiated Price</th>
                                        <th style="width: 10%; border-right: 1px solid #dee2e6;">{{ __('messages.status') }}</th>
                                        <th style="width: 25%; border-right: 1px solid #dee2e6;">Notes</th>
                                        <th style="width: 20%;">Admin Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($negotiations as $negotiation)
                                        <tr class="text-center align-middle">
                                            <td style="border-right: 1px solid #dee2e6;">{{ $negotiation->id }}</td>
                                            <td style="border-right: 1px solid #dee2e6;">{{ $negotiation->quotation->quotation_number }}</td>
                                            <td style="border-right: 1px solid #dee2e6;" class="text-success">
                                                {{ number_format($negotiation->negotiated_price, 2) }}
                                            </td>
                                            <td style="border-right: 1px solid #dee2e6;">
                                                <span class="badge
                                                    @if ($negotiation->status === 'accepted') bg-success
                                                    @elseif ($negotiation->status === 'In_progress') bg-warning
                                                    @elseif ($negotiation->status === 'rejected') bg-danger
                                                    @else bg-secondary
                                                    @endif">
                                                    {{ ucfirst($negotiation->status) }}
                                                </span>
                                            </td>
                                            <td style="border-right: 1px solid #dee2e6;" class="text-muted">
                                                {{ $negotiation->notes }}
                                            </td>
                                            <td class="text-muted">{{ $negotiation->admin_notes ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">{{ __('messages.blm_quo') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
