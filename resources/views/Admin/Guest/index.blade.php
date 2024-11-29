@extends('layouts.Admin.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h4" style="font-weight: bold;">Guest Messages</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Perusahaan</th>
                                <th>Nomor WhatsApp</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->nama }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->perusahaan }}</td>
                                    <td>{{ $message->no_wa }}</td>
                                    <td>{{ $message->pesan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
