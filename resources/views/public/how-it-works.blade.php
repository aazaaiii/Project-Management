@extends('layouts.public')

@section('title', 'Cara Kerja')

@php
$prosesList = [
    ['no' => '01', 'icon' => 'bi-chat-dots', 'judul' => 'Konsultasi', 'desc' => 'Sampaikan kebutuhan Anda kepada tim kami'],
    ['no' => '02', 'icon' => 'bi-clipboard-data', 'judul' => 'Survey & Analisa', 'desc' => 'Kami survey lokasi dan analisa kebutuhan proyek'],
    ['no' => '03', 'icon' => 'bi-file-earmark-text', 'judul' => 'Penawaran', 'desc' => 'Kami berikan penawaran terbaik untuk Anda'],
    ['no' => '04', 'icon' => 'bi-tools', 'judul' => 'Pengerjaan', 'desc' => 'Proyek dikerjakan oleh tim profesional dan berpengalaman'],
    ['no' => '05', 'icon' => 'bi-check2-circle', 'judul' => 'Finishing & Serah Terima', 'desc' => 'Proyek diselesaikan, kami pastikan Anda puas dengan hasilnya'],
];
@endphp

@section('content')

<section class="py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <p class="text-primary fw-semibold small mb-1">CARA KERJA</p>
            <h2 class="fw-bold">Proses Mudah & Transparan</h2>
            <p class="text-secondary">Kami memiliki alur kerja yang jelas untuk memberikan pengalaman terbaik bagi Anda.</p>
        </div>

        <div class="row g-4 text-center">
            @foreach ($prosesList as $step)
                <div class="col-md-4 col-lg-{{ $loop->count == 5 ? '2' : '3' }} position-relative">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                        <i class="bi {{ $step['icon'] }} fs-4"></i>
                    </div>
                    <p class="text-primary fw-semibold small mb-1">{{ $step['no'] }}</p>
                    <h6 class="fw-semibold">{{ $step['judul'] }}</h6>
                    <p class="text-secondary small">{{ $step['desc'] }}</p>

                    @if (!$loop->last)
                        <i class="bi bi-arrow-right text-primary d-none d-lg-block position-absolute top-0 mt-4" style="right: -20px;"></i>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="text-center bg-primary text-white rounded-4 p-5 mt-5">
            <h4 class="fw-bold mb-2">Siap Mewujudkan Hunian Impian Anda?</h4>
            <p class="mb-3 opacity-75">Konsultasikan sekarang juga secara gratis bersama tim kami.</p>
            <a href="{{ route('booking') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">
                Konsultasi Sekarang
            </a>
        </div>

    </div>
</section>

@endsection