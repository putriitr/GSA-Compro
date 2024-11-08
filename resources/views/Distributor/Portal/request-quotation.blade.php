@extends('layouts.Member.master')

@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Produk & Quotation
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal') }}</a></li>
                <li class="breadcrumb-item active text-primary">Produk & Quotation</li>
            </ol>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>Pilih Produk & Permintaan Quotation</strong></h4>
                    <a href="{{ url('/en/products') }}" class="btn btn-primary"><i
                            class="fas fa-plus-circle me-2"></i>{{ __('messages.create_tiket') }}</a>
                </div>
                <p>Di sini Anda dapat memilih produk dan mengajukan permintaan quotation.</p>

                <!-- Quotation Requests Table -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <h3 class="mt-5">Daftar Permintaan Quotation</h3>
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%; text-align: center;">ID</th>
                                    <th style="width: 45%;">Nama Produk</th>
                                    <th style="width: 15%; text-align: center;">Quantity</th>
                                    <th style="width: 15%; text-align: center;">{{ __('messages.status') }}</th>
                                    <th style="width: 20%; text-align: center;">{{ __('messages.aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotations as $key => $quotation)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <!-- Use the 'produk' relationship to access the product name -->
                                        <td>{{ $quotation->produk->nama ?? 'Produk tidak tersedia' }}</td>
                                        <td>{{ $quotation->quantity }}</td>
                                        <td>{{ ucfirst($quotation->status) }}</td>
                                        <td class="text-center">
                                            <!-- View Action -->
                                            <a href="{{ route('quotations.show', $quotation->id) }}"
                                                class="btn btn-sm btn-info">{{ __('messages.view') }}</a>

                                            <!-- Cancel Action -->
                                            <form action="{{ route('quotations.cancel', $quotation->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan permintaan quotation ini?');">
                                                    {{ __('messages.hapus') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada permintaan
                                            quotation.</td>
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
