@extends('layouts.customer')

@section('title', 'Project Saya')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Nama Project</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td class="fw-semibold">{{ $project->nama_project }}</td>
                            <td>{{ $project->jenis_renovasi }}</td>
                            <td>
                                @php
                                    $badgeColor = match($project->status) {
                                        'Menunggu' => 'warning',
                                        'Sedang Pengerjaan' => 'primary',
                                        'Selesai' => 'success',
                                        'Batal' => 'danger',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeColor }}">{{ $project->status }}</span>
                            </td>
                            <td>
                                <div class="progress" style="height: 6px; width: 80px;">
                                    <div class="progress-bar bg-primary" style="width: {{ $project->persentase_progress }}%"></div>
                                </div>
                                <small class="text-secondary">{{ $project->persentase_progress }}%</small>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('customer.projects.show', $project) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">Belum ada proyek.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}
    </div>
</div>

@endsection