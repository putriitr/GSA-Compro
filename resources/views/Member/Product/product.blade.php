@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex">
            <!-- Sidebar Kategori -->
            <div class="col-lg-3">
                <div class="position-relative">
                    <div class="rounded bg-primary p-4 position-absolute d-flex justify-content-center align-items-center"
                        style="width: 100%; height: 20px; top: -10px; left: 50%; transform: translateX(-50%); z-index: 1;">
                        <p class="mb-0 text-white" style="font-weight: bold;">{{ __('messages.category') }}
                            <i class="fas fa-chevron-down ms-2"></i>
                        </p>
                    </div>
                </div>
                <div class="mb-4 shadow-sm mt-5">
                    <!-- Menampilkan 10 kategori pertama -->
                    <ul class="list-group">
                        @foreach ($kategori->take(10) as $kat)
                            <li class="list-group-item category-item text-center py-3 mb-2"
                                style="background-color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#6196FF' : '#f8f9fa' }};
                                    color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#fff' : '#000' }};"
                                onclick="window.location.href='{{ route('filterByCategory', $kat->id) }}'">
                                <strong>{{ $kat->nama }}</strong>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tombol untuk melihat kategori selebihnya -->
                    @if ($kategori->count() > 10)
                        <button class="btn btn-link w-100 text-center mt-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#moreCategories" aria-expanded="false" aria-controls="moreCategories"
                            onclick="toggleButtonText(this)">
                            {{ __('messages.show_more_categories') }}
                        </button>

                        <!-- Dropdown kategori selebihnya -->
                        <div class="collapse" id="moreCategories">
                            <ul class="list-group mt-2">
                                @foreach ($kategori->slice(10) as $kat)
                                    <li class="list-group-item category-item text-center py-3 mb-2"
                                        style="background-color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#6196FF' : '#f8f9fa' }};
                                               color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#fff' : '#000' }};"
                                        onclick="window.location.href='{{ route('filterByCategory', $kat->id) }}'">
                                        <strong>{{ $kat->nama }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Produk -->
            <div class="col-lg-9 mt-n2">
                <div class="d-flex justify-content-between mb-4 align-items-center">
                    <!-- Form Pencarian -->
                    <div class="col-lg-6">
                        <form method="POST" action="{{ url('products/search') }}" class="d-flex align-items-center">
                            @csrf
                            <input type="text" name="keyword" id="find" placeholder="{{ __('messages.search') }}"
                                style="flex-grow: 1; padding: 12px; border: none; border-radius: 10px; background-color: #eee;" />
                            <button type="submit" class="btn btn-primary ms-2 px-4"
                                style="margin-left: 10px; padding: 16px; border: none; border-radius: 10px; background-color: #3CBEEE; color: white;">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-3 mt-n2">
                        <select class="form-select border-0 bg-light shadow-sm" style="border-radius: 10px; padding: 12px">
                            <option selected>{{ __('messages.sort_by') }}</option>
                            <option value="1">{{ __('messages.newest') }}</option>
                            <option value="2">{{ __('messages.latest') }}</option>
                        </select>
                    </div>
                </div>
                <!-- Pesan Alert Sukses -->
                <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert"
                    style="display: none;">
                    <span id="success-text"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div class="row">
                    @foreach ($produks as $produk)
                        <div class="col-md-4 mb-4">
                            <div class="blog-item shadow-sm">
                                <div class="blog-img">
                                    <a href="{{ route('product.show', $produk->id) }}">
                                        <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                            class="img-fluid w-100 rounded-top" alt="{{ $produk->nama }}"
                                            style="height: 300px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="blog-content p-4">
                                    @php
                                        $name = $produk->nama;
                                        $limitedName = strlen($name) > 26 ? substr($name, 0, 26) . '..' : $name;
                                    @endphp
                                    <h4 class="mb-3">{{ $limitedName }}</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('product.show', $produk->id) }}"
                                            class="btn btn-primary py-2 px-4" style="border-radius: 15px;">
                                            {{ __('messages.more') }} <i class="fas fa-arrow-right ms-2"></i>
                                        </a>

                                        <!-- Form untuk Distributor -->
                                        @if (auth()->user() && auth()->user()->type === 'distributor')
                                            <form action="{{ route('quotations.add_to_cart') }}" method="POST"
                                                class="d-flex justify-content-center align-items-center add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                <div class="input-group input-group-sm"
                                                    style="height: 40px; width: auto; margin-top: 17px;">
                                                    <input type="number" name="quantity" min="1" value="1"
                                                        class="form-control form-control-sm me-2" style="width: 60px;">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-shopping-cart me-2"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><br><br><br>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $produks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

<script>
    function toggleButtonText(button) {
        const showText = '{{ __('messages.show_more_categories') }}';
        const hideText = '{{ __('messages.show_less_categories') }}';

        if (button.textContent.trim() === showText) {
            button.textContent = hideText;
            button.classList.add('btn-danger');
            button.classList.remove('btn-link');
        } else {
            button.textContent = showText;
            button.classList.add('btn-link');
            button.classList.remove('btn-danger');
        }
    }
</script>
<script>
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form biasa

            const formData = new FormData(this);
            const url = this.action;

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Menampilkan pesan sukses di halaman
                        const successMessage = document.getElementById('success-message');
                        const successText = document.getElementById('success-text');
                        successText.textContent = data.message;
                        successMessage.style.display = 'block';

                        // Perbarui badge jumlah keranjang jika ada
                        const cartCount = document.getElementById('cart-count');
                        if (cartCount) {
                            cartCount.textContent = parseInt(cartCount.textContent) + parseInt(
                                formData.get('quantity'));
                        }

                        // Sembunyikan pesan setelah 3 detik
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                        }, 3000);
                    } else {
                        // Menampilkan pesan error
                        alert(data.message || 'Terjadi kesalahan.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>

<style>
    .blog-item {
        border-radius: 15px;
        transition: transform 0.3s ease;
        border: 1px solid #3CBEEE;
        background-color: #fff;
        overflow: hidden;
    }

    .blog-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .category-item {
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 8px;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    .category-item:hover {
        background-color: #6196FF !important;
        color: #fff !important;
        border-color: #6196FF;
    }

    .category-item.active {
        background-color: #6196FF !important;
        color: #fff !important;
        border-color: #6196FF;
    }
</style>
