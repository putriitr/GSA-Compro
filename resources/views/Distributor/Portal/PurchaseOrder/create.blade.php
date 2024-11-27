@extends('layouts.Member.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Create Purchase Order
            </h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('distribution') }}">{{ __('messages.portal_partner') }}</a>
                </li>
                <li class="breadcrumb-item active text-primary">Create Purchase Order </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><strong>Create Purchase Order for Quotation
                            #{{ $quotation->quotation_number }}</strong></h3>
                </div>

                <form action="{{ route('quotations.store_po', $quotation->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Input PO Number -->
                    <div class="form-group mb-4">
                        <label for="po_number" class="form-label" style="font-weight: bold; color: #004d40;">PO
                            Number</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="po_number" name="po_number"
                            placeholder="Enter PO Number" required>
                    </div>

                    <!-- Upload PO File -->
                    <div class="form-group mb-4">
                        <label for="file_path" class="form-label" style="font-weight: bold; color: #004d40;">Upload PO
                            File</label>
                        <input type="file" class="form-control rounded-pill shadow-sm" id="file_path" name="file_path"
                            accept=".pdf,.doc,.docx" required>
                        <small class="form-text text-muted">Supported formats: PDF, DOC, DOCX</small>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm"
                            style="background: #00796b; border: none;">
                            <i class="fas fa-paper-plane me-2"></i>Create PO
                        </button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </div>
@endsection
