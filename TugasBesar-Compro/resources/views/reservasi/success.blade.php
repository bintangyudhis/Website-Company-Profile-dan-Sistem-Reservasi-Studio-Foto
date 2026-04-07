@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="py-5">
                <i class="fas fa-check-circle text-success display-1 mb-4"></i>
                <h1 class="fw-bold">Reservasi Berhasil!</h1>
                <p class="lead text-muted mb-5">Terima kasih telah melakukan reservasi. Tim kami akan segera menghubungi Anda melalui WhatsApp untuk proses konfirmasi pembayaran dan jadwal.</p>
                
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary px-4 rounded-pill">Kembali ke Home</a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success px-4 rounded-pill"><i class="fab fa-whatsapp me-2"></i> Konfirmasi via WA</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
