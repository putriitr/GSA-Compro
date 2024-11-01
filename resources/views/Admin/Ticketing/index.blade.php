@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <h4>Daftar Ticketing</h4>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
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
                        <td>{{ $ticketing->user->name }}</td>
                        <td>{{ $ticketing->service_type }}</td>
                        <td>{{ $ticketing->description }}</td>
                        <td>{{ $ticketing->status }}</td>
                        <td>
                            <a href="{{ route('ticketings.show', $ticketing) }}" class="btn btn-info btn-sm">View</a>
                            @if ($ticketing->status === 'open')
                                <form action="{{ route('ticketings.process', $ticketing) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Proses</button>
                                </form>
                            @endif
                            @if ($ticketing->status === 'in_progress')
                                <form action="{{ route('ticketings.complete', $ticketing) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
