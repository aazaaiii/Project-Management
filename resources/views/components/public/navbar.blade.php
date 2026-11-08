<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
    <img src="{{ asset('images/logo.png') }}" alt="JOELL PROJECT" style="height: 45px;">
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublic">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPublic">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('services') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('how-it-works') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('how-it-works') }}">Cara Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio*') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('portfolio') }}">Portofolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('testimonials') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('testimonials') }}">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('booking') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('booking') }}">Booking Konsultasi</a>
                </li>
            </ul>

            <div class="d-flex">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill px-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>