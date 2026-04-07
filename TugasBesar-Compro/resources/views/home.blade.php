@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">Abadikan Momen <br><span class="text-primary">Terbaik Anda</span></h1>
        <p class="lead mb-5">Sejenak Studio Purwokerto menyediakan layanan fotografi profesional untuk setiap kebutuhan Anda.</p>
        <a href="{{ route('reservasi.index') }}" class="btn btn-primary btn-lg rounded-pill px-5">Booking Sekarang</a>
    </div>
</section>

<!-- Paket Unggulan -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Paket Layanan Kami</h2>
        <div class="row">
            @foreach($packages as $package)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="https://via.placeholder.com/400x300?text={{ $package->name }}" class="card-img-top" alt="{{ $package->name }}">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $package->name }}</h5>
                        <p class="text-muted small">{{ Str::limit($package->description, 100) }}</p>
                        <p class="text-primary fw-bold">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                        <a href="{{ route('paket') }}" class="btn btn-outline-primary btn-sm rounded-pill">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0">Galeri Terbaru</h2>
            <a href="{{ route('galeri') }}" class="text-decoration-none">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-3">
            @forelse($galleries as $gallery)
            <div class="col-md-4">
                <div class="ratio ratio-1x1 overflow-hidden rounded">
                    <img src="https://via.placeholder.com/600?text=Galeri+{{ $loop->iteration }}" class="img-fluid object-fit-cover" alt="Galeri">
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada foto galeri.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Apa Kata Mereka?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="p-4 bg-white shadow-sm rounded">
                    <p class="fst-italic">"Hasil fotonya bagus sekali dan adminnya sangat ramah. Rekomendasi banget!"</p>
                    <h6 class="fw-bold mb-0">- Budi Santoso</h6>
                    <div class="text-warning small"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
            </div>
            <!-- Duplikat untuk demo -->
            <div class="col-md-4">
                <div class="p-4 bg-white shadow-sm rounded">
                    <p class="fst-italic">"Proses edit cepat dan background studionya banyak pilihannya."</p>
                    <h6 class="fw-bold mb-0">- Siti Aminah</h6>
                    <div class="text-warning small"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white shadow-sm rounded">
                    <p class="fst-italic">"Harga terjangkau tapi kualitas bintang lima. Mantap Sejenak Studio!"</p>
                    <h6 class="fw-bold mb-0">- Andi Wijaya</h6>
                    <div class="text-warning small"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
