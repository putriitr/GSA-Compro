@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h2 class="mb-4"><strong>{{ __('messages.cart_quo') }}</strong></h2>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="text-end mb-3">
                    <a href="{{ url('/en/products') }}" class="btn btn-success"
                        style="border-radius: 10px; padding: 10px 20px;">
                        <i class="fas fa-plus-circle me-2"></i>{{ __('messages.create_tiket') }}
                    </a>
                </div>

                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <table class="table table-borderless mb-0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%;">{{ __('messages.id') }}</th>
                                    <th style="width: 60%;">{{ __('messages.produk_name') }}</th>
                                    <th style="width: 25%;">{{ __('messages.quantity') }}</th>
                                    <th style="width: 10%;">{{ __('messages.aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cartItems as $key => $item)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-left">{{ $item['nama'] }}</td>
                                        <td>
                                            <form action="{{ route('quotations.cart.update') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="produk_id" value="{{ $item['produk_id'] }}">
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                                    min="1" style="width: 40px;">
                                                <button type="submit" class="btn btn-sm text-white"
                                                    style="background-color: #fd7e14; border-color: #fd7e14;">{{ __('messages.update') }}</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('quotations.cart.remove') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="produk_id" value="{{ $item['produk_id'] }}">
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">{{ __('messages.hapus') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">{{ __('messages.empty_cart') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if (count($cartItems) > 0)
                    <form action="{{ route('quotations.submit') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.ajukan_quo') }} <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
