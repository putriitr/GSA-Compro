@extends('layouts.admin.master')

@section('content')
    <div class="row">
        @foreach([
            ['icon' => 'fas fa-users', 'title' => 'Member', 'value' => $totalMembers, 'color' => 'primary'],
            ['icon' => 'fas fa-user', 'title' => 'Distributor', 'value' => $totalDistributors, 'color' => 'info'],
            ['icon' => 'fas fa-shopping-bag', 'title' => 'Produk', 'value' => $totalProducts, 'color' => 'success'],
            ['icon' => 'fas fa-ticket-alt', 'title' => 'Tiketing Layanan', 'value' => $totalTickets, 'color' => 'secondary']
        ] as $stat)
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round animate__animated animate__fadeIn">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-{{ $stat['color'] }} bubble-shadow-small"
                                     style="background: linear-gradient(135deg, rgba(98, 182, 239, 1), rgba(30, 96, 179, 1)); color: white; border-radius: 50%;">
                                    <i class="{{ $stat['icon'] }}"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">{{ $stat['title'] }}</p>
                                    <h4 class="card-title">{{ $stat['value'] }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg mb-4 animate__animated animate__zoomIn">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Kunjungan Harian</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <canvas id="daily-visits-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('daily-visits-chart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($dates),
                        datasets: [{
                            label: 'Jumlah Kunjungan (Harian)',
                            data: @json($visits),
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            tension: 0.3,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointHoverRadius: 8,
                        }]
                    },
                    options: {
                        responsive: true,
                        animation: {
                            duration: 2000,
                            easing: 'easeOutBounce',
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return `Date: ${tooltipItem.label}, Visits: ${tooltipItem.raw}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Number of Visits'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </div>

    <style>
        .card-stats:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .bubble-shadow-small {
            transition: all 0.3s ease-in-out;
        }
        .bubble-shadow-small:hover {
            transform: translateY(-5px) scale(1.1);
        }
    </style>
@endsection
