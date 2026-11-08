@extends('layouts.public')

@section('title', 'Home')

@php
$layanan = [
    ['icon' => 'bi-house-gear', 'nama' => 'Renovasi Rumah', 'desc' => 'Perbaikan & renovasi total'],
    ['icon' => 'bi-bucket', 'nama' => 'Renovasi Dapur', 'desc' => 'Dapur modern & fungsional'],
    ['icon' => 'bi-droplet', 'nama' => 'Renovasi Kamar Mandi', 'desc' => 'Nyaman & estetik'],
    ['icon' => 'bi-brush', 'nama' => 'Interior Design', 'desc' => 'Desain sesuai keinginan'],
    ['icon' => 'bi-palette', 'nama' => 'Pengecatan', 'desc' => 'Finishing rapi & berkualitas'],
];

$caraKerja = [
    ['no' => '01', 'judul' => 'Booking Konsultasi', 'desc' => 'Isi form konsultasi secara online'],
    ['no' => '02', 'judul' => 'Survey Lokasi', 'desc' => 'Tim kami akan datang ke lokasi'],
    ['no' => '03', 'judul' => 'Pengerjaan Renovasi', 'desc' => 'Proses renovasi sesuai rencana'],
    ['no' => '04', 'judul' => 'Proyek Selesai', 'desc' => 'Serah terima hasil terbaik'],
];
@endphp

@section('content')

<!-- HERO SECTION -->
<section class="py-5 hero-gradient">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3">
                    Bangun Hunian Lebih Baik, Lebih Nyaman Bersama <span class="text-primary">JOELL PROJECT</span>
                </h1>
                <p class="text-secondary mb-4">
                    Spesialis renovasi rumah dengan kualitas terbaik dan proses yang transparan dari awal hingga selesai.
                </p>
                <div class="d-flex gap-3 mb-4">
                    <a href="{{ route('booking') }}" class="btn btn-primary rounded-pill px-4 py-2">
                        <i class="bi bi-calendar-check me-1"></i> Booking Konsultasi
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Portofolio
                    </a>
                </div>
                <div class="d-flex flex-wrap gap-4 pt-2">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-award text-primary fs-5"></i>
                        <small class="fw-medium">Profesional</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-shield-check text-primary fs-5"></i>
                        <small class="fw-medium">Terpercaya</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-gem text-primary fs-5"></i>
                        <small class="fw-medium">Berkualitas</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-clock-history text-primary fs-5"></i>
                        <small class="fw-medium">Tepat Waktu</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/hero rumah.png') }}" class="img-fluid rounded-4 shadow" alt="Hunian JOELL PROJECT">
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN SECTION -->
<section class="py-5">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <p class="text-primary fw-semibold small mb-1">LAYANAN KAMI</p>
                <h2 class="fw-bold section-title">Solusi Renovasi untuk Setiap Kebutuhan Hunian Anda</h2>
            </div>
            <a href="{{ route('services') }}" class="text-primary text-decoration-none fw-semibold text-nowrap">Lihat Semua →</a>
        </div>
        <div class="row g-4">
            @foreach ($layanan as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center">
                        <div class="card-body">
                            <i class="bi {{ $item['icon'] }} text-primary display-6 mb-3"></i>
                            <h6 class="fw-semibold">{{ $item['nama'] }}</h6>
                            <p class="text-secondary small mb-0">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CARA KERJA SECTION -->
<section class="py-5" style="background-color: #F8FAFC;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <p class="text-primary fw-semibold small mb-1">CARA KERJA</p>
            <h2 class="fw-bold section-title">Proses Mudah, Hasil Maksimal</h2>
        </div>
        <div class="row g-4 text-center">
            @foreach ($caraKerja as $step)
                <div class="col-md-3">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold" style="width: 56px; height: 56px;">
                        {{ $step['no'] }}
                    </div>
                    <h6 class="fw-semibold">{{ $step['judul'] }}</h6>
                    <p class="text-secondary small">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-5 text-center text-white cta-banner">
    <div class="container py-4">
        <h3 class="fw-bold mb-3">Siap Mewujudkan Hunian Impian Anda?</h3>
        <a href="{{ route('booking') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">
            Booking Konsultasi
        </a>
    </div>
</section>

@endsection