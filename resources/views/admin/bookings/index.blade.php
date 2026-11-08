@extends('layouts.admin')

@section('title', 'Booking Konsultasi')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama/email...">
                    <button type="submit" class="btn btn-outline-primary ms-2"><i class="bi bi-search"></i></button>
                </form>

                <form method="GET">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        @foreach (['Menunggu', 'Diproses', 'Survey', 'Selesai', 'Ditolak'] as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Jenis Layanan</th>
                        <th>Tanggal Survey</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td class="fw-semibold">{{ $booking->nama }}</td>
                            <td>
                                <div class="small">{{ $booking->email }}</div>
                                <div class="small text-secondary">{{ $booking->no_hp }}</div>
                            </td>
                            <td>{{ $booking->jenis_layanan }}</td>
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
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $booking->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                                <div class="modal fade" id="detailModal{{ $booking->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Detail Booking — {{ $booking->nama }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mb-2"><strong>Alamat:</strong> {{ $booking->alamat ?? '-' }}</p>
                                                <p class="mb-3"><strong>Pesan:</strong> {{ $booking->pesan ?? '-' }}</p>

                                                <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label class="form-label fw-semibold">Ubah Status</label>
                                                    <select name="status" class="form-select mb-3">
                                                        @foreach (['Menunggu', 'Diproses', 'Survey', 'Selesai', 'Ditolak'] as $status)
                                                            <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary w-100">Simpan Status</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">Belum ada data booking.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $bookings->links() }}

    </div>
</div>

@endsection