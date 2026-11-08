@extends('layouts.public')

@section('title', 'Testimoni')

@section('content')

<section class="py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <p class="text-primary fw-semibold small mb-1">TESTIMONI</p>
            <h2 class="fw-bold">Apa Kata Klien Kami</h2>
            <p class="text-secondary">Kepuasan klien adalah prioritas kami. Berikut beberapa testimoni dari klien kami.</p>
        </div>

        <div class="row g-4">
            @forelse ($testimonials as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <div class="mb-3">
                                @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endfor
                            </div>
                            <p class="text-secondary fst-italic mb-4">"{{ $item->komentar }}"</p>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-person-fill text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-0">{{ $item->customer->user->name }}</h6>
                                    <p class="text-secondary small mb-0">{{ $item->project?->nama_project ?? 'Klien JOELL PROJECT' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary py-5">
                    <i class="bi bi-chat-quote fs-1 d-block mb-2"></i>
                    Belum ada testimoni yang dipublikasikan.
                </div>
            @endforelse
        </div>

        <div class="text-center text-white rounded-4 p-5 mt-5 cta-banner">
            <h4 class="fw-bold mb-2">Punya Proyek?</h4>
            <p class="mb-3 opacity-75">Yuk konsultasikan kebutuhan Anda sekarang juga!</p>
            <a href="{{ route('booking') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">
                Konsultasi Sekarang
            </a>
        </div>

    </div>
</section>

@endsection