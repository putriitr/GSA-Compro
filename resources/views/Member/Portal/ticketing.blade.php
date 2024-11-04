@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <h4>{{ __('messages.ticketing') }}</h4>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('messages.jenis_layanan') }}</th>
                    <th>{{ __('messages.keterangan_pengajuan') }}</th>
                    <th>{{ __('messages.status') }}</th>
                    <th>{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticketings as $ticketing)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ticketing->service_type }}</td>
                        <td>{{ $ticketing->description }}</td>
                        <td>{{ $ticketing->status }}</td>
                        <td>
                            <a href="{{ route('ticketings.show', $ticketing) }}" class="btn btn-info btn-sm">View</a>
                            @if ($ticketing->status === 'open')
                                <a href="{{ route('ticketings.edit', $ticketing) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ticketings.batal', $ticketing) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('ticketings.create') }}" class="btn btn-primary">Buat Ticketing Baru</a>
    </div>
@endsection
