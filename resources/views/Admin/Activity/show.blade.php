{{-- @extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4>{{ $item->title }}</h4> <!-- Tambahkan default jika title tidak ada -->
                </div>
                <div class="card-body">
                    @if ($item->image)
                        <div class="mb-3 text-center">
                            <img src="{{ asset($item->image) }}" class="img-fluid img-thumbnail" alt="{{ $item->title ?? 'Gambar tidak tersedia' }}">
                        </div>
                    @else
                        <p class="text-center">Gambar tidak tersedia</p> <!-- Menampilkan pesan jika tidak ada gambar -->
                    @endif
                    <p><strong>Tanggal :</strong> {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</p>
                    <p><strong>Deskripsi :</strong></p>
                    <p>{{ $item->description  }}</p> <!-- Tambahkan default jika deskripsi tidak ada -->
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.activity.index') }}" class="btn btn-primary">Kembali ke Aktivitas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
