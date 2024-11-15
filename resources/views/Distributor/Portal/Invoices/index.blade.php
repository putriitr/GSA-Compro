@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.invoice') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.invoice') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0"><strong>{{ __('messages.daftar_invoice') }}</strong></h4>
                    <a href="{{ route('distribution') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i>{{ __('messages.back') }}
                    </a>
                </div>
                <p>{{ __('messages.req_quo') }}</p>
                <div class="container mt-6 mb-0">
                    @if ($invoices->isEmpty())
                        <div class="alert alert-info">
                            <p>{{ __('messages.blm_invoice') }}</p>
                        </div>
                    @else
                        <div class="card shadow border-0" style="border-radius: 8px; overflow: hidden;">
                            <div class="card-body p-0">
                                <div style="border-radius: 8px; overflow: hidden;">
                                    <table class="table table-hover mb-0">
                                        <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                            <tr>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    {{ __('messages.id') }}
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    Invoice Number
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    Invoice Date
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    Expiration Date
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    Subtotal
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    PPN
                                                </th>
                                                <th style="border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    Grand Total
                                                </th>
                                                <th style="width: 15%; border-right: 1px solid #ddd; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    {{ __('messages.status') }}
                                                </th>
                                                <th style="width: 15%; padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                    {{ __('messages.aksi') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr class="text-center" style="transition: all 0.3s ease;">
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ $invoice->id }}</td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ $invoice->invoice_number }}</td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}
                                                    </td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') ?? '-' }}
                                                    </td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ number_format($invoice->subtotal, 2) }}
                                                    </td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ number_format($invoice->ppn, 2) }}
                                                    </td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ number_format($invoice->grand_total_include_ppn, 2) }}
                                                    </td>
                                                    <td style="border-right: 1px solid #ddd; padding: 10px 15px;">
                                                        {{ ucfirst($invoice->status) }}
                                                    </td>
                                                    <td style="padding: 10px 15px;">
                                                        <!-- Tombol untuk melihat dan mengunduh PDF Invoice -->
                                                        <a href="{{ asset($invoice->file_path) }}" target="_blank"
                                                            class="btn btn-info btn-sm rounded-pill me-2"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="{{ asset($invoice->file_path) }}" download
                                                            class="btn btn-secondary btn-sm rounded-pill"><i
                                                                class="fas fa-download"></i></a>
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
