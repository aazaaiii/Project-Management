@extends('layouts.public')

@section('title', 'Layanan')

@section('content')

<style>
    .services-page {
        font-family: 'Poppins', sans-serif;
        color: #1E293B;
        overflow: hidden;
    }

    /* HERO */
    .services-hero {
        background: linear-gradient(135deg, #b7cbe5 0%, #FFFFFF 75%);
        padding: 85px 0 75px;
        position: relative;
    }

    .services-hero::before {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        background: rgba(59, 130, 246, .07);
        border-radius: 50%;
        right: -100px;
        top: -120px;
    }

    .services-label {
        display: inline-block;
        padding: 8px 17px;
        border-radius: 50px;
        background: #abbfda;
        color: #2563EB;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .services-heading {
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 800;
        line-height: 1.25;
        color: #1E293B;
        margin-bottom: 20px;
    }

    .services-heading span {
        color: #3B82F6;
    }

    .services-description {
        max-width: 650px;
        margin: auto;
        color: #64748B;
        font-size: 15px;
        line-height: 1.9;
    }

    .services-hero-note {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: white;
        border: 1px solid #DBEAFE;
        padding: 12px 19px;
        border-radius: 50px;
        color: #475569;
        font-size: 13px;
        margin-top: 25px;
        box-shadow: 0 5px 20px rgba(30, 64, 175, .05);
    }

    .services-hero-note i {
        color: #3B82F6;
    }

    /* SERVICE CARDS */
    .services-section {
        padding: 75px 0 90px;
        background: #FFFFFF;
    }

    .services-section-label {
        color: #3B82F6;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .services-section-title {
        font-size: 32px;
        font-weight: 800;
        color: #1E293B;
        margin: 12px 0;
    }

    .services-section-desc {
        color: #64748B;
        font-size: 14px;
        line-height: 1.8;
    }

    .service-card {
        height: 100%;
        background: #FFFFFF;
        border: 1px solid #E8EEF7;
        border-radius: 22px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: all .3s ease;
    }

    .service-card::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #F1F6FF;
        right: -55px;
        bottom: -55px;
        transition: .3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        border-color: #BFDBFE;
        box-shadow: 0 18px 40px rgba(37, 99, 235, .10);
    }

    .service-card:hover::after {
        transform: scale(1.5);
    }

    .service-number {
        color: #94A3B8;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 22px;
    }

    .service-icon {
        width: 62px;
        height: 62px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: #EFF6FF;
        color: #3B82F6;
        font-size: 27px;
        margin-bottom: 23px;
        transition: .3s ease;
    }

    .service-card:hover .service-icon {
        background: #3B82F6;
        color: #FFFFFF;
        transform: rotate(-5deg);
    }

    .service-card h3 {
        font-size: 19px;
        font-weight: 700;
        color: #1E293B;
        margin-bottom: 13px;
    }

    .service-card p {
        font-size: 13px;
        color: #64748B;
        line-height: 1.9;
        margin-bottom: 22px;
        min-height: 75px;
    }

    .service-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #2563EB;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        position: relative;
        z-index: 2;
        transition: .2s ease;
    }

    .service-link:hover {
        color: #1D4ED8;
        gap: 13px;
    }

    /* CTA */
    .services-cta {
        padding: 0 0 85px;
    }

    .services-cta-box {
        background: linear-gradient(120deg, #1D4ED8, #3B82F6);
        border-radius: 25px;
        padding: 55px 35px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .services-cta-box::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 45px solid rgba(255,255,255,.08);
        border-radius: 50%;
        right: -80px;
        top: -100px;
    }

    .services-cta-box h2 {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 14px;
    }

    .services-cta-box p {
        color: #DBEAFE;
        font-size: 14px;
        line-height: 1.8;
        max-width: 650px;
        margin: auto;
    }

    .services-cta-button {
        display: inline-block;
        background: #FFFFFF;
        color: #2563EB;
        text-decoration: none;
        padding: 13px 27px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        margin-top: 25px;
        transition: .2s ease;
    }

    .services-cta-button:hover {
        background: #EFF6FF;
        color: #1D4ED8;
        transform: translateY(-2px);
    }

    @media (max-width: 767px) {
        .services-hero {
            padding: 60px 0;
        }

        .services-section {
            padding: 55px 0;
        }

        .services-section-title {
            font-size: 26px;
        }

        .service-card {
            padding: 25px;
        }

        .services-cta-box {
            padding: 40px 22px;
        }

        .services-cta-box h2 {
            font-size: 25px;
        }
    }
</style>


<div class="services-page">

    {{-- HERO SECTION --}}
    <section class="services-hero">
        <div class="container text-center">

            <span class="services-label">
                LAYANAN JOELL PROJECT
            </span>

            <h1 class="services-heading">
                Solusi Hunian untuk
                <span>Setiap Kebutuhan Anda.</span>
            </h1>

            <p class="services-description">
                Dari renovasi hingga pembangunan rumah baru,
                JOELL PROJECT siap membantu mewujudkan hunian
                yang nyaman, fungsional, dan sesuai dengan harapan Anda.
            </p>

            <div class="services-hero-note">
                <i class="bi bi-geo-alt-fill"></i>
                Melayani Bekasi dan sekitarnya
            </div>

        </div>
    </section>


    {{-- DAFTAR LAYANAN --}}
    <section class="services-section">
        <div class="container">

            <div class="text-center mb-5">
                <span class="services-section-label">
                    APA YANG KAMI KERJAKAN?
                </span>

                <h2 class="services-section-title">
                    Layanan Kami
                </h2>

                <p class="services-section-desc">
                    Pilih layanan yang sesuai dengan kebutuhan
                    pembangunan dan renovasi hunian Anda.
                </p>
            </div>

            <div class="row g-4">

                {{-- 01 RENOVASI --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">01 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-house-gear"></i>
                        </div>

                        <h3>Renovasi Rumah</h3>

                        <p>
                            Melayani renovasi total maupun sebagian,
                            mulai dari perbaikan struktur hingga
                            penyegaran tampilan rumah.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>


                {{-- 02 BANGUN RUMAH --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">02 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <h3>Bangun Rumah Baru</h3>

                        <p>
                            Membangun rumah dari awal dengan
                            memperhatikan kebutuhan ruang,
                            desain, dan perencanaan pembangunan.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>


                {{-- 03 INTERIOR --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">03 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-brush"></i>
                        </div>

                        <h3>Desain Interior</h3>

                        <p>
                            Penataan interior dengan perpaduan
                            estetika dan fungsi agar setiap ruangan
                            terasa lebih nyaman.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>


                {{-- 04 KITCHEN SET --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">04 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-cup-hot"></i>
                        </div>

                        <h3>Kitchen Set</h3>

                        <p>
                            Pembuatan kitchen set custom dengan
                            desain fungsional yang disesuaikan
                            dengan kebutuhan dapur Anda.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>


                {{-- 05 DESAIN 3D --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">05 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-box"></i>
                        </div>

                        <h3>Desain 3D</h3>

                        <p>
                            Visualisasi desain tiga dimensi untuk
                            membantu Anda mendapatkan gambaran
                            hunian sebelum pengerjaan dimulai.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>


                {{-- 06 KONSULTASI --}}
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">

                        <div class="service-number">06 / 06</div>

                        <div class="service-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>

                        <h3>Konsultasi</h3>

                        <p>
                            Diskusikan kebutuhan renovasi atau
                            pembangunan Anda untuk mendapatkan
                            arahan awal mengenai rencana proyek.
                        </p>

                        <a href="{{ route('booking') }}" class="service-link">
                            Konsultasikan <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- CALL TO ACTION --}}
    <section class="services-cta">
        <div class="container">

            <div class="services-cta-box text-center">

                <h2>
                    Punya Rencana Renovasi atau Bangun Rumah?
                </h2>

                <p>
                    Ceritakan kebutuhan hunian Anda kepada kami.
                    Mari mulai merencanakan proyek bersama JOELL PROJECT.
                </p>

                <a href="{{ route('booking') }}" class="services-cta-button">
                    Book Now! <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>
    </section>

</div>

@endsection
