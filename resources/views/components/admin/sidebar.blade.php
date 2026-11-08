<aside class="bg-white border-end" style="width: 260px; min-height: 100vh;">
    <div class="p-4 border-bottom">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" alt="JOELL PROJECT" style="height: 40px;">
        </a>
    </div>

    <nav class="p-3">
        <ul class="nav nav-pills flex-column gap-1">
            @php
                $menu = [
                    ['route' => 'admin.dashboard', 'icon' => 'bi-grid-1x2-fill', 'label' => 'Dashboard'],
                    ['route' => 'admin.customers.index', 'icon' => 'bi-people-fill', 'label' => 'Customer'],
                    ['route' => 'admin.projects.index', 'icon' => 'bi-kanban-fill', 'label' => 'Project'],
                    ['route' => 'admin.progress.index', 'icon' => 'bi-graph-up', 'label' => 'Progress'],
                    ['route' => 'admin.payments.index', 'icon' => 'bi-credit-card-fill', 'label' => 'Pembayaran'],
                    ['route' => 'admin.bookings.index', 'icon' => 'bi-calendar-check-fill', 'label' => 'Booking Konsultasi'],
                    ['route' => 'admin.testimonials.index', 'icon' => 'bi-star-fill', 'label' => 'Testimoni'],
                    ['route' => 'admin.portfolios.index', 'icon' => 'bi-images', 'label' => 'Portofolio'],
                    ['route' => 'profile.edit', 'icon' => 'bi-person-fill', 'label' => 'Profil'],
                ];
            @endphp

            @foreach ($menu as $item)
                <li class="nav-item">
                    <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                       class="nav-link d-flex align-items-center gap-2 text-dark {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                        <i class="bi {{ $item['icon'] }}"></i> {{ $item['label'] }}
                    </a>
                </li>
            @endforeach

            <li class="nav-item mt-3 pt-3 border-top">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center gap-2 text-danger border-0 bg-transparent w-100 text-start">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>