@extends('layouts.customer')

@section('title', $project->nama_project)

@section('content')

<div class="row g-4">

    <div class="col-lg-7">
        <div class="card border-0 shadow-sm p-4 mb-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="fw-bold mb-1">{{ $project->nama_project }}</h5>
                    <p class="text-secondary small mb-0">{{ $project->lokasi }} — {{ $project->jenis_renovasi }}</p>
                </div>
                <h4 class="fw-bold text-primary mb-0">{{ $project->persentase_progress }}%</h4>
            </div>
            <div class="row text-secondary small">
                <div class="col-6">Tanggal Mulai: {{ $project->tanggal_mulai?->format('d M Y') ?? '-' }}</div>
                <div class="col-6">Estimasi Selesai: {{ $project->estimasi_selesai?->format('d M Y') ?? '-' }}</div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-semibold mb-3">Riwayat Progress</h6>

            @forelse ($project->progress as $item)
                <div class="d-flex gap-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-primary" style="width: 12px; height: 12px;"></div>
                        <div class="flex-grow-1 border-start" style="width: 1px;"></div>
                    </div>
                    <div class="flex-grow-1 pb-2">
                        <p class="text-secondary small mb-1">{{ $item->tanggal->format('d M Y') }} — {{ $item->persentase }}%</p>
                        <p class="mb-2">{{ $item->keterangan }}</p>

                        @if ($item->photos->count() > 0)
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($item->photos as $photo)
                                    <a href="{{ asset('storage/' . $photo->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $photo->foto) }}" class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-secondary small">Belum ada update progress.</p>
            @endforelse
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-semibold mb-3">Riwayat Pembayaran</h6>

            @forelse ($project->payments as $payment)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <p class="fw-semibold mb-0 small">Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</p>
                        <p class="text-secondary mb-0" style="font-size: 0.75rem;">{{ $payment->tanggal->format('d M Y') }}</p>
                    </div>
                    @php
                        $badgeColor = match($payment->status) {
                            'Pending' => 'warning',
                            'Diverifikasi' => 'success',
                            'Ditolak' => 'danger',
                        };
                    @endphp
                    <span class="badge bg-{{ $badgeColor }}">{{ $payment->status }}</span>
                </div>
            @empty
                <p class="text-secondary small mb-0">Belum ada tagihan pembayaran untuk proyek ini.</p>
            @endforelse

            <a href="{{ route('customer.payments.index') }}" class="btn btn-outline-primary btn-sm w-100 mt-3">
                Kelola Pembayaran
            </a>
        </div>
    </div>

</div>

@endsection