<footer class="text-white pt-5 pb-4" style="background-color: #1E293B;">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
               <div class="mb-3">
    <img src="{{ asset('images/logo.png') }}" alt="JOELL PROJECT" style="height: 40px; filter: brightness(0) invert(1);">
</div>
                <p class="text-white-50 small">
                    JOELL PROJECT siap membantu Anda mewujudkan hunian yang nyaman, modern, dan berkualitas dengan tim profesional dan hasil terbaik.
                </p>
            </div>

            <div class="col-lg-2 col-6">
                <h6 class="fw-semibold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-white-50 text-decoration-none">Layanan</a></li>
                    <li class="mb-2"><a href="{{ route('portfolio') }}" class="text-white-50 text-decoration-none">Portofolio</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6">
                <h6 class="fw-semibold mb-3">Layanan</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2 text-white-50">Renovasi Rumah</li>
                    <li class="mb-2 text-white-50">Bangun Rumah Baru</li>
                    <li class="mb-2 text-white-50">Desain Interior</li>
                    <li class="mb-2 text-white-50">Kitchen Set</li>
                    <li class="mb-2 text-white-50">Desain 3D</li>
                    <li class="mb-2 text-white-50">Konsultasi</li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h6 class="fw-semibold mb-3">Kontak</h6>
                <ul class="list-unstyled small text-white-50">
                    <li class="mb-2"><i class="bi bi-whatsapp me-2"></i>0822 2584 2769</li>
                    <li class="mb-2"><i class="bi bi-instagram me-2"></i>@joell_project</li>
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Bekasi, Jawa Barat</li>
                    <li class="mb-2"><i class="bi bi-clock me-2"></i>Senin - Sabtu, 08.00 - 17.00 WIB</li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <p class="text-center text-white-50 small mb-0">
            &copy; {{ date('Y') }} JOELL PROJECT. All rights reserved.
        </p>
    </div>
</footer>