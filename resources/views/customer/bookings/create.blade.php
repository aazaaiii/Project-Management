
@extends('layouts.customer')

@section('title', 'Booking Layanan Baru')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">

        <div class="mb-4">
            <a href="{{ route('customer.bookings.index') }}"
               class="text-decoration-none text-primary">
                <i class="bi bi-arrow-left"></i> Kembali ke Riwayat Booking
            </a>

            <p class="text-primary fw-semibold small mt-4 mb-1">
                BOOKING LAYANAN
            </p>

            <h2 class="fw-bold">Ajukan Renovasi Baru</h2>

            <p class="text-secondary">
                Data akun Anda sudah tersimpan.
                Pilih layanan yang Anda butuhkan untuk memulai.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">

                <div class="p-3 rounded-3 mb-4"
                     style="background: #eef5ff;">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <i class="bi bi-person-circle fs-2 text-primary"></i>
                        <div>
                            <h5 class="fw-bold mb-1">
                                Data Akun Anda
                            </h5>
                            <p class="text-secondary small mb-0">
                                Diambil otomatis dari profil Anda.
                            </p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-secondary small">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $user->name }}"
                                   readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small">
                                Email
                            </label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ $user->email }}"
                                   readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small">
                                Nomor WhatsApp
                            </label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $user->customer?->no_whatsapp ?? 'Belum diisi' }}"
                                   readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small">
                                Alamat
                            </label>
                            <textarea class="form-control"
                                      rows="1"
                                      readonly>{{ $user->customer?->alamat ?? 'Belum diisi' }}</textarea>
                        </div>
                    </div>
                </div>

                <form action="{{ route('customer.bookings.store') }}"
                      method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="jenis_layanan"
                               class="form-label fw-semibold">
                            Jenis Layanan <span class="text-danger">*</span>
                        </label>

                        <select name="jenis_layanan"
                                id="jenis_layanan"
                                class="form-select"
                                required>
                            <option value="">Pilih layanan renovasi</option>

                            @foreach ([
                                'Renovasi Rumah',
                                'Pembangunan Rumah',
                                'Desain Interior',
                                'Renovasi Dapur',
                                'Renovasi Kamar Mandi',
                                'Lainnya'
                            ] as $layanan)
                                <option value="{{ $layanan }}"
                                    @selected(old('jenis_layanan') === $layanan)>
                                    {{ $layanan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_survey"
                               class="form-label fw-semibold">
                            Tanggal Survei
                            <span class="text-secondary fw-normal">
                                (Opsional)
                            </span>
                        </label>

                        <input type="date"
                               name="tanggal_survey"
                               id="tanggal_survey"
                               class="form-control"
                               min="{{ date('Y-m-d') }}"
                               value="{{ old('tanggal_survey') }}">
                    </div>

                    <div class="mb-4">
                        <label for="pesan"
                               class="form-label fw-semibold">
                            Detail Kebutuhan
                            <span class="text-secondary fw-normal">
                                (Opsional)
                            </span>
                        </label>

                        <textarea name="pesan"
                                  id="pesan"
                                  rows="4"
                                  class="form-control"
                                  placeholder="Ceritakan kebutuhan renovasi Anda...">{{ old('pesan') }}</textarea>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('customer.bookings.index') }}"
                           class="btn btn-outline-secondary rounded-pill px-4">
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-send me-1"></i>
                            Kirim Booking
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection