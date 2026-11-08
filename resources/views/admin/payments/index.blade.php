@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <form method="GET" style="max-width: 250px;">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    @foreach (['Pending', 'Diverifikasi', 'Ditolak'] as $status)
                        <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </form>

            <a href="{{ route('admin.payments.create') }}" class="btn btn-primary rounded-pill px-3">
                <i class="bi bi-plus-lg"></i> Buat Tagihan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Project</th>
                        <th>Customer</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td class="fw-semibold">{{ $payment->project->nama_project }}</td>
                            <td>{{ $payment->project->customer->user->name }}</td>
                            <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $payment->tanggal->format('d M Y') }}</td>
                            <td>
                                @if ($payment->bukti_transfer)
                                    <a href="{{ asset('storage/' . $payment->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-image"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-secondary small">Belum upload</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $badgeColor = match($payment->status) {
                                        'Pending' => 'warning',
                                        'Diverifikasi' => 'success',
                                        'Ditolak' => 'danger',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeColor }}">{{ $payment->status }}</span>
                            </td>
                            <td class="text-end">
                                @if ($payment->status === 'Pending' && $payment->bukti_transfer)
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasiModal{{ $payment->id }}">
                                        Verifikasi
                                    </button>

                                    <div class="modal fade" id="verifikasiModal{{ $payment->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.payments.update-status', $payment) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Verifikasi Pembayaran</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Status</label>
                                                            <select name="status" class="form-select" required>
                                                                <option value="Diverifikasi">Diverifikasi</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-0">
                                                            <label class="form-label fw-semibold">Catatan (opsional)</label>
                                                            <textarea name="catatan_admin" rows="2" class="form-control" placeholder="Isi kalau ditolak, jelaskan alasannya"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-secondary small">-</span>
                                @endif

                                <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data pembayaran ini? Bukti transfer juga akan ikut terhapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-4">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $payments->links() }}

    </div>
</div>

@endsection