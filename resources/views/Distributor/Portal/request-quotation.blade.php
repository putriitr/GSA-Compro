@extends('layouts.Member.master')

@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.pro_quo') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.pro_quo') }}</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.pilih_quo') }}</strong></h4>
                    <div class="d-flex">
                        <a href="{{ url('/en/products') }}" class="btn btn-success me-2">
                            <i class="fas fa-plus-circle me-2"></i>{{ __('messages.create_tiket') }}
                        </a>
                        <a href="{{ route('quotations.cart') }}" class="btn btn-warning">
                            <i class="fas fa-shopping-cart me-2"></i>{{ __('messages.cart') }}
                        </a>
                    </div>
                </div>

                <p>{{ __('messages.req_quo') }}</p>

                <!-- Quotation Requests Table -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <h4 class="mt-5"><strong>{{ __('messages.daftar_quo') }}</strong></h4>
                        <table class="table table-borderless mb-0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%;">{{ __('messages.id') }}</th>
                                    <th style="width: 20%;">{{ __('messages.date') }}</th>
                                    <th style="width: 35%;">{{ __('messages.produk_name') }}</th>
                                    <th style="width: 10%;">{{ __('messages.quantity') }}</th>
                                    <th style="width: 15%;">{{ __('messages.status') }}</th>
                                    <th style="width: 15%;">{{ __('messages.aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotations as $key => $quotation)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($quotation->created_at)->translatedFormat('l, d-m-Y') }}</td>
                                        <td>
                                            @foreach ($quotation->quotationProducts as $product)
                                                - {{ $product->equipment_name ?? 'Produk tidak tersedia' }} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($quotation->quotationProducts as $product)
                                                {{ $product->quantity }} <br>
                                            @endforeach
                                        </td>
                                        <td>{{ ucfirst($quotation->status) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-sm btn-info">{{ __('messages.view') }}</a>

                                            <form action="{{ route('quotations.cancel', $quotation->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan permintaan quotation ini?');">
                                                    {{ __('messages.batal') }}
                                                </button>
                                            </form>

                                            @if($quotation->status === 'quotation')
                                                <!-- Tampilkan tombol Nego dan Create PO jika status sudah Quotation -->
                                                <a href="{{ route('distributor.quotations.negotiations.create', $quotation->id) }}" class="btn btn-sm btn-warning">Nego</a>
                                                @if (!$quotation->purchaseOrder)
                                                    <a href="{{ route('quotations.create_po', $quotation->id) }}" class="btn btn-sm btn-success">Create PO</a>
                                                @endif
                                            @endif
                                        </td>
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
