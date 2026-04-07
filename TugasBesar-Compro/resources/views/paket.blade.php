@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Paket Layanan</h1>
        <p class="lead">Temukan paket yang paling sesuai dengan kebutuhan Anda.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        @foreach($packages as $package)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="https://via.placeholder.com/400x300?text={{ $package->name }}" class="card-img-top" alt="{{ $package->name }}">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-2">{{ $package->name }}</h4>
                    <p class="text-muted small mb-3">{{ $package->description }}</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary fw-bold h4 m-0">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-users me-1"></i> Max {{ $package->max_people }} orang</span>
                    </div>
                    <a href="{{ route('reservasi.index', ['package' => $package->id]) }}" class="btn btn-primary w-100 rounded-pill py-2">Pilih Paket ini</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
