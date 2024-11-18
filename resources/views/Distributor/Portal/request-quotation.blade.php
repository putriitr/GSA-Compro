@extends('layouts.Member.master')

@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.pro_quo') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.pro_quo') }}</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.pilih_quo') }}</strong></h4>
                    <div class="d-flex">
                        <a href="{{ url('/en/products') }}" class="btn btn-success me-2">
                            <i class="fas fa-plus-circle me-2"></i>{{ __('messages.create_quo') }}
                        </a>
                        <a href="{{ route('quotations.cart') }}" class="btn btn-warning">
                            <i class="fas fa-shopping-cart me-2"></i>{{ __('messages.cart') }}
                        </a>
                    </div>
                </div>

                <p>{{ __('messages.req_quo') }}</p>

                <!-- Quotation Requests Table -->
                <br>
                <div class="border-0" style="border-radius: 8px; overflow: hidden;">
                    <div class="card-body p-0">
                        <h4><strong>{{ __('messages.daftar_quo') }}</strong></h4>
                        <div style="border-radius: 8px; overflow: hidden;">
                            <table class="table table-border mb-0">
                                <thead style="background-color: #b0c4de;" class="text-dark text-center">
                                    <tr>
                                        <th style="width: 5%; border-right: 1px solid #dee2e6;">{{ __('messages.id') }}
                                        </th>
                                        <th style="width: 20%; border-right: 1px solid #dee2e6;">
                                            {{ __('messages.nomor_pengajuan') }}</th>
                                        <th style="width: 35%; border-right: 1px solid #dee2e6;">
                                            {{ __('messages.produk_name') }}</th>
                                        <th style="width: 10%; border-right: 1px solid #dee2e6;">
                                            {{ __('messages.quantity') }}</th>
                                        <th style="width: 15%; border-right: 1px solid #dee2e6;">
                                            {{ __('messages.status') }}</th>
                                        <th style="width: 15%; border-right: 1px solid #dee2e6;">{{ __('messages.aksi') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($quotations as $key => $quotation)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $quotation->nomor_pengajuan ?? 'Nomor pengajuan tidak tersedia' }}</td>
                                            <td>
                                                @foreach ($quotation->quotationProducts as $product)
                                                    {{ $product->equipment_name ?? 'Produk tidak tersedia' }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($quotation->quotationProducts as $product)
                                                    {{ $product->quantity }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <span
                                                    class="badge
                        @if ($quotation->status === 'cancelled') bg-danger
                        @elseif ($quotation->status === 'quotation') bg-success
                        @else bg-warning @endif">
                                                    {{ ucfirst($quotation->status) }}
                                                </span>
                                            </td>

                                            <!-- Actions -->
                                            <td class="text-center">
                                                <a href="{{ route('quotations.show', $quotation->id) }}"
                                                    class="btn btn-sm btn-info">{{ __('messages.view') }}</a>

                                                @if ($quotation->status === 'pending')
                                                    <form action="{{ route('quotations.cancel', $quotation->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan permintaan quotation ini?');">
                                                            {{ __('messages.batal') }}
                                                        </button>
                                                    </form>
                                                @elseif($quotation->status === 'quotation')
                                                    <!-- Tampilkan tombol Nego jika status adalah 'quotation' dan belum ada PO -->
                                                    @if (!$quotation->purchaseOrder)
                                                        <a href="{{ route('distributor.quotations.negotiations.create', $quotation->id) }}"
                                                            class="btn btn-sm btn-warning">Nego</a>
                                                        <a href="{{ route('quotations.create_po', $quotation->id) }}"
                                                            class="btn btn-sm btn-success">Create PO</a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">{{ __('messages.blm_quo') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('distribution') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
