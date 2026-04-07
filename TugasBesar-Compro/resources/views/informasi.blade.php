@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <section style="background: linear-gradient(135deg, #00A99D 0%, #007A75 100%); color: white; padding: 60px 0 40px;">
        <div class="container text-center">
            <h1 class="fw-bold display-5 mb-2">Informasi Studio</h1>
            <p style="color: rgba(255,255,255,0.85);">Temukan kami dan ketahui lebih lanjut tentang Sejenak Selfphoto Studio
                Purwokerto</p>
        </div>
    </section>

    {{-- ===== MAIN CONTENT ===== --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                {{-- ===== LEFT: INFO CARDS ===== --}}
                <div class="col-lg-4">

                    {{-- Jam Operasional --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="p-3 d-flex align-items-center gap-3" style="background: #00A99D;">
                            <div
                                style="width:40px; height:40px; background:rgba(255,255,255,0.2); border-radius:10px; display:flex; align-items:center; justify-content:center;">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <h6 class="fw-bold text-white mb-0">Jam Operasional</h6>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Senin – Minggu</span>
                                <span class="fw-bold" style="color:#00A99D;">10:00 – 21:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small">Hari Libur Nasional</span>
                                <span class="fw-bold" style="color:#00A99D;">10:00 – 21:00 WIB</span>
                            </div>
                            <div class="mt-3 p-2 rounded-3 text-center"
                                style="background: #E0F7F5; font-size: 13px; color: #007A75;">
                                <i class="fas fa-check-circle me-1"></i> <strong>Buka setiap hari!</strong> Termasuk hari
                                libur
                            </div>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="p-3 d-flex align-items-center gap-3" style="background: #00A99D;">
                            <div
                                style="width:40px; height:40px; background:rgba(255,255,255,0.2); border-radius:10px; display:flex; align-items:center; justify-content:center;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <h6 class="fw-bold text-white mb-0">Alamat Lengkap</h6>
                        </div>
                        <div class="p-4">
                            <p class="mb-3" style="font-size: 14px; line-height: 1.7; color: #444;">
                                Gg. Masjid, Mangunjaya, Purwokerto,<br>
                                Kec. Purwokerto Tim.,<br>
                                Kabupaten Banyumas,<br>
                                Jawa Tengah 53114
                            </p>
                            <a href="https://www.google.com/maps?q=-7.419678, 109.250097" target="_blank"
                                class="btn w-100 fw-bold rounded-pill"
                                style="background: #FFD000; color: #1A1A2E; border: none; font-size: 14px;">
                                <i class="fas fa-directions me-2"></i>Get Directions
                            </a>
                        </div>
                    </div>

                    {{-- Kontak --}}
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="p-3 d-flex align-items-center gap-3" style="background: #00A99D;">
                            <div
                                style="width:40px; height:40px; background:rgba(255,255,255,0.2); border-radius:10px; display:flex; align-items:center; justify-content:center;">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <h6 class="fw-bold text-white mb-0">Hubungi Kami</h6>
                        </div>
                        <div class="p-4">
                            <a href="https://wa.me/6285878059861" target="_blank"
                                class="d-flex align-items-center gap-3 text-decoration-none mb-3 p-3 rounded-3"
                                style="background: #f0fdf4; border: 1px solid #bbf7d0;">
                                <div
                                    style="width:38px; height:38px; background:#25d366; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fab fa-whatsapp text-white"></i>
                                </div>
                                <div>
                                    <div style="font-size:13px; color:#555;">WhatsApp</div>
                                    <div class="fw-bold" style="color:#16a34a;">0858-7805-9861</div>
                                </div>
                            </a>

                            <a href="https://instagram.com/sejenakselfphoto" target="_blank"
                                class="d-flex align-items-center gap-3 text-decoration-none p-3 rounded-3"
                                style="background: #fdf4ff; border: 1px solid #e9d5ff;">
                                <div
                                    style="width:38px; height:38px; background: linear-gradient(135deg, #f093fb, #f5576c); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fab fa-instagram text-white"></i>
                                </div>
                                <div>
                                    <div style="font-size:13px; color:#555;">Instagram</div>
                                    <div class="fw-bold" style="color:#7c3aed;">@sejenakselfphoto</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- ===== RIGHT: GOOGLE MAPS ===== --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        {{-- Map Header --}}
                        <div class="p-3 d-flex justify-content-between align-items-center"
                            style="background: #007A75; color: white;">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-map-marked-alt"></i>
                                <span class="fw-bold">Lokasi Sejenak Selfphoto Studio Purwokerto</span>
                            </div>
                            <a href="https://www.google.com/maps?q=-7.419678,109.250097" target="_blank"
                                class="btn btn-sm fw-bold rounded-pill px-3"
                                style="background: #FFD000; color: #1A1A2E; border:none; font-size: 12px;">
                                <i class="fas fa-external-link-alt me-1"></i>Buka di Google Maps
                            </a>
                        </div>

                        {{-- Google Maps Embed --}}
                        {{-- Klik map untuk membuka Google Maps --}}
                        <div style="position: relative; cursor: pointer;"
                            onclick="window.open('https://www.google.com/maps?q=-7.419678,109.250097', '_blank')">
                            <iframe src="https://maps.google.com/maps?q=-7.419678,109.250097&z=17&output=embed"
                                width="100%" height="450" style="border:0; display:block;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                title="Lokasi Sejenak Selfphoto Studio Purwokerto">
                            </iframe>
                            {{-- Overlay tooltip --}}
                            <div
                                style="position:absolute; bottom:16px; left:50%; transform:translateX(-50%); background: rgba(0,0,0,0.75); color:white; padding: 8px 16px; border-radius: 20px; font-size:13px; pointer-events:none;">
                                <i class="fas fa-hand-pointer me-1"></i> Klik untuk membuka Google Maps
                            </div>
                        </div>

                        {{-- Footer info --}}
                        <div class="p-3 d-flex align-items-center gap-2"
                            style="background: #E0F7F5; font-size: 13px; color: #007A75;">
                            <i class="fas fa-map-pin me-1"></i>
                            <strong>Koordinat:</strong>&nbsp;-7.419678, 109.250097 &nbsp;|&nbsp;
                            <a href="https://www.google.com/maps?q=-7.419678,109.250097" target="_blank"
                                style="color:#00A99D; font-weight:600;">
                                Buka di Google Maps <i class="fas fa-external-link-alt ms-1" style="font-size:11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ===== RATING & REVIEW SECTION ===== --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4"
                        style="background: linear-gradient(135deg, #007A75 0%, #00A99D 100%); color: white;">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <div style="font-size: 4rem; font-weight: 800; color: #FFD000; line-height: 1;">5.0
                                </div>
                                <div class="mb-1">
                                    <i class="fas fa-star" style="color:#FFD000;"></i>
                                    <i class="fas fa-star" style="color:#FFD000;"></i>
                                    <i class="fas fa-star" style="color:#FFD000;"></i>
                                    <i class="fas fa-star" style="color:#FFD000;"></i>
                                    <i class="fas fa-star" style="color:#FFD000;"></i>
                                </div>
                                <div style="font-size: 13px; color: rgba(255,255,255,0.8);">678 ulasan di Google Maps
                                </div>
                            </div>
                            <div class="col-md-1 d-none d-md-flex justify-content-center">
                                <div style="width:1px; background:rgba(255,255,255,0.2); height:80px;"></div>
                            </div>
                            <div class="col-md-7">
                                <h5 class="fw-bold mb-1">Sejenak Selfphoto Studio Purwokerto</h5>
                                <p style="color:rgba(255,255,255,0.8); font-size:14px; margin-bottom:12px;">
                                    Portrait Studio terpercaya di Purwokerto dengan ratusan ulasan bintang 5 dari
                                    pelanggan
                                    setia kami.
                                </p>
                                <a href="https://www.google.com/maps?q=-7.419678,109.250097" target="_blank"
                                    class="btn fw-bold rounded-pill px-4"
                                    style="background: #FFD000; color: #1A1A2E; border:none; font-size:14px;">
                                    <i class="fab fa-google me-2"></i>Lihat di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
