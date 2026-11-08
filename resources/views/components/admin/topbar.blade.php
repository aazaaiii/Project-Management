<div class="bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
    <h5 class="fw-semibold mb-0">@yield('title', 'Dashboard')</h5>
    <div class="d-flex align-items-center gap-2">
        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <i class="bi bi-person-fill text-primary"></i>
        </div>
        <div>
            <p class="fw-semibold mb-0 small">{{ auth()->user()->name }}</p>
            <p class="text-secondary mb-0" style="font-size: 0.75rem;">Admin</p>
        </div>
    </div>
</div>