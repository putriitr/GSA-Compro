@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0" style="display: flex; justify-content: center; align-items: center;">
                            <strong>{{ __('messages.ticket_info') }}</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-cogs me-2"></i>{{ __('messages.jenis_layanan') }} :</strong>
                                    {{ $ticket->jenis_layanan }}</p>
                                <p><strong><i class="fas fa-info-circle me-2"></i>{{ __('messages.keterangan_pengajuan') }}
                                        :</strong>
                                    {{ $ticket->keterangan_layanan }}</p>
                                <p><strong><i class="fas fa-clipboard-check me-2"></i>{{ __('messages.status') }}
                                        :</strong> {{ $ticket->status }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-calendar-alt me-2"></i>{{ __('messages.tanggal_pengajuan') }}
                                        :</strong>
                                    {{ $ticket->tgl_pengajuan }}
                                </p>
                                @if ($ticket->file_pendukung_layanan)
                                    <p><strong><i class="fas fa-paperclip me-2"></i>{{ __('messages.dok_pendukung') }}
                                            :</strong>
                                        <a href="{{ asset($ticket->file_pendukung_layanan) }}" target="_blank"
                                            class="text-primary">{{ __('messages.view_here') }}</a>
                                    </p>
                                @endif
                                @if ($ticket->tim_teknis)
                                <p><strong><i class="fas fa-users me-2"></i>{{ __('messages.tim_teknis') }} :</strong>
                                    <span class="badge bg-success"> {{ $ticket->tim_teknis }}</span>
                                </p>
                            @else
                                <p><strong><i class="fas fa-users me-2"></i>{{ __('messages.tim_teknis') }} :</strong>
                                    <span class="badge bg-secondary">{{ __('messages.blm_ditentukan') }}</span>
                                </p>
                            @endif
                            </div>
                        </div><br>
                        <!-- Tampilkan Keterangan Tindakan -->
                        @if ($ticket->keterangan_tindakan)
                            <p><strong><i class="fas fa-clipboard-list me-2"></i>{{ __('messages.ket_tindakan') }}
                                    :</strong>
                                {{ $ticket->keterangan_tindakan }}</p>
                        @else
                            <p><strong><i class="fas fa-clipboard-list me-2"></i>{{ __('messages.ket_tindakan') }}
                                    :</strong> {{ __('messages.blm_ada_tindakan') }}</p>
                        @endif

                        <p class="mt-4"><strong>{{ __('messages.dok_pendukung_tindakan') }}</strong></p>
                        @if ($ticket->dok_pendukung_tindakan)
                            <p><a href="{{ asset($ticket->dok_pendukung_tindakan) }}" target="_blank"
                                    class="text-primary"><i class="fas fa-file-alt me-2"></i>{{ __('messages.view_here') }}</a>
                            </p>
                        @else
                            <p class="text-muted">{{ __('messages.blm_ada_dok_pendukung_tindakan') }}</p>
                        @endif

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tickets.index') }}" class="btn btn-primary"><i
                                    class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
