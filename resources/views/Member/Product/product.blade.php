@extends('layouts.member.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <h4 class="mb-4 text-dark font-weight-bold">{{ __('messages.category') }}</h4>
                <ul class="list-group mb-4 shadow-sm">
                    @foreach ($kategori as $kat)
                        <li class="list-group-item border-0 rounded text-center py-3 mb-2 shadow-sm"
                            style="cursor: pointer; background-color: {{ $selectedCategory && $selectedCategory->id == $kat->id ? '#6196FF' : '#f8f9fa' }}; transition: background-color 0.3s ease, color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#6196FF'; this.style.color='#fff';"
                            onmouseout="this.style.backgroundColor='{{ $selectedCategory && $selectedCategory->id == $kat->id ? '#6196FF' : '#f8f9fa' }}'; this.style.color='{{ $selectedCategory && $selectedCategory->id == $kat->id ? '#fff' : '#000' }}';"
                            onclick="window.location.href='{{ route('filterByCategory', $kat->id) }}'">
                            <strong>{{ $kat->nama }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between mb-4 align-items-center">
                    <div class="search">
                        <input type="text" id="find" placeholder="Type Keywords Here .." onkeyup="searchProducts()">
                        <i class="fas fa-search" id="btn"></i>
                    </div>

                    <select class="form-select w-25 border-0 bg-light shadow-sm">
                        <option selected>{{ __('messages.sort_by') }}</option>
                        <option value="1">{{ __('messages.newest') }}</option>
                        <option value="2">{{ __('messages.latest') }}</option>
                    </select>
                </div>

                <div class="row" id="productList">
                    @foreach ($produks as $produk)
                        <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center product" data-product-name="{{ strtolower($produk->nama) }}">
                            <div class="blog-item shadow-sm">
                                <div class="blog-img">
                                    <a href="{{ route('product.show', $produk->id) }}">
                                        <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                            class="img-fluid w-100 rounded-top product-image" alt="{{ $produk->nama }}"
                                            style="border-radius: 20px; width: 200px; height: 300px; object-fit: cover;">
                                    </a>
                                </div>
                                <hr class="divider">
                                <div class="blog-content p-4">
                                    @php
                                        $name = $produk->nama;
                                        $limitedName = strlen($name) > 22 ? substr($name, 0, 22) . '..' : $name;
                                    @endphp
                                    <h4 class="d-inline-block mb-4">{{ $limitedName }}</h4><br>
                                    <a href="{{ route('product.show', $produk->id) }}"
                                        class="btn btn-primary rounded-pill py-2 px-4">Read More<i
                                            class="fas fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function searchProducts() {
        const input = document.getElementById("find").value.toLowerCase();
        const products = document.querySelectorAll("#productList .product");

        products.forEach(product => {
            const productName = product.getAttribute("data-product-name");
            if (productName.includes(input)) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    }
</script>

<style>
    .search {
        width: 60%;
        background-color: #eee;
        border-radius: 10px;
        padding: 9px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    input {
        border: none;
        outline: none;
        background: none;
    }

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
</style>
