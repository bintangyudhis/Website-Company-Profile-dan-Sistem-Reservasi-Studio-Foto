@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Galeri Foto</h1>
        <p class="lead">Koleksi karya terbaik dari Sejenak Studio.</p>
    </div>
</div>

<div class="container py-5">
    <!-- Filter (Opsional) -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
        <button class="btn btn-primary rounded-pill px-4">Semua</button>
        <button class="btn btn-outline-primary rounded-pill px-4">Berdua</button>
        <button class="btn btn-outline-primary rounded-pill px-4">Senandung</button>
        <button class="btn btn-outline-primary rounded-pill px-4">Memori</button>
        <button class="btn btn-outline-primary rounded-pill px-4">Lembayung</button>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm overflow-hidden rounded-4 h-100">
                <img src="https://via.placeholder.com/600x600?text={{ $gallery->title }}" class="img-fluid" alt="{{ $gallery->title }}">
                <div class="p-3 text-center">
                    <h6 class="fw-bold mb-1">{{ $gallery->title }}</h6>
                    <span class="text-muted small">{{ $gallery->category }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-images fa-3x text-light mb-3"></i>
            <p class="text-muted">Galeri masih kosong.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
