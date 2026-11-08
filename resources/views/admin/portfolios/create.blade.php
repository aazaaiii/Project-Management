@extends('layouts.admin')

@section('title', 'Tambah Portofolio')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 700px;">

        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                        <option value="">Pilih kategori</option>
                        @foreach (['Rumah 2 Lantai', 'Interior', 'Kitchen Set', 'Kamar Mandi', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Published" {{ old('status') == 'Published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Luas Bangunan</label>
                    <input type="text" name="luas_bangunan" value="{{ old('luas_bangunan') }}" class="form-control" placeholder="Contoh: 120 m²">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Tahun</label>
                    <input type="number" name="tahun" value="{{ old('tahun') }}" class="form-control @error('tahun') is-invalid @enderror" placeholder="2026">
                    @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Thumbnail (foto utama)</label>
                <input type="file" name="thumbnail" accept="image/*" class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Foto Galeri (boleh pilih beberapa)</label>
                <input type="file" name="images[]" multiple accept="image/*" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Portofolio</button>
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </form>

    </div>
</div>

@endsection