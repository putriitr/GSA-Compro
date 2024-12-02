@extends('layouts.Member.master')

@section('content')
    {{-- <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/page-header.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.create_your_ticket') }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/portal') }}">{{ __('messages.portal') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.create_your_ticket') }}</li>
            </ol>
        </div>
    </div> --}}

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-center">
                        <h4 class="text-black wow fadeInDown"><strong>{{ __('messages.form_pengajuan') }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="jenis_layanan" class="form-label"><i
                                        class="fas fa-cogs me-2"></i>{{ __('messages.jenis_layanan') }}</label>
                                <select name="jenis_layanan" id="jenis_layanan" class="form-control">
                                    <option value="Permintaan Data">{{ __('messages.permintaan_data') }}</option>
                                    <option value="Maintenance">{{ __('messages.maintenance') }}</option>
                                    <option value="Visit">{{ __('messages.visit') }}</option>
                                    <option value="Installasi">{{ __('messages.instalasi') }}</option>
                                </select>
                            </div><br>

                            <div class="form-group mb-3">
                                <label for="keterangan_layanan" class="form-label"><i
                                        class="fas fa-info-circle me-2"></i>{{ __('messages.keterangan_pengajuan') }}</label>
                                <textarea name="keterangan_layanan" id="keterangan_layanan" class="form-control" rows="4"
                                    placeholder="{{ __('messages.masukkan_keterangan') }}"></textarea>
                            </div><br>

                            <div class="form-group mb-4">
                                <label for="file_pendukung_layanan" class="form-label"><i
                                        class="fas fa-paperclip me-2"></i>{{ __('messages.dok_pendukung') }} (Opsional)</label>
                                <input type="file" name="file_pendukung_layanan" id="file_pendukung_layanan"
                                    class="form-control">
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>{{ __('messages.kirim') }}
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('tickets.index') }}" class="btn btn-danger me-2">
                                        <i class="fas fa-times-circle me-2"></i>{{ __('messages.batal') }}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
