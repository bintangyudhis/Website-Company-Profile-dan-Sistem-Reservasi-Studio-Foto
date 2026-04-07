@extends('admin.layouts.app')

@section('title', 'Manajemen Paket Layanan - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold" style="color: #007A75;">Manajemen Paket Layanan</h3>
    <a href="{{ route('admin.packages.create') }}" class="btn fw-bold" style="background:#FFD000; color:#1A1A2E;"><i class="fas fa-plus me-2"></i>Tambah Paket</a>
</div>

<div class="row g-4">
    @forelse($packages as $package)
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 position-relative">

            
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="fw-bold mb-0">{{ $package->name }}</h5>
                    <span class="badge bg-primary rounded-pill"><i class="fas fa-users me-1"></i>{{ $package->max_people }} Orang</span>
                </div>
                <h6 class="text-success fw-bold mb-3">Rp {{ number_format($package->price, 0, ',', '.') }}</h6>
                <p class="text-muted small">{{ Str::limit($package->description, 80) }}</p>
                
            </div>
            
            <div class="card-footer bg-white border-0 p-4 pt-0 d-flex gap-2">
                <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-outline-primary flex-grow-1"><i class="fas fa-edit me-1"></i>Edit</a>
                <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus paket ini?');" title="Hapus"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <div class="bg-white rounded-4 p-5 shadow-sm">
            <i class="fas fa-boxes fa-4x text-muted mb-3 opacity-25"></i>
            <h5 class="text-muted">Belum ada paket layanan</h5>
            <p>Klik tombol "Tambah Paket" untuk membuat paket baru.</p>
        </div>
    </div>
    @endforelse
</div>
@endsection
