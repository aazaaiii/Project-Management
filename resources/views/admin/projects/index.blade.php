@extends('layouts.admin')

@section('title', 'Project')

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
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama project/customer...">
                    <button type="submit" class="btn btn-outline-primary ms-2"><i class="bi bi-search"></i></button>
                </form>

                <form method="GET">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        @foreach (['Menunggu', 'Sedang Pengerjaan', 'Selesai', 'Batal'] as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary rounded-pill px-3">
                <i class="bi bi-plus-lg"></i> Tambah Project
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Nama Project</th>
                        <th>Customer</th>
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
                            <td>{{ $project->customer->user->name }}</td>
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
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus project ini?')">
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
                            <td colspan="6" class="text-center text-secondary py-4">Belum ada data project.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}

    </div>
</div>

@endsection