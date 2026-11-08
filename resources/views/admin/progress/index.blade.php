@extends('layouts.admin')

@section('title', 'Progress')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <form method="GET" class="d-flex mb-4" style="max-width: 320px;">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama project...">
            <button type="submit" class="btn btn-outline-primary ms-2"><i class="bi bi-search"></i></button>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Nama Project</th>
                        <th>Customer</th>
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
                            <td><span class="badge bg-primary">{{ $project->status }}</span></td>
                            <td>{{ $project->persentase_progress }}%</td>
                            <td class="text-end">
                                <a href="{{ route('admin.progress.show', $project) }}" class="btn btn-sm btn-primary rounded-pill">
                                    <i class="bi bi-graph-up"></i> Kelola Progress
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">Belum ada data project.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}

    </div>
</div>

@endsection