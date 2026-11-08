
@extends('layouts.public')

@section('title', 'Portofolio')

@section('content')

@php
    $kategoriList = [
        'Semua',
        'Rumah 2 Lantai',
        'Interior',
        'Kitchen Set',
        'Kamar Mandi',
        'Lainnya'
    ];
@endphp

<style>
    .portfolio-hero {
        background: linear-gradient(90deg, rgba(15, 35, 65, .78), rgba(15, 35, 65, .25)),
        url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1800&q=85');
        background-size: cover;
        background-position: center;
        min-height: 400px;
        display: flex;
        align-items: center;
        border-radius: 0 0 28px 28px;
    }

    .portfolio-hero h1 {
        color: white;
        font-weight: 800;
        font-size: clamp(2rem, 5vw, 3.5rem);
    }

    .portfolio-hero p {
        color: #eaf2ff;
        max-width: 550px;
    }

    .portfolio-section {
        padding: 80px 0;
    }

    .section-label {
        color: #3B82F6;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .portfolio-title {
        color: #1E293B;
        font-weight: 800;
    }

    .filter-btn {
        border: 1px solid #dbeafe;
        background: white;
        color: #64748b;
        transition: .3s;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: #3B82F6;
        color: white !important;
        border-color: #3B82F6;
    }

    .portfolio-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: .3s;
        background: white;
    }

    .portfolio-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, .13) !important;
    }

    .portfolio-image {
        height: 240px;
        width: 100%;
        object-fit: cover;
        transition: .4s;
    }

    .portfolio-card:hover .portfolio-image {
        transform: scale(1.04);
    }

    .portfolio-image-wrapper {
        overflow: hidden;
    }

    .portfolio-category {
        background: #EFF6FF;
        color: #3B82F6;
        font-size: 11px;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 30px;
    }

    .portfolio-location {
        color: #94a3b8;
        font-size: 13px;
    }

    .testimonial-section {
        background: #EFF6FF;
        padding: 80px 0;
    }

    .testimonial-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 28px;
        height: 100%;
        transition: .3s;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(59, 130, 246, .10);
    }

    .testimonial-quote {
        font-size: 35px;
        color: #3B82F6;
        font-weight: 800;
        line-height: 1;
    }

    .testimonial-stars {
        color: #F59E0B;
        letter-spacing: 2px;
    }

    .testimonial-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #DBEAFE;
        color: #2563EB;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }

    .portfolio-cta {
        background: linear-gradient(135deg, #3B82F6, #2563EB);
        border-radius: 24px;
        padding: 55px 25px;
        color: white;
    }

    .portfolio-cta h2 {
        font-weight: 800;
    }

    .portfolio-cta .btn {
        background: white;
        color: #2563EB;
        border-radius: 30px;
        font-weight: 700;
        padding: 12px 28px;
    }

    .portfolio-cta .btn:hover {
        background: #EFF6FF;
        color: #1D4ED8;
    }

    @media (max-width: 768px) {
        .portfolio-hero {
            min-height: 340px;
        }

        .portfolio-section,
        .testimonial-section {
            padding: 55px 0;
        }

        .portfolio-image {
            height: 220px;
        }
    }
</style>

{{-- HERO SECTION --}}
<section class="portfolio-hero">
    <div class="container">
        <div class="col-lg-7">
            <span class="badge rounded-pill px-3 py-2 mb-3"
                  style="background: rgba(255,255,255,.2); color:white;">
                JOELL_PROJECT PORTFOLIO
            </span>

            <h1>Setiap Ruang Punya Cerita, Kami Wujudkan Impiannya.</h1>

            <p class="mt-3 mb-4">
                Lihat berbagai hasil pengerjaan renovasi dan pembangunan
                kami dalam menciptakan hunian yang nyaman, indah, dan berkualitas.
            </p>

            <a href="#portfolioGallery"
               class="btn btn-light rounded-pill px-4 fw-semibold"
               style="color:#2563EB;">
                Jelajahi Portofolio
                <i class="bi bi-arrow-down ms-2"></i>
            </a>
        </div>
    </div>
</section>


{{-- PORTFOLIO GALLERY --}}
<section class="portfolio-section" id="portfolioGallery">
    <div class="container">

        <div class="text-center mb-5">
            <p class="section-label mb-2">KARYA KAMI</p>

            <h2 class="portfolio-title">
                Hasil Karya Terbaik Kami
            </h2>

            <p class="text-secondary mt-2">
                Berbagai proyek yang telah kami kerjakan dengan sepenuh hati.
            </p>
        </div>

        {{-- FILTER KATEGORI --}}
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            @foreach ($kategoriList as $kategori)
                <button
                    type="button"
                    class="btn filter-btn rounded-pill px-4 py-2
                    {{ $loop->first ? 'active' : '' }}"
                    data-filter="{{ $kategori }}">
                    {{ $kategori }}
                </button>
            @endforeach
        </div>

        {{-- PORTFOLIO ITEMS --}}
        <div class="row g-4" id="portfolioGrid">

            @forelse ($portfolios as $item)

                <div class="col-sm-6 col-lg-4 portfolio-item"
                     data-category="{{ $item->kategori }}">

                    <div class="card portfolio-card shadow-sm h-100">

                        <div class="portfolio-image-wrapper">
                            <img
                                src="{{ $item->thumbnail
                                    ? asset('storage/' . $item->thumbnail)
                                    : 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80' }}"
                                class="portfolio-image"
                                alt="{{ $item->judul }}"
                                loading="lazy">
                        </div>

                        <div class="card-body p-4">

                            <span class="portfolio-category">
                                {{ $item->kategori }}
                            </span>

                            <h5 class="fw-bold mt-3 mb-2"
                                style="color:#1E293B;">
                                {{ $item->judul }}
                            </h5>

                            @if ($item->lokasi)
                                <p class="portfolio-location mb-0">
                                    <i class="bi bi-geo-alt-fill me-1"
                                       style="color:#3B82F6;"></i>
                                    {{ $item->lokasi }}
                                </p>
                            @endif

                            @if ($item->deskripsi)
                                <p class="text-secondary small mt-3 mb-0">
                                    {{ $item->deskripsi }}
                                </p>
                            @endif

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <i class="bi bi-images display-3"
                       style="color:#93C5FD;"></i>

                    <h5 class="fw-bold mt-3">
                        Belum Ada Portofolio
                    </h5>

                    <p class="text-secondary">
                        Portofolio proyek akan ditampilkan di sini.
                    </p>
                </div>

            @endforelse

            <div class="col-12 text-center py-5 d-none" id="filterEmpty">
                <p class="text-secondary">
                    Belum ada proyek dalam kategori ini.
                </p>
            </div>

        </div>
    </div>
</section>


{{-- TESTIMONIAL SECTION --}}
<section class="testimonial-section">
    <div class="container">

        <div class="text-center mb-5">
            <p class="section-label mb-2">KATA MEREKA</p>

            <h2 class="portfolio-title">
                Cerita dari Customer Kami
            </h2>

            <p class="text-secondary mt-2">
                Kepuasan customer menjadi bagian penting dari setiap proyek kami.
            </p>
        </div>

        <div class="row g-4">

            @forelse ($testimonials as $testimonial)

                @php
                    $namaCustomer = data_get($testimonial, 'customer.user.name')
                        ?? 'Customer JOELL_PROJECT';

                    $isiTestimoni = data_get($testimonial, 'isi_testimoni')
                        ?? data_get($testimonial, 'komentar')
                        ?? data_get($testimonial, 'pesan')
                        ?? data_get($testimonial, 'ulasan')
                        ?? data_get($testimonial, 'deskripsi');

                    $namaProyek = data_get($testimonial, 'project.nama_proyek')
                        ?? data_get($testimonial, 'project.nama')
                        ?? data_get($testimonial, 'project.judul');

                    $rating = data_get($testimonial, 'rating');
                @endphp

                @if ($isiTestimoni)

                    <div class="col-md-6 col-lg-4">

                        <div class="testimonial-card shadow-sm">

                            <div class="d-flex justify-content-between mb-3">
                                <span class="testimonial-quote">“</span>

                                @if ($rating)
                                    <div class="testimonial-stars">
                                        @for ($i = 1; $i <= min(5, (int) $rating); $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                @endif
                            </div>

                            <p class="text-secondary"
                               style="line-height:1.8;">
                                {{ $isiTestimoni }}
                            </p>

                            @if ($namaProyek)
                                <p class="small fw-semibold mb-3"
                                   style="color:#3B82F6;">
                                    <i class="bi bi-house-door me-1"></i>
                                    {{ $namaProyek }}
                                </p>
                            @endif

                            <div class="d-flex align-items-center gap-3 mt-4">

                                <div class="testimonial-avatar">
                                    {{ strtoupper(substr($namaCustomer, 0, 1)) }}
                                </div>

                                <div>
                                    <h6 class="fw-bold mb-0">
                                        {{ $namaCustomer }}
                                    </h6>

                                    <small class="text-secondary">
                                        Customer JOELL_PROJECT
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>

                @endif

            @empty

                <div class="col-12 text-center py-4">
                    <i class="bi bi-chat-square-heart display-4"
                       style="color:#93C5FD;"></i>

                    <p class="text-secondary mt-3">
                        Testimoni customer akan ditampilkan di sini.
                    </p>
                </div>

            @endforelse

        </div>
    </div>
</section>


{{-- CALL TO ACTION --}}
<section class="py-5">
    <div class="container">

        <div class="portfolio-cta text-center">

            <h2>Wujudkan Hunian Impian Anda!</h2>

            <p class="mt-3 mb-4">
                Punya rencana renovasi atau pembangunan rumah?
                Percayakan pengerjaannya kepada JOELL_PROJECT.
            </p>

            <a href="{{ route('booking') }}" class="btn">
                Book Now!
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </div>
</section>

@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const filterEmpty = document.getElementById('filterEmpty');

    filterButtons.forEach(button => {

        button.addEventListener('click', function () {

            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            const selectedCategory = this.dataset.filter;
            let visibleCount = 0;

            portfolioItems.forEach(item => {

                const category = item.dataset.category;

                if (
                    selectedCategory === 'Semua' ||
                    category === selectedCategory
                ) {
                    item.classList.remove('d-none');
                    visibleCount++;
                } else {
                    item.classList.add('d-none');
                }

            });

            filterEmpty.classList.toggle('d-none', visibleCount > 0);

        });

    });

});
</script>
@endpush
