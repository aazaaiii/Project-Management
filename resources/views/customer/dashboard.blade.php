@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-kanban-fill text-primary fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalProyek }}</h4>
                    <p class="text-secondary small mb-0">Total Proyek</p>
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
                    <h4 class="fw-bold mb-0">{{ $sedangBerjalan }}</h4>
                    <p class="text-secondary small mb-0">Sedang Berjalan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $selesai }}</h4>
                    <p class="text-secondary small mb-0">Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-danger bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-cash-stack text-danger fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">Rp {{ number_format($totalInvoice, 0, ',', '.') }}</h4>
                    <p class="text-secondary small mb-0">Total Invoice</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4">
    <h6 class="fw-semibold mb-3">Proyek Saya</h6>

    @forelse ($projects as $project)
        <a href="{{ route('customer.projects.show', $project) }}" class="text-decoration-none text-dark">
            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                <div>
                    <h6 class="fw-semibold mb-1">{{ $project->nama_project }}</h6>
                    <p class="text-secondary small mb-0">{{ $project->status }} — Estimasi Selesai: {{ $project->estimasi_selesai?->format('d M Y') ?? '-' }}</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="progress" style="height: 6px; width: 100px;">
                        <div class="progress-bar bg-primary" style="width: {{ $project->persentase_progress }}%"></div>
                    </div>
                    <span class="fw-semibold small">{{ $project->persentase_progress }}%</span>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center text-secondary py-5">
            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
            <p class="mb-0">Belum ada proyek. Proyek akan muncul di sini setelah Anda melakukan booking konsultasi dan proyek disetujui admin.</p>
        </div>
    @endforelse

    @if ($totalProyek > 5)
        <div class="text-center mt-3">
            <a href="{{ route('customer.projects.index') }}" class="text-primary text-decoration-none fw-semibold small">Lihat Semua Proyek →</a>
        </div>
    @endif
</div>

@endsection