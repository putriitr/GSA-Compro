@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <h4>Edit Ticketing</h4>

        <form action="{{ route('ticketings.update', $ticketing) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="service_type">Jenis Layanan</label>
                <input type="text" class="form-control" id="service_type" name="service_type" value="{{ $ticketing->service_type }}" required>
            </div>
            <div class="form-group">
                <label for="description">Keterangan Pengajuan</label>
                <textarea class="form-control" id="description" name="description" required>{{ $ticketing->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="document">Dokumen Pendukung (optional)</label>
                <input type="file" class="form-control" id="document" name="document">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
