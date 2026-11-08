@extends('layouts.customer')

@section('title', 'Pembayaran')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Project</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Catatan Admin</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td class="fw-semibold">{{ $payment->project->nama_project }}</td>
                            <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $payment->tanggal->format('d M Y') }}</td>
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
                            <td>
                                <span class="text-secondary small">{{ $payment->catatan_admin ?? '-' }}</span>
                            </td>
                            <td class="text-end">
                                @if (in_array($payment->status, ['Pending', 'Ditolak']) && !$payment->bukti_transfer)
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal{{ $payment->id }}">
                                        <i class="bi bi-upload"></i> Upload Bukti
                                    </button>
                                @elseif ($payment->status === 'Ditolak')
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#uploadModal{{ $payment->id }}">
                                        <i class="bi bi-arrow-repeat"></i> Upload Ulang
                                    </button>
                                @elseif ($payment->bukti_transfer)
                                    <a href="{{ asset('storage/' . $payment->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-image"></i> Lihat Bukti
                                    </a>
                                @endif

                                <div class="modal fade" id="uploadModal{{ $payment->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('customer.payments.upload', $payment) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Upload Bukti Transfer</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-secondary small">Tagihan: <strong>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</strong></p>
                                                    <input type="file" name="bukti_transfer" accept="image/*" class="form-control" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">Belum ada tagihan pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $payments->links() }}

    </div>
</div>

@endsection