@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <h4>Detail Ticketing</h4>

        <p><strong>Jenis Layanan:</strong> {{ $ticketing->service_type }}</p>
        <p><strong>Keterangan Pengajuan:</strong> {{ $ticketing->description }}</p>
        <p><strong>Status:</strong> {{ $ticketing->status }}</p>

        @if ($ticketing->document)
            <p><strong>Dokumen:</strong> <a href="{{ Storage::url($ticketing->document) }}" target="_blank">Lihat Dokumen</a></p>
        @endif

        <a href="{{ route('ticketings.edit', $ticketing) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('ticketings.batal', $ticketing) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Batal</button>
        </form>
        <a href="{{ route('ticketings.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
