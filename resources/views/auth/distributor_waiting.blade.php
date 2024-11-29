@extends('layouts.Member.master3')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-success">
    <div class="card shadow-lg" style="max-width: 800px; opacity: 0;" id="card">
        <div class="card-body text-center">
            <h1 class="display-6 mb-4" style="font-family: 'Roboto', sans-serif;">
                <i class="fas fa-check-circle" style="color: green;"></i>
                {{ __('messages.register1') }}
            </h1>
            <h5 class="mb-3" style="font-size: 1.2rem;">{{ __('messages.register2') }}</h5>
        </div>
        <div class="card-body text-center">
            <p class="mb-4" style="font-size: 1rem;">
                <i class="fas fa-bell me-2 ringing-bell"></i>
                {{ __('messages.notify1') }}
            </p>
        </div>
        <div class="card-body text-center">
            <a href="{{ url('/') }}" class="btn btn-primary mt-4">
                <i class="fas fa-arrow-left me-2"></i>{{ __('messages.back') }}
            </a>
        </div>
    </div>
</div>
@endsection

<style>
    /* Animation for the card */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #card {
        animation: fadeIn 1s ease-out forwards;
    }

    /* Card Hover Effect */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    /* Button Hover Effect */
    .btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Enhanced Bell Icon Animation (More Dramatic) */
    @keyframes ringing {
        0% { transform: rotate(0deg) scale(1); }
        20% { transform: rotate(15deg) scale(1.2); }
        40% { transform: rotate(-15deg) scale(1.2); }
        60% { transform: rotate(10deg) scale(1.1); }
        80% { transform: rotate(-10deg) scale(1.1); }
        100% { transform: rotate(0deg) scale(1); }
    }

    /* Apply enhanced ringing animation on hover */
    .ringing-bell:hover {
        animation: ringing 1s ease-in-out infinite;
    }
</style>
