@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
       url('{{ asset('assets/img/bg-1.jpg') }}');
       background-size: cover;
       background-position: center;
       width: 100%;
       height: 400px;
       display: flex;
       justify-content: center;
       align-items: center;">
        <div class="container text-center" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.layanan_tiket') }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">{{ __('messages.home') }}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}"
                        class="text-white">{{ __('messages.portal_member') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.layanan_tiket') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><strong>{{ __('messages.daftar_tiket') }}</strong></h4>
                    <a href="{{ route('tickets.create') }}" class="btn btn-primary"><i
                            class="fas fa-plus-circle me-2"></i>{{ __('messages.create_tiket') }}</a>
                </div>

                <div class="card shadow-sm border-0" style="border-radius: 8px; overflow: hidden;">
                    <div class="table-responsive card-body p-0" style="overflow-x:auto;">
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover mb-0">
                                <thead style="background-color: #4C6B8C;" class="text-white text-center">
                                    <tr>
                                        <th style="width: 5%; vertical-align: middle; border-right: 1px solid #ddd;">{{ __('messages.id') }}</th>
                                        <th style="width: 15%; vertical-align: middle; border-right: 1px solid #ddd;">{{ __('messages.jenis_layanan') }}
                                        </th>
                                        <th style="width: 20%; vertical-align: middle; border-right: 1px solid #ddd;">
                                            {{ __('messages.keterangan_pengajuan') }}</th>
                                        <th style="width: 20%; vertical-align: middle; border-right: 1px solid #ddd;">
                                            {{ __('messages.tanggal_pengajuan') }}</th>
                                        <th style="width: 10%; vertical-align: middle; border-right: 1px solid #ddd;">{{ __('messages.status') }}</th>
                                        <th style="width: 15%; vertical-align: middle; border-right: 1px solid #ddd;">
                                            {{ __('messages.tanggal_tindakan') }}</th>
                                        <th style="width: 15%; vertical-align: middle; border-right: 1px solid #ddd;">{{ __('messages.aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tickets as $key => $ticket)
                                        <tr class="text-center">
                                            <td style="border: 1px solid #ddd;">{{ $key + 1 }}</td>
                                            <td style="border: 1px solid #ddd;">{{ $ticket->jenis_layanan }}</td>
                                            <td style="border: 1px solid #ddd;">{{ Str::limit($ticket->keterangan_layanan, 30) }}</td>
                                            <td style="border: 1px solid #ddd;">{{ $ticket->tgl_pengajuan }}</td>
                                            <td style="border: 1px solid #ddd;">
                                                <span
                                                    class="badge
                                            @if ($ticket->status == 'open') bg-success
                                            @elseif($ticket->status == 'progress') bg-warning
                                            @else bg-secondary @endif">
                                                    {{ ucfirst($ticket->status) }}
                                                </span>
                                            </td>
                                            <td style="border: 1px solid #ddd;">
                                                @if ($ticket->status == 'open')
                                                    <span class="text-muted">{{ __('messages.blm_proses') }}</span>
                                                @elseif($ticket->status == 'progress' && $ticket->tgl_mulai_tindakan)
                                                    {{ __('messages.start_date') }} : {{ $ticket->tgl_mulai_tindakan }}
                                                @elseif($ticket->status == 'close' && $ticket->tgl_mulai_tindakan && $ticket->tgl_selesai_tindakan)
                                                    {{ __('messages.start_date') }} :
                                                    {{ $ticket->tgl_mulai_tindakan }}<br>
                                                    {{ __('messages.end_date') }} : {{ $ticket->tgl_selesai_tindakan }}
                                                @endif
                                            </td>

                                            <td class="text-center" style="border: 1px solid #ddd;">
                                                <a href="{{ route('tickets.show', $ticket->id_after_sales) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> {{ __('messages.view') }}
                                                </a>
                                                @if ($ticket->status == 'open')
                                                    <a href="{{ route('tickets.edit', $ticket->id_after_sales) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                                    </a>
                                                    <form action="{{ route('tickets.cancel', $ticket->id_after_sales) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-times-circle"></i> {{ __('messages.hapus') }}
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">
                                                {{ __('messages.no_ticket') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
