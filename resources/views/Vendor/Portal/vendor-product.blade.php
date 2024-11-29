@extends('layouts.Member.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Product & Price List</h4>
        </div>
        <div class="card-body">
            <h5>Vendor: {{ $vendor->loa }}</h5>

            <!-- Tabel Produk -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        {{-- <td>{{ number_format($product->price, 2) }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Form untuk Mengunggah File Excel -->
            <form action="{{ route('vendor.products.upload', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Upload Excel File</label>
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Products</button>
            </form>
        </div>
    </div>
</div>
@endsection
