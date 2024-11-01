@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <h4>Buat Ticketing Baru</h4>

        <form action="{{ route('ticketings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="service_type">Jenis Layanan</label>
                <input type="text" class="form-control" id="service_type" name="service_type" required>
            </div>
            <div class="form-group">
                <label for="description">Keterangan Pengajuan</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="document">Dokumen Pendukung (optional)</label>
                <input type="file" class="form-control" id="document" name="document">
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
