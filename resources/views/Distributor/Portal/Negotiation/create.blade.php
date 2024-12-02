@extends('layouts.Member.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0"><strong>Negotiate Quotation #{{ $quotation->quotation_number }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('distributor.quotations.negotiations.store', $quotation->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="notes" class="form-label">{{ __('messages.note') }}</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success w-50">{{ __('messages.kirim') }}<i class="fas fa-paper-plane ms-2"></i></button>
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
