@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 700px;">

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Customer</label>
                <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id', $project->customer_id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->user->name }} ({{ $customer->user->email }})
                        </option>
                    @endforeach
                </select>
                @error('customer_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Project</label>
                <input type="text" name="nama_project" value="{{ old('nama_project', $project->nama_project) }}" class="form-control @error('nama_project') is-invalid @enderror">
                @error('nama_project') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $project->lokasi) }}" class="form-control @error('lokasi') is-invalid @enderror">
                    @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenis Renovasi</label>
                    <input type="text" name="jenis_renovasi" value="{{ old('jenis_renovasi', $project->jenis_renovasi) }}" class="form-control @error('jenis_renovasi') is-invalid @enderror">
                    @error('jenis_renovasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Total Biaya (Rp)</label>
                <input type="number" name="total_biaya" value="{{ old('total_biaya', $project->total_biaya) }}" class="form-control @error('total_biaya') is-invalid @enderror">
                @error('total_biaya') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $project->tanggal_mulai?->format('Y-m-d')) }}" class="form-control @error('tanggal_mulai') is-invalid @enderror">
                    @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Estimasi Selesai</label>
                    <input type="date" name="estimasi_selesai" value="{{ old('estimasi_selesai', $project->estimasi_selesai?->format('Y-m-d')) }}" class="form-control @error('estimasi_selesai') is-invalid @enderror">
                    @error('estimasi_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    @foreach (['Menunggu', 'Sedang Pengerjaan', 'Selesai', 'Batal'] as $status)
                        <option value="{{ $status }}" {{ old('status', $project->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4 p-3 bg-light rounded-3">
                <label class="form-label fw-semibold mb-1">Progress Saat Ini</label>
                <p class="text-secondary small mb-0">{{ $project->persentase_progress }}% — diatur otomatis lewat menu "Progress", tidak diedit di sini.</p>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </form>

    </div>
</div>

@endsection