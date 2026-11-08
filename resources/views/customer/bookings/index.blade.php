@extends('layouts.customer')

@section('title', 'Booking Konsultasi')

@section('content')

<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>
        <h4 class="fw-bold mb-1">Riwayat Booking</h4>
        <p class="text-secondary mb-0">
            Pantau permintaan layanan renovasi Anda.
        </p>
    </div>

    <a href="{{ route('customer.bookings.create') }}"
       class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg me-1"></i>
        Booking Layanan Baru
    </a>

</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Jenis Layanan</th>
                        <th>Tanggal Survey</th>
                        <th>Status</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td class="fw-semibold">{{ $booking->jenis_layanan }}</td>
                            <td>{{ $booking->tanggal_survey?->format('d M Y') ?? '-' }}</td>
                            <td>
                                @php
                                    $badgeColor = match($booking->status) {
                                        'Menunggu' => 'warning',
                                        'Diproses' => 'primary',
                                        'Survey' => 'info',
                                        'Selesai' => 'success',
                                        'Ditolak' => 'danger',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeColor }}">{{ $booking->status }}</span>
                            </td>
                            <td class="text-secondary small">{{ $booking->pesan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary py-4">
                                Anda belum pernah booking konsultasi. <a href="{{ route('customer.bookings.create') }}"> Booking sekarang </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $bookings->links() }}
    </div>
</div>

@endsection