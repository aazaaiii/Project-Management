@extends('layouts.public')

@section('title', 'Tentang Kami')

@section('content')

<style>
    .about-page {
        font-family: 'Poppins', sans-serif;
        color: #1E293B;
    }

    .about-hero {
        background: linear-gradient(135deg, #EFF6FF 0%, #F8FAFC 100%);
        padding: 85px 0;
        overflow: hidden;
    }

    .about-label {
        display: inline-block;
        color: #3B82F6;
        background: #DBEAFE;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .about-title {
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 800;
        line-height: 1.25;
        color: #1E293B;
        margin-bottom: 22px;
    }

    .about-title span {
        color: #3B82F6;
    }

    .about-description {
        color: #64748B;
        line-height: 1.9;
        font-size: 15px;
        max-width: 550px;
    }

    .about-image-wrapper {
        position: relative;
        padding: 15px;
    }

    .about-image {
        width: 100%;
        height: 430px;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 20px 45px rgba(30, 64, 175, 0.15);
        position: relative;
        z-index: 2;
    }

    .about-image-decoration {
        position: absolute;
        width: 180px;
        height: 180px;
        background: #BFDBFE;
        border-radius: 25px;
        right: 0;
        top: 0;
        z-index: 1;
    }

    .about-image-caption {
        position: absolute;
        bottom: 35px;
        left: -5px;
        background: white;
        padding: 17px 22px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.12);
        z-index: 3;
    }

    .about-image-caption strong {
        display: block;
        color: #1E293B;
        font-size: 15px;
    }

    .about-image-caption small {
        color: #64748B;
    }

    .about-check {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 17px;
        color: #334155;
        font-size: 14px;
    }

    .about-check-icon {
        width: 27px;
        height: 27px;
        min-width: 27px;
        background: #DBEAFE;
        color: #3B82F6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .about-section {
        padding: 85px 0;
    }

    .about-section-label {
        color: #3B82F6;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .about-section-title {
        font-size: 32px;
        font-weight: 800;
        color: #1E293B;
        margin-top: 12px;
        margin-bottom: 15px;
    }

    .about-section-description {
        color: #64748B;
        font-size: 14px;
        line-height: 1.8;
    }

    .about-value-card {
        height: 100%;
        padding: 30px;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        background: white;
        transition: .3s ease;
    }

    .about-value-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(30, 64, 175, 0.09);
        border-color: #BFDBFE;
    }

    .about-value-icon {
        width: 55px;
        height: 55px;
        background: #EFF6FF;
        color: #3B82F6;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        margin-bottom: 22px;
    }

    .about-value-card h5 {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .about-value-card p {
        color: #64748B;
        font-size: 13px;
        line-height: 1.8;
        margin: 0;
    }

    .about-cta {
        background: linear-gradient(135deg, #2563EB, #3B82F6);
        border-radius: 25px;
        padding: 55px 35px;
        color: white;
    }

    .about-cta h2 {
        font-size: 30px;
        font-weight: 800;
    }

    .about-cta p {
        color: #DBEAFE;
        font-size: 14px;
    }

    .about-cta .btn {
        background: white;
        color: #2563EB;
        border: none;
        font-weight: 700;
        padding: 13px 28px;
        border-radius: 50px;
    }

    .about-cta .btn:hover {
        background: #EFF6FF;
        color: #1D4ED8;
    }

    @media (max-width: 767px) {
        .about-hero {
            padding: 55px 0;
        }

        .about-image {
            height: 300px;
        }

        .about-image-caption {
            left: 10px;
            bottom: 25px;
        }

        .about-section {
            padding: 60px 0;
        }

        .about-section-title {
            font-size: 27px;
        }

        .about-cta {
            padding: 40px 25px;
        }
    }
</style>

<div class="about-page">

    {{-- HERO SECTION --}}
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <span class="about-label">
                        TENTANG JOELL PROJECT
                    </span>

                    <h1 class="about-title">
                        Membangun Ruang,
                        <span>Mewujudkan Impian.</span>
                    </h1>

                    <p class="about-description mb-4">
                        JOELL PROJECT hadir sebagai mitra renovasi dan
                        pembangunan rumah yang berkomitmen membantu
                        mewujudkan hunian sesuai kebutuhan dan harapan Anda.
                    </p>

                    <p class="about-description mb-4">
                        Berbasis di Bekasi, kami mengutamakan kualitas
                        pengerjaan, ketepatan waktu, dan perhatian terhadap
                        setiap detail untuk menciptakan ruang yang nyaman
                        dan fungsional.
                    </p>

                    <div class="mt-4">
                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            Kualitas pengerjaan menjadi prioritas
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            Material berkualitas dan terpercaya
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            Pengerjaan sesuai kesepakatan
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            Komunikasi dan pelayanan yang baik
                        </div>
                    </div>

                    <a href="{{ route('booking') }}"
                       class="btn btn-primary rounded-pill px-4 py-3 mt-3 fw-semibold">
                        Mulai Konsultasi <span class="ms-2">→</span>
                    </a>
                </div>

                <div class="col-lg-6">
                    <div class="about-image-wrapper">

                        <div class="about-image-decoration"></div>

                        <img
                            src="{{ asset('images/abt us.jpg') }}"
                            alt="Hasil proyek JOELL PROJECT"
                            class="about-image"
                        >

                        <div class="about-image-caption">
                            <strong>JOELL PROJECT</strong>
                            <small>Exterior & Interior Renovation</small>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- NILAI DAN KEUNGGULAN --}}
    <section class="about-section">
        <div class="container">

            <div class="text-center mb-5">
                <span class="about-section-label">
                    NILAI KAMI
                </span>

                <h2 class="about-section-title">
                    Mengutamakan Kualitas dalam Setiap Proyek
                </h2>

                <p class="about-section-description mx-auto"
                   style="max-width: 620px;">
                    Kami percaya bahwa hunian yang baik dibangun melalui
                    perencanaan, pengerjaan, dan pelayanan yang diperhatikan
                    dengan baik.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="about-value-card">
                        <div class="about-value-icon">⌂</div>
                        <h5>Kualitas Pengerjaan</h5>
                        <p>
                            Memperhatikan detail pekerjaan agar hasil
                            renovasi sesuai dengan kebutuhan pelanggan.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="about-value-card">
                        <div class="about-value-icon">◇</div>
                        <h5>Material Terpercaya</h5>
                        <p>
                            Mengutamakan pemilihan material yang sesuai
                            dengan kebutuhan dan perencanaan proyek.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="about-value-card">
                        <div class="about-value-icon">◷</div>
                        <h5>Ketepatan Waktu</h5>
                        <p>
                            Memperhatikan jadwal pengerjaan berdasarkan
                            kesepakatan dan perkembangan proyek.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="about-value-card">
                        <div class="about-value-icon">♡</div>
                        <h5>Pelayanan Terbaik</h5>
                        <p>
                            Mengutamakan komunikasi yang baik untuk
                            memahami kebutuhan setiap pelanggan.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="pb-5">
        <div class="container">
            <div class="about-cta text-center">

                <h2>Wujudkan Hunian Impian Anda</h2>

                <p class="mt-3 mb-4">
                    Punya rencana renovasi atau membangun rumah?
                    Mari diskusikan kebutuhan proyek Anda bersama JOELL PROJECT.
                </p>

                <a href="{{ route('booking') }}" class="btn">
                    Book Now! <span class="ms-2">→</span>
                </a>

            </div>
        </div>
    </section>

</div>

@endsection
