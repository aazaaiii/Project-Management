@extends('layouts.public')

@section('title', 'Booking Konsultasi')

@php
    $jenisLayananList = [
        'Renovasi Rumah',
        'Bangun Rumah Baru',
        'Desain Interior',
        'Kitchen Set',
        'Desain 3D',
        'Konsultasi'
    ];
@endphp

@section('content')

<section class="py-5" style="background: #F8FAFF;">
    <div class="container py-4">
        <div class="row g-5">

            {{-- FORM BOOKING --}}
            <div class="col-lg-7">
                <p class="text-primary fw-semibold small mb-1">
                    BOOKING KONSULTASI
                </p>

                <h2 class="fw-bold mb-2">
                    Konsultasi Gratis Bersama Kami
                </h2>

                <p class="text-secondary mb-4">
                    Lengkapi kebutuhan renovasi Anda dan tim JOELL_PROJECT
                    akan segera menghubungi Anda.
                </p>

                @if (session('success'))
                    <div class="alert alert-success rounded-3">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger rounded-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        Mohon periksa kembali data booking Anda.
                    </div>
                @endif

                {{-- INFORMASI CUSTOMER --}}
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-3">Informasi Pemesan</h5>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="{{ auth()->user()->name }}"
                               readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email"
                                   class="form-control bg-light"
                                   value="{{ auth()->user()->email }}"
                                   readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">No. WhatsApp</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="{{ auth()->user()->no_whatsapp ?? 'Belum diisi' }}"
                                   readonly>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control bg-light"
                                  rows="2"
                                  readonly>{{ auth()->user()->alamat ?? 'Belum diisi' }}</textarea>
                    </div>
                </div>

                {{-- DETAIL BOOKING --}}
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold mb-4">Detail Konsultasi</h5>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Jenis Layanan <span class="text-danger">*</span>
                            </label>

                            <select name="jenis_layanan"
                                    class="form-select @error('jenis_layanan') is-invalid @enderror"
                                    required>
                                <option value="">Pilih layanan</option>

                                @foreach ($jenisLayananList as $jenis)
                                    <option value="{{ $jenis }}"
                                        {{ old('jenis_layanan') == $jenis ? 'selected' : '' }}>
                                        {{ $jenis }}
                                    </option>
                                @endforeach
                            </select>

                            @error('jenis_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Tanggal Survey (Opsional)
                            </label>

                            <input type="date"
                                   name="tanggal_survey"
                                   value="{{ old('tanggal_survey') }}"
                                   min="{{ date('Y-m-d') }}"
                                   class="form-control @error('tanggal_survey') is-invalid @enderror">

                            @error('tanggal_survey')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Pesan</label>

                            <textarea name="pesan"
                                      rows="4"
                                      maxlength="1000"
                                      class="form-control @error('pesan') is-invalid @enderror"
                                      placeholder="Ceritakan kebutuhan renovasi Anda (opsional)">{{ old('pesan') }}</textarea>

                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                                class="btn btn-primary rounded-pill px-4 py-2 fw-semibold w-100">
                            <i class="bi bi-send me-2"></i>
                            Kirim Booking
                        </button>
                    </form>
                </div>
            </div>

            {{-- INFORMASI KONTAK --}}
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 text-white p-4 mb-4"
                     style="background: #3B82F6;">

                    <h5 class="fw-bold mb-3">Informasi Kontak</h5>

                    <p class="mb-3">
                        <i class="bi bi-whatsapp me-2"></i>
                        0822 2584 2769
                    </p>

                    <p class="mb-3">
                        <i class="bi bi-instagram me-2"></i>
                        @joell_project
                    </p>

                    <p class="mb-3">
                        <i class="bi bi-geo-alt me-2"></i>
                        Bekasi, Jawa Barat
                    </p>

                    <p class="mb-0">
                        <i class="bi bi-clock me-2"></i>
                        Senin - Sabtu, 08.00 - 17.00 WIB
                    </p>
                </div>

                <img
                    src="https://placehold.co/500x300/EFF6FF/3B82F6?text=Konsultasi+JOELL"
                    class="img-fluid rounded-4 shadow-sm w-100"
                    alt="Konsultasi JOELL PROJECT">

                <div class="card border-0 shadow-sm rounded-4 p-4 mt-4">
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-lightbulb text-primary me-2"></i>
                        Informasi Booking
                    </h6>

                    <p class="text-secondary small mb-2">
                        1. Pilih jenis layanan yang Anda butuhkan.
                    </p>

                    <p class="text-secondary small mb-2">
                        2. Tentukan tanggal survey jika diperlukan.
                    </p>

                    <p class="text-secondary small mb-0">
                        3. Kirim booking dan tunggu konfirmasi dari tim kami.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
