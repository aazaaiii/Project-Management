@extends('layouts.admin')

@section('title', 'Tambah Customer')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 600px;">

        <div class="mb-4">
            <h5 class="fw-bold">Tambah Customer</h5>
            <p class="text-muted small mb-0">
                Gunakan email yang sudah terdaftar atau buat akun customer baru.
            </p>
        </div>

        <form action="{{ route('admin.customers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                >
                <small class="text-muted">
                    Wajib diisi jika membuat akun baru.
                    Kosongkan jika menggunakan akun yang sudah terdaftar.
                </small>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">No. WhatsApp</label>
                <input
                    type="text"
                    name="no_whatsapp"
                    value="{{ old('no_whatsapp') }}"
                    class="form-control @error('no_whatsapp') is-invalid @enderror"
                >
                @error('no_whatsapp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Alamat</label>
                <textarea
                    name="alamat"
                    rows="3"
                    class="form-control @error('alamat') is-invalid @enderror"
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">
                Simpan Customer
            </button>

            <a href="{{ route('admin.customers.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4">
                Batal
            </a>

        </form>
    </div>
</div>

@endsection
