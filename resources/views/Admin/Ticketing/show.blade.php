@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <h4>Detail Ticketing</h4>

        <p><strong>User:</strong> {{ $ticketing->user->name }}</p>
        <p><strong>Jenis Layanan:</strong> {{ $ticketing->service_type }}</p>
        <p><strong>Keterangan Pengajuan:</strong> {{ $ticketing->description }}</p>
        <p><strong>Status:</strong> {{ $ticketing->status }}</p>

        @if ($ticketing->document)
            <p><strong>Dokumen:</strong> <a href="{{ Storage::url($ticketing->document) }}" target="_blank">Lihat Dokumen</a></p>
        @endif

        @if ($ticketing->status === 'open')
            <form action="{{ route('ticketings.process', $ticketing) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Proses</button>
            </form>
        @endif
        @if ($ticketing->status === 'in_progress')
            <form action="{{ route('ticketings.complete', $ticketing) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Selesaikan</button>
            </form>
        @endif
        <a href="{{ route('ticketings.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
