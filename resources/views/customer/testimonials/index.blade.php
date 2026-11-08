@extends('layouts.customer')

@section('title', 'Testimoni')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="row g-4">

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-semibold mb-3"><i class="bi bi-star"></i> Beri Testimoni</h6>

            @if ($projects->isEmpty())
                <p class="text-secondary small mb-0">Anda belum memiliki project yang selesai. Testimoni bisa diberikan setelah project Anda selesai dikerjakan.</p>
            @else
                <form action="{{ route('customer.testimonials.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Project (opsional)</label>
                        <select name="project_id" class="form-select">
                            <option value="">Testimoni umum</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->nama_project }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Rating</label>
                        <select name="rating" class="form-select @error('rating') is-invalid @enderror">
                            <option value="">Pilih rating</option>
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} Bintang</option>
                            @endfor
                        </select>
                        @error('rating') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Komentar</label>
                        <textarea name="komentar" rows="4" class="form-control @error('komentar') is-invalid @enderror" placeholder="Ceritakan pengalaman Anda..."></textarea>
                        @error('komentar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill px-4 w-100">Kirim Testimoni</button>
                </form>
            @endif
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-semibold mb-3">Riwayat Testimoni Saya</h6>

            @forelse ($testimonials as $testimonial)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
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
                    @if ($testimonial->project)
                        <p class="text-secondary small mb-1">{{ $testimonial->project->nama_project }}</p>
                    @endif
                    <p class="mb-0">{{ $testimonial->komentar }}</p>
                </div>
            @empty
                <p class="text-secondary small mb-0">Anda belum pernah memberi testimoni.</p>
            @endforelse

            {{ $testimonials->links() }}
        </div>
    </div>

</div>

@endsection