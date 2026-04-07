@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Hubungi Kami</h1>
        <p class="lead">Kami siap membantu Anda kapan saja.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-5">
            <h2 class="fw-bold mb-4">Informasi Kontak</h2>
            
            <div class="d-flex mb-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Alamat</h6>
                    <p class="text-muted small">Jl. HR Bunyamin No. 123, Purwokerto, Jawa Tengah 53122</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Telepon / WA</h6>
                    <p class="text-muted small">+62 812 3456 7890</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Email</h6>
                    <p class="text-muted small">info@sejenakstudio.com</p>
                </div>
            </div>

            <div class="mt-5">
                <h6 class="fw-bold mb-3">Ikuti Media Sosial Kami</h6>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-outline-primary rounded-circle"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-primary rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-primary rounded-circle"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-4">Kirim Pesan</h3>
                <form action="#">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <input type="email" class="form-control" placeholder="Email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Subjek</label>
                        <input type="text" class="form-control" placeholder="Tujuan Pesan">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Pesan Anda</label>
                        <textarea class="form-control" rows="5" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                    </div>
                    <button type="button" class="btn btn-primary px-5 py-2 fw-bold rounded-pill">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
