@extends('layouts.admin')

@section('title', 'Progress: ' . $project->nama_project)

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="row g-4">

    <div class="col-lg-7">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="fw-bold mb-1">{{ $project->nama_project }}</h5>
                    <p class="text-secondary small mb-0">{{ $project->customer->user->name }} — {{ $project->lokasi }}</p>
                </div>
                <h4 class="fw-bold text-primary mb-0">{{ $project->persentase_progress }}%</h4>
            </div>

            <hr>

            <h6 class="fw-semibold mb-3">Riwayat Progress</h6>

            @forelse ($project->progress()->latest('tanggal')->get() as $item)
                <div class="d-flex gap-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-primary" style="width: 12px; height: 12px;"></div>
                        <div class="flex-grow-1 border-start" style="width: 1px;"></div>
                    </div>
                    <div class="flex-grow-1 pb-2">
                        <p class="text-secondary small mb-1">{{ $item->tanggal->format('d M Y') }} — {{ $item->persentase }}%</p>
                        <p class="mb-2">{{ $item->keterangan }}</p>

                        @if ($item->photos->count() > 0)
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($item->photos as $photo)
                                    <a href="{{ asset('storage/' . $photo->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $photo->foto) }}" class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-secondary small">Belum ada riwayat progress.</p>
            @endforelse

        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-semibold mb-3"><i class="bi bi-plus-circle"></i> Tambah Progress</h6>

            <form action="{{ route('admin.progress.store', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="form-control @error('tanggal') is-invalid @enderror">
                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Contoh: Pemasangan keramik area lantai selesai">{{ old('keterangan') }}</textarea>
                    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Persentase Progress (%)</label>
                    <input type="number" name="persentase" min="0" max="100" value="{{ old('persentase', $project->persentase_progress) }}" class="form-control @error('persentase') is-invalid @enderror">
                    @error('persentase') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Foto (boleh pilih beberapa)</label>
                    <input type="file" name="foto[]" multiple accept="image/*" class="form-control @error('foto.*') is-invalid @enderror">
                    @error('foto.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary rounded-pill px-4 w-100">Simpan Progress</button>
            </form>
        </div>
    </div>

</div>

@endsection