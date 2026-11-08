@extends('layouts.admin')

@section('title', 'Portofolio')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <form method="GET" style="max-width: 300px;">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul portofolio...">
            </form>

            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary rounded-pill px-3">
                <i class="bi bi-plus-lg"></i> Tambah Portofolio
            </a>
        </div>

        <div class="row g-3">
            @forelse ($portfolios as $portfolio)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" class="card-img-top" style="height: 160px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <span class="badge bg-secondary">{{ $portfolio->kategori }}</span>
                                <span class="badge bg-{{ $portfolio->status === 'Published' ? 'success' : 'warning' }}">{{ $portfolio->status }}</span>
                            </div>
                            <h6 class="fw-semibold mb-1">{{ $portfolio->judul }}</h6>
                            <p class="text-secondary small mb-3">{{ $portfolio->lokasi ?? '-' }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-primary flex-grow-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Yakin hapus portofolio ini beserta semua fotonya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary py-4">Belum ada data portofolio.</div>
            @endforelse
        </div>

        {{ $portfolios->links() }}

    </div>
</div>

@endsection