@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.invoice') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">{{ __('messages.home') }}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}"
                        class="text-white">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.invoice') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0 wow fadeIn" data-wow-delay="0.1s"><strong>{{ __('messages.daftar_invoice') }}</strong>
                    </h4>
                    <a href="{{ route('distribution') }}" class="btn btn-sm btn-outline-primary wow fadeIn"
                        data-wow-delay="0.2s">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('messages.back') }}
                    </a>
                </div>
                <div class="container mt-6 mb-0">
                    @if ($invoices->isEmpty())
                        <div class="alert alert-info wow fadeIn" data-wow-delay="0.3s">
                            <p>{{ __('messages.blm_invoice') }}</p>
                        </div>
                    @else
                        <div class="card shadow border-0 rounded-lg wow fadeInUp" data-wow-delay="0.4s">
                            <div style="border-radius: 8px; overflow: hidden;">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" style="border-collapse: collapse;">
                                        <thead style="background-color: #4C6B8C;" class="text-white text-center">
                                            <tr>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.id') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.inv_number') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.inv_date') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.exp_date') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.subtotal') }}</th>
                                                <th style="border: 1px solid #ddd;">PPN</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.grand_total') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.status') }}</th>
                                                <th style="border: 1px solid #ddd;">{{ __('messages.aksi') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr class="text-center">
                                                    <td style="border: 1px solid #ddd;">{{ $invoice->id }}</td>
                                                    <td style="border: 1px solid #ddd;">{{ $invoice->invoice_number }}</td>
                                                    <td style="border: 1px solid #ddd;">
                                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}
                                                    </td>
                                                    <td style="border: 1px solid #ddd;">
                                                        {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') ?? '-' }}
                                                    </td>
                                                    <td style="border: 1px solid #ddd;">
                                                        {{ number_format($invoice->subtotal, 2) }}</td>
                                                    <td style="border: 1px solid #ddd;">
                                                        {{ number_format($invoice->ppn, 2) }}</td>
                                                    <td style="border: 1px solid #ddd;">
                                                        {{ number_format($invoice->grand_total_include_ppn, 2) }}</td>
                                                        <td style="border: 1px solid #ddd;">
                                                            @if ($invoice->status === 'paid')
                                                                <span class="badge bg-success">
                                                                    <i class="fas fa-check-circle me-2"></i>{{ ucfirst($invoice->status) }}
                                                                </span>
                                                            @elseif ($invoice->status === 'unpaid')
                                                                <span class="badge bg-danger">
                                                                    <i class="fas fa-times-circle me-2"></i>{{ ucfirst($invoice->status) }}
                                                                </span>
                                                            @endif
                                                        </td>

                                                    <td style="border: 1px solid #ddd;">
                                                        <a href="{{ asset($invoice->file_path) }}" target="_blank"
                                                            class="btn btn-info btn-sm rounded-pill me-2 wow fadeIn"
                                                            data-wow-delay="0.5s"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ asset($invoice->file_path) }}" download
                                                            class="btn btn-warning btn-sm rounded-pill wow fadeIn"
                                                            data-wow-delay="0.6s"><i class="fas fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
