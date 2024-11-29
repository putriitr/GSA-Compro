@extends('layouts.Admin.master')

@section('content')
    <div class="row">
        @foreach ([['icon' => 'fas fa-users', 'title' => 'Member', 'value' => $totalMembers, 'color' => 'primary'], ['icon' => 'fas fa-user', 'title' => 'Distributor', 'value' => $totalDistributors, 'color' => 'info'], ['icon' => 'fas fa-shopping-bag', 'title' => 'Produk', 'value' => $totalProducts, 'color' => 'success'], ['icon' => 'fas fa-ticket-alt', 'title' => 'Tiketing Layanan', 'value' => $totalTickets, 'color' => 'secondary']] as $stat)
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg mb-4 animate__animated animate__zoomIn">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Kunjungan Harian</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="daily-visits-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk Grafik Kunjungan Harian
            const dates = @json($dates ?? []);
            const visits = @json($visits ?? []);
            const dailyVisitsCtx = document.getElementById('daily-visits-chart').getContext('2d');

            if (dates.length > 0 && visits.length > 0) {
                new Chart(dailyVisitsCtx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Jumlah Kunjungan (Harian)',
                            data: visits,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            tension: 0.3,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Jumlah Kunjungan'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
