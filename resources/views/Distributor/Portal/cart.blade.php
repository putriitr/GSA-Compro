@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
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

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0 me-2"><strong>{{ __('messages.cart_quo') }}</strong> <i class="fas fa-shopping-cart"></i></h2>

                    </div>

                    <div class="text-end">
                        <a href="{{ url('/en/products') }}" class="btn btn-success" style="border-radius: 10px; padding: 10px 20px;">
                            <i class="fas fa-plus-circle me-2"></i>{{ __('messages.create_quo') }}
                        </a>
                    </div>
                </div>

                <div class="card shadow-sm border-0" style="border-radius: 8px; overflow: hidden;">
                    <div class="table-responsive card-body p-0" style="overflow-x:auto;">
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover mb-0">
                                <thead style="background-color: #4C6B8C;" class="text-white text-center">
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
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                                    min="1" class="form-control d-inline-block update-quantity"
                                                    style="width: 80px;" data-produk-id="{{ $item['produk_id'] }}">
                                            </td>
                                            <td>
                                                <form action="{{ route('quotations.cart.remove') }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="produk_id"
                                                        value="{{ $item['produk_id'] }}">
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">
                                                {{ __('messages.empty_cart') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><br>

                @if (count($cartItems) > 0)
                    <form action="{{ route('quotations.submit') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="topik" class="form-label"><strong>{{ __('messages.topik') }}</strong></label>
                            <input type="text" name="topik" id="topik" class="form-control"
                                placeholder="{{ __('messages.masukkan_keterangan') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.ajukan_quo') }} <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('distribution.request-quotation') }}" class="btn btn-outline-danger">
                <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
            </a>
        </div>
    </div>
    <!-- JavaScript for AJAX -->
    <script>
        document.querySelectorAll('.update-quantity').forEach(input => {
            input.addEventListener('change', function() {
                const produkId = this.getAttribute('data-produk-id');
                const quantity = this.value;

                fetch('{{ route('quotations.cart.update') }}', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            produk_id: produkId,
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Optional: Reload or update part of the page
                            console.log('Quantity updated successfully');
                        } else {
                            alert(data.message || 'Error updating quantity.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
