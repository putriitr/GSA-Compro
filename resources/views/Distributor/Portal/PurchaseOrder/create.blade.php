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
                    <div class="form-group mb-3">
                        <label for="po_number">PO Number</label>
                        <input type="text" class="form-control" id="po_number" name="po_number" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="po_date">PO Date</label>
                        <input type="date" class="form-control" id="po_date" name="po_date" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="file_path">Upload PO File (optional)</label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf,.doc,.docx" required>r
                    </div>

                    <button type="submit" class="btn btn-primary">Create PO</button>
                </form><br><br>
            </div>
        </div>
    </div>
@endsection
