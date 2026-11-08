@extends('layouts.admin')

@section('title', 'Customer')

@section('content')

@if (session('success'))
    <div class="alert alert-success rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <form method="GET" class="d-flex" style="max-width: 320px;">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama atau email...">
                <button type="submit" class="btn btn-outline-primary ms-2"><i class="bi bi-search"></i></button>
            </form>

            <a href="{{ route('admin.customers.create') }}" class="btn btn-primary rounded-pill px-3">
                <i class="bi bi-plus-lg"></i> Tambah Customer
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-secondary small">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. WhatsApp</th>
                        <th>Bergabung</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td class="fw-semibold">{{ $customer->user->name }}</td>
                            <td>{{ $customer->user->email }}</td>
                            <td>{{ $customer->no_whatsapp ?? '-' }}</td>
                            <td>{{ $customer->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus customer ini?')">
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
                            <td colspan="5" class="text-center text-secondary py-4">Belum ada data customer.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $customers->links() }}

    </div>
</div>

@endsection