@extends('layouts.Member.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/bg-product.jpg') }}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('messages.ticketing') }}
            </h3>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/distportal') }}">{{ __('messages.portal_partner') }}</a></li>
                <li class="breadcrumb-item active text-primary">{{ __('messages.ticketing') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Main Content Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="col-md-8">
                    <form action="{{ url('/customer-report') }}" method="GET" class="d-flex flex-grow-1 me-3">
                        <input type="text" name="search" class="form-control"
                            placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="bi bi-search me-1"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ url('/export-customer-report') }}" class="btn btn-success">
                        {{ __('messages.export_to_excel') }} <i class="bi bi-file-earmark-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-8">

            <div class="mb-5">
                <div class="accordion" id="qnaAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is a Proforma Invoice?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#qnaAccordion">
                            <div class="accordion-body">
                                <p>A Proforma Invoice is a preliminary bill of sale sent to buyers in advance of a shipment or delivery of goods. It typically outlines the items, their prices, and the terms of sale.</p>
                                <img src="{{ asset('assets/img/proforma_invoice_example.jpg') }}" alt="Proforma Invoice" class="img-fluid mt-3">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What is an Invoice?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#qnaAccordion">
                            <div class="accordion-body">
                                <p>An Invoice is a formal request for payment issued by a seller to a buyer. It includes the products or services rendered, the amount due, and payment terms.</p>
                                <img src="{{ asset('assets/img/invoice_example.jpg') }}" alt="Invoice" class="img-fluid mt-3">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What is a Quotation?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#qnaAccordion">
                            <div class="accordion-body">
                                <p>A Quotation is a document that a seller provides to a buyer that outlines the prices of goods or services. It is typically issued before a sale takes place and is used to communicate pricing to the buyer.</p>
                                <img src="{{ asset('assets/img/quotation_example.jpg') }}" alt="Quotation" class="img-fluid mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" id="noFaqMessage" style="display: none;">
                <p>No FAQs available.</p>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<!-- Main Content End -->

@endsection
