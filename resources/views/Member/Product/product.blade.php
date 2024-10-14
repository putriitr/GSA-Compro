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
            <!-- Sidebar End -->

            <!-- Main Content Start -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between mb-4">
                    <h3 class="display-6" style="color: #3CBEEE;">{{ __('messages.explore_product') }}</h3>
                    <select class="form-select w-25 border-0 bg-light shadow-sm">
                        <option selected>{{ __('messages.sort_by') }}</option>
                        <option value="1">{{ __('messages.newest') }}</option>
                        <option value="2">{{ __('messages.latest') }}</option>
                    </select>
                </div>
                <div class="row">
                    @foreach ($produks as $produk)
                    <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <div class="blog-item shadow-sm">
                            <div class="blog-img">
                                <a href="{{ route('product.show', $produk->id) }}">
                                    <img src="{{ asset($produk->images->first()->gambar ?? 'assets/img/default.jpg') }}"
                                        class="img-fluid w-100 rounded-top product-image" alt="{{ $produk->nama }}"
                                        style="border-radius: 20px; width: 200px; height: 300px; object-fit: cover;">
                                </a>
                            </div>
                            <hr class="divider"> <!-- Garis pemisah -->
                            <div class="blog-content p-4">
                                @php
                                    $name = $produk->nama;
                                    $limitedName = strlen($name) > 22 ? substr($name, 0, 22) . '..' : $name;
                                @endphp
                                <a href="#" class="h4 d-inline-block mb-4">{{ $limitedName }}</a><br>
                                <a href="{{ route('product.show', $produk->id) }}"
                                    class="btn btn-primary rounded-pill py-2 px-4">Read More<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $produks->links() }} <!-- Menampilkan link pagination -->
            </div>
        </div>
        <!-- Main Content End -->
    </div>
@endsection

<!-- Additional Custom CSS -->
<style>
    /* General layout adjustments */
    .container-fluid.bg-breadcrumb {
        background-size: cover;
        background-position: center;
        color: #fff;
    }

    /* Product cards */
    .product-card {
        border-radius: 12px;
        background-color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Button styles */
    .btn-outline-primary {
        border: 2px solid #007bff;
        color: #007bff;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* General layout adjustments */
    .blog-item {
        border-radius: 15px; /* Untuk sudut yang lebih halus */
        transition: transform 0.3s ease; /* Animasi saat hover */
        border: 1px solid #3CBEEE; /* Garis pinggir biru */
        background-color: #fff; /* Pastikan latar belakang item tetap putih */
        overflow: hidden; /* Menghindari gambar yang membesar keluar dari card */
    }

    /* Hover effect for product cards */
    .blog-item:hover {
        transform: scale(1.05); /* Membesarkan card saat hover */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Efek bayangan saat hover */
    }

    /* Image hover effects */
    .product-image {
        transition: transform 0.3s ease; /* Animasi untuk gambar */
    }

    /* Remove the individual image hover effect */
    .product-image:hover {
        transform: none; /* Tidak ada transformasi untuk gambar saat hover */
    }

    /* Breadcrumbs */
    .breadcrumb-item a {
        color: #333;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    /* Custom Typography */
    h1,
    h3,
    h5 {
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
</style>
