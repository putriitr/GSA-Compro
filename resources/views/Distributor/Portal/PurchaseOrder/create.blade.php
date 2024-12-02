@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0"><strong>{{ __('messages.create_po_for_quo') }}
                                #{{ $quotation->quotation_number }}</strong></h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('quotations.store_po', $quotation->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Input PO Number -->
                            <div class="form-group mb-4">
                                <label for="po_number" class="form-label" style="font-weight: bold; color: #004d40;">{{ __('messages.po_number') }}</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="po_number"
                                    name="po_number" placeholder="Enter PO Number" required>
                            </div>

                            <!-- Upload PO File -->
                            <div class="form-group mb-4">
                                <label for="file_path" class="form-label" style="font-weight: bold; color: #004d40;">{{ __('messages.dok_pendukung') }} PO</label>
                                <input type="file" class="form-control rounded-pill shadow-sm" id="file_path"
                                    name="file_path" accept=".pdf,.doc,.docx" required>
                                <small class="form-text text-muted">Supported formats: PDF, DOC, DOCX</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success w-40">
                                    <i class="fas fa-paper-plane me-2"></i>{{ __('messages.create_po') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('distribution.request-quotation') }}" class="btn btn-outline-danger">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
                        </a>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
@endsection
