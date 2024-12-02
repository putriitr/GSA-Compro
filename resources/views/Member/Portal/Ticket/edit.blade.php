@extends('layouts.Member.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0" style="display: flex; justify-content: center; align-items: center;">
                            <strong>{{ __('messages.ticket_edit') }}</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tickets.update', $ticket->id_after_sales) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="jenis_layanan" class="form-label"><i class="fas fa-cogs me-2"></i>{{ __('messages.jenis_layanan') }}</label>
                                <select name="jenis_layanan" id="jenis_layanan" class="form-control">
                                    <option value="Permintaan Data"
                                        {{ $ticket->jenis_layanan == 'Permintaan Data' ? 'selected' : '' }}>{{ __('messages.permintaan_data') }}
                                    </option>
                                    <option value="Maintanance"
                                        {{ $ticket->jenis_layanan == 'Maintanance' ? 'selected' : '' }}>{{ __('messages.maintenance') }}</option>
                                    <option value="Visit" {{ $ticket->jenis_layanan == 'Visit' ? 'selected' : '' }}>{{ __('messages.visit') }}
                                    </option>
                                    <option value="Installasi"
                                        {{ $ticket->jenis_layanan == 'Installasi' ? 'selected' : '' }}>{{ __('messages.instalasi') }}</option>
                                </select>
                            </div><br>

                            <div class="form-group mb-3">
                                <label for="keterangan_layanan" class="form-label"><i
                                        class="fas fa-info-circle me-2"></i>{{ __('messages.keterangan_pengajuan') }}</label>
                                <textarea name="keterangan_layanan" id="keterangan_layanan" class="form-control" rows="4"
                                    placeholder="Deskripsikan perubahan yang diperlukan...">{{ $ticket->keterangan_layanan }}</textarea>
                            </div><br>

                            <div class="form-group mb-4">
                                <label for="file_pendukung_layanan" class="form-label"><i
                                        class="fas fa-paperclip me-2"></i>{{ __('messages.dok_pendukung') }} (Opsional)</label>
                                <input type="file" name="file_pendukung_layanan" id="file_pendukung_layanan"
                                    class="form-control">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('tickets.index') }}" class="btn btn-danger me-2"><i
                                        class="fas fa-arrow-left me-2"></i>{{ __('messages.batal') }}</a>
                                <button type="submit" class="btn btn-primary"><i
                                        class="fas fa-save me-2"></i>{{ __('messages.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
