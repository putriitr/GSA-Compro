@extends('layouts.member.master')

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
                    <!-- Menampilkan 7 kategori pertama -->
                    <ul class="list-group">
                        @foreach ($kategori->take(7) as $kat)
                            <li class="list-group-item category-item text-center py-3 mb-2"
                                style="background-color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#6196FF' : '#f8f9fa' }};
                                    color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#fff' : '#000' }};"
                                onclick="window.location.href='{{ route('filterByCategory', $kat->id) }}'">
                                <strong>{{ $kat->nama }}</strong>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tombol untuk melihat kategori selebihnya -->
                    @if ($kategori->count() > 7)
                        <button class="btn btn-link w-100 text-center mt-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#moreCategories" aria-expanded="false" aria-controls="moreCategories"
                            onclick="toggleButtonText(this)">
                            {{ __('messages.show_more_categories') }}
                        </button>

                        <!-- Dropdown kategori selebihnya -->
                        <div class="collapse" id="moreCategories">
                            <ul class="list-group mt-2">
                                @foreach ($kategori->slice(7) as $kat)
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

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-n5" id="productList">
                    @foreach ($produks as $produk)
                        <div class="col d-flex justify-content-center">
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
                                        $limitedName = strlen($name) > 22 ? substr($name, 0, 22) . '..' : $name;
                                    @endphp
                                    <h4 class="mb-3">{{ $limitedName }}</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('product.show', $produk->id) }}"
                                            class="btn btn-primary py-2 px-4" style="border-radius: 15px;">
                                            {{ __('messages.more') }} <i class="fas fa-arrow-right ms-2"></i>
                                        </a>

                                        <!-- Ajukan Quotation -->
                                        @if (auth()->user() && auth()->user()->type === 'distributor')
                                            <!-- Form untuk menambahkan produk ke keranjang -->
                                            <form action="{{ route('quotations.add_to_cart') }}" method="POST"
                                                class="d-inline-flex align-items-center">
                                                @csrf
                                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                <div class="input-group input-group-sm"
                                                    style="height: 40px; width: auto; margin-top: 17px;">
                                                    <input type="number" name="quantity" min="1" value="1"
                                                        class="form-control text-center" style="max-width: 60px;">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-shopping-cart me-2"></i> Ajukan Quotation
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
        </div>
    </div>
@endsection

<script>
    function toggleButtonText(button) {
        if (button.textContent.trim() === '{{ __('messages.show_more_categories') }}') {
            button.textContent = '{{ __('messages.show_less_categories') }}';
            button.classList.add('btn-danger');
            button.classList.remove('btn-link');
        } else {
            button.textContent = '{{ __('messages.show_more_categories') }}';
            button.classList.add('btn-link');
            button.classList.remove('btn-danger');
        }
    }
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
