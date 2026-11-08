@extends('layouts.admin')

@section('title', 'Dashboard')

@php
    $totalCustomer = \App\Models\Customer::count();
    $totalBooking = \App\Models\Booking::where('status', 'Menunggu')->count();
    $totalProject = \App\Models\Project::count();
    $projectAktif = \App\Models\Project::where('status', 'Sedang Pengerjaan')->count();

    $projectMenunggu = \App\Models\Project::where('status', 'Menunggu')->count();
    $projectSelesai = \App\Models\Project::where('status', 'Selesai')->count();
    $projectDitolak = \App\Models\Project::where('status', 'Ditolak')->count();
@endphp


@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-people-fill text-primary fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalCustomer }}</h4>
                    <p class="text-secondary small mb-0">Total Customer</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-kanban-fill text-success fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalProject }}</h4>
                    <p class="text-secondary small mb-0">Total Project</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-hourglass-split text-warning fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $projectAktif }}</h4>
                    <p class="text-secondary small mb-0">Project Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-danger bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-calendar-check-fill text-danger fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalBooking }}</h4>
                    <p class="text-secondary small mb-0">Booking Baru</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-semibold mb-3">Statistik Project</h6>

            <div style="height: 280px; position: relative;">
                <canvas id="projectChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-semibold mb-3">Aktivitas Terbaru</h6>

            @if ($totalBooking > 0)
                <p class="text-secondary small">
                    Ada {{ $totalBooking }} booking konsultasi baru menunggu diproses.
                </p>
            @else
                <p class="text-secondary small mb-0">
                    Belum ada aktivitas terbaru.
                </p>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('projectChart');

    if (!canvas || typeof Chart === 'undefined') {
        return;
    }

    new Chart(canvas, {
        type: 'bar',

        data: {
            labels: [
                'Menunggu',
                'Sedang Pengerjaan',
                'Selesai',
                'Ditolak'
            ],

            datasets: [{
                label: 'Jumlah Project',

                data: [
                    {{ $projectMenunggu }},
                    {{ $projectAktif }},
                    {{ $projectSelesai }},
                    {{ $projectDitolak }}
                ],

                backgroundColor: [
                    '#F59E0B',
                    '#3B82F6',
                    '#22C55E',
                    '#EF4444'
                ],

                borderRadius: 6,
                maxBarThickness: 48
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.parsed.y + ' project';
                        }
                    }
                }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>
@endpush
