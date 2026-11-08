@extends('layouts.admin')

@section('title', 'Buat Tagihan')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 600px;">

        <form action="{{ route('admin.payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Project</label>
                <select name="project_id" class="form-select @error('project_id') is-invalid @enderror">
                    <option value="">Pilih project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->nama_project }} — {{ $project->customer->user->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Tagihan (Rp)</label>
                <input type="text" inputmode="numeric" id="jumlahInput" name="jumlah" value="{{ old('jumlah') }}" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Contoh: 23.000.000">
                @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Tanggal Tagihan</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="form-control @error('tanggal') is-invalid @enderror">
                @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Buat Tagihan</button>
            <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </form>

    </div>
</div>
@push('scripts')
<script>
    const jumlahInput = document.getElementById('jumlahInput');

    jumlahInput.addEventListener('input', function () {
        let angka = this.value.replace(/\D/g, '');
        this.value = angka ? new Intl.NumberFormat('id-ID').format(angka) : '';
    });

    jumlahInput.closest('form').addEventListener('submit', function () {
        jumlahInput.value = jumlahInput.value.replace(/\./g, '');
    });
</script>
@endpush
@endsection