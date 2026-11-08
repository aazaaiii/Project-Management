@extends('layouts.admin')

@section('title', 'Edit Portofolio')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4" style="max-width: 700px;">

        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $portfolio->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                        @foreach (['Rumah 2 Lantai', 'Interior', 'Kitchen Set', 'Kamar Mandi', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}" {{ old('kategori', $portfolio->kategori) == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="Draft" {{ old('status', $portfolio->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Published" {{ old('status', $portfolio->status) == 'Published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $portfolio->lokasi) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Luas Bangunan</label>
                    <input type="text" name="luas_bangunan" value="{{ old('luas_bangunan', $portfolio->luas_bangunan) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Tahun</label>
                    <input type="number" name="tahun" value="{{ old('tahun', $portfolio->tahun) }}" class="form-control @error('tahun') is-invalid @enderror">
                    @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Thumbnail Saat Ini</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" style="width: 120px; height: 90px; object-fit: cover;" class="rounded-3">
                </div>
                <label class="form-label small text-secondary">Ganti thumbnail (opsional, kosongkan jika tidak diganti)</label>
                <input type="file" name="thumbnail" accept="image/*" class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            @if ($portfolio->images->count() > 0)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Galeri Saat Ini</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($portfolio->images as $image)
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $image->image) }}" style="width: 80px; height: 80px; object-fit: cover;" class="rounded-3">
                                <form action="{{ route('admin.portfolios.delete-image', $image) }}" method="POST" class="position-absolute top-0 end-0" onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-circle p-0" style="width: 22px; height: 22px; font-size: 0.7rem;">×</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mb-4">
                <label class="form-label fw-semibold">Tambah Foto Galeri Baru (opsional)</label>
                <input type="file" name="images[]" multiple accept="image/*" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Update Portofolio</button>
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </form>

    </div>
</div>

@endsection