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
                                <thead style="background-color: #4C6B8C;" class="text-white text-center">
                                    <tr>
                                        <th style="width: 5%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.id') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.quo_number') }}</th>
                                        <th style="width: 10%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.status') }}</th>
                                        <th style="width: 25%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.note') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.admin_note') }}</th>
                                        <th style="width: 20%; border-right: 1px solid #ddd; vertical-align:middle;">{{ __('messages.aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #f9f9f9;">
                                    @foreach($negotiations as $negotiation)
                                        <tr style="vertical-align: middle;">
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $negotiation->id }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $negotiation->quotation->quotation_number }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                <span class="badge {{ $negotiation->status == 'accepted' ? 'bg-success' : ($negotiation->status == 'rejected' ? 'bg-danger' : 'bg-warning') }} text-uppercase">
                                                    {{ ucfirst($negotiation->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $negotiation->notes }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">{{ $negotiation->admin_notes ?? 'N/A' }}</td>
                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                @if ($negotiation->status === 'accepted' && !$negotiation->quotation->purchaseOrder)
                                                <!-- Tombol Create PO hanya muncul jika PO belum dibuat -->
                                                <a href="{{ route('quotations.create_po', $negotiation->quotation->id) }}" class="btn btn-success btn-sm rounded-pill">
                                                    <i class="fas fa-file-invoice-dollar"></i> Create PO
                                                </a>
                                                @elseif ($negotiation->status === 'pending' || $negotiation->status === 'in_progress')
                                                    <!-- Tombol Nego -->
                                                    <a href="{{ route('distributor.quotations.negotiations.create', $negotiation->quotation->id) }}" class="btn btn-warning btn-sm rounded-pill">
                                                        <i class="fas fa-handshake"></i> Nego
                                                    </a>
                                                @endif

                                                <!-- Tombol Download PDF -->
                                                @if ($negotiation->quotation->pdf_path)
                                                    <a href="{{ asset($negotiation->quotation->pdf_path) }}" download class="btn btn-warning btn-sm rounded-pill">
                                                        <i class="fas fa-download me-2"></i> Download PDF
                                                    </a>
                                                @else
                                                    <span class="text-muted d-block mt-2">No PDF Available</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
