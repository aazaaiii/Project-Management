@extends('layouts.admin')

@section('title', 'Testimoni')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <form method="GET" class="mb-4" style="max-width: 250px;">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                @foreach (['Pending', 'Disetujui', 'Ditolak'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </form>

        <div class="row g-3">
            @forelse ($testimonials as $testimonial)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h6 class="fw-semibold mb-0">{{ $testimonial->customer->user->name }}</h6>
                                @if ($testimonial->project)
                                    <p class="text-secondary small mb-0">{{ $testimonial->project->nama_project }}</p>
                                @endif
                            </div>
                            @php
                                $badgeColor = match($testimonial->status) {
                                    'Pending' => 'warning',
                                    'Disetujui' => 'success',
                                    'Ditolak' => 'danger',
                                };
                            @endphp
                            <span class="badge bg-{{ $badgeColor }}">{{ $testimonial->status }}</span>
                        </div>

                        <div class="mb-2">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
                        </div>

                        <p class="text-secondary small mb-3">{{ $testimonial->komentar }}</p>

                        <div class="d-flex gap-2 mt-auto">
                            @if ($testimonial->status !== 'Disetujui')
                                <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i> Setujui</button>
                                </form>
                            @endif

                            @if ($testimonial->status !== 'Ditolak')
                                <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-x-lg"></i> Tolak</button>
                                </form>
                            @endif

                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline ms-auto" onsubmit="return confirm('Yakin hapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary py-4">Belum ada testimoni.</div>
            @endforelse
        </div>

        {{ $testimonials->links() }}

    </div>
</div>

@endsection