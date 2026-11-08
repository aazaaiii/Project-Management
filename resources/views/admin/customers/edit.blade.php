@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 600px;">

        <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $customer->user->name) }}" class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $customer->user->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password Baru <span class="text-secondary fw-normal">(kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">No. WhatsApp</label>
                <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp', $customer->no_whatsapp) }}" class="form-control @error('no_whatsapp') is-invalid @enderror">
                @error('no_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $customer->alamat) }}</textarea>
                @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Update Customer</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </form>

    </div>
</div>

@endsection