@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <section style="background: linear-gradient(135deg, #00A99D 0%, #007A75 100%); color: white; padding: 60px 0 40px;">
        <div class="container text-center">
            <h1 class="fw-bold display-5 mb-2">Pricelist Selfphoto</h1>
            <p class="mb-0" style="color: rgba(255,255,255,0.85);">Pilih paket yang sesuai dan abadikan momen terbaik Anda!
            </p>
            <div class="mt-3" style="color: #FFD000; font-size: 14px;">
                <i class="fas fa-clock me-1"></i> Jam Operasional: 10.00 – 21.00 WIB &nbsp;|&nbsp;
                <i class="fas fa-calendar-alt me-1"></i> Setiap hari (termasuk libur)
            </div>
        </div>
    </section>

    {{-- ===== PAKET GRID ===== --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">

                @foreach ($packages as $package)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                            @if (Str::contains(strtolower($package->name), 'memori'))
                                <div
                                    style="position:absolute; top:12px; right:12px; background:#FFD000; color:#1A1A2E; font-size:11px; font-weight:700; padding:3px 10px; border-radius:20px;">
                                    POPULER
                                </div>
                            @endif
                            <div class="text-center p-3" style="background: #00A99D;">
                                <h5 class="fw-bold text-white mb-0">{{ $package->name }}</h5>
                            </div>
                            <div class="text-center py-3" style="background: #007A75;">
                                <span style="font-size: 2.8rem; font-weight: 800; color: #FFD000; line-height:1;">
                                    {{ $package->price >= 1000 ? intval($package->price / 1000) . 'K' : $package->price }}
                                </span>
                            </div>
                            <div class="card-body p-4" style="background: #007A75; color: white;">
                                <ul class="list-unstyled mb-4" style="font-size: 14px; line-height: 2.0;">
                                    @foreach (explode("\n", $package->description) as $line)
                                        @if (trim($line))
                                            <li>
                                                <i class="fas fa-check-circle me-2" style="color:#FFD000;"></i>
                                                {{ ltrim(trim($line), '– ') }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <a href="{{ route('reservasi.index', ['package_id' => $package->id]) }}"
                                    class="btn w-100 fw-bold rounded-pill"
                                    style="background:#FFD000; color:#1A1A2E; border:none;">
                                    Pilih Paket
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ===== ADD-ON INFO ===== --}}
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="text-center p-4 rounded-4"
                        style="background: rgba(0,169,157,0.08); border: 2px dashed #00A99D;">
                        <h6 class="fw-bold mb-3" style="color: #007A75;">
                            <i class="fas fa-plus-circle me-2" style="color:#FFD000;"></i>Biaya Penambahan
                        </h6>
                        <div class="d-flex justify-content-center gap-4 flex-wrap">
                            <div class="text-center">
                                <div style="font-size: 1.5rem; font-weight: 800; color: #00A99D;">Rp 20.000</div>
                                <div style="font-size: 13px; color: #555;">+10 menit sesi foto</div>
                            </div>
                            <div style="width:1px; background:#ddd;" class="d-none d-md-block"></div>
                            <div class="text-center">
                                <div style="font-size: 1.5rem; font-weight: 800; color: #00A99D;">Rp 10.000</div>
                                <div style="font-size: 13px; color: #555;">+1 orang tambahan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== BACKGROUND SECTION ===== --}}
    <section class="py-5" style="background: linear-gradient(135deg, #00A99D 0%, #007A75 100%);">
        <div class="container">
            <h2 class="fw-bold text-white text-center mb-2">Background</h2>
            <p class="text-center mb-5" style="color: rgba(255,255,255,0.8);">Pilih background favoritmu — semua paket
                termasuk 1 pilihan background</p>

            <div class="row g-4 justify-content-center">

                {{-- White --}}
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow rounded-4 overflow-hidden text-center">
                        <div
                            style="height: 200px; background: linear-gradient(180deg, #f5f5f5, #e0e0e0); display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-square"
                                style="font-size: 60px; color: #e0e0e0; border: 3px solid #bbb; padding: 10px; border-radius: 8px;"></i>
                        </div>
                        <div class="p-3" style="background: #007A75;">
                            <h6 class="fw-bold mb-0"
                                style="color: #FFD000; font-family: 'Georgia', serif; font-style: italic;">White</h6>
                        </div>
                    </div>
                </div>

                {{-- Elevator --}}
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow rounded-4 overflow-hidden text-center">
                        <div
                            style="height: 200px; background: linear-gradient(180deg, #c8c8c8, #a0a0a0); display:flex; align-items:center; justify-content:center; flex-direction:column; gap:8px;">
                            <div
                                style="width:40px; height:60px; border: 3px solid #888; border-radius: 4px; background: #bbb;">
                            </div>
                            <div style="font-size: 11px; color:#666; font-weight:bold;">ELEVATOR</div>
                        </div>
                        <div class="p-3" style="background: #007A75;">
                            <h6 class="fw-bold mb-0"
                                style="color: #FFD000; font-family: 'Georgia', serif; font-style: italic;">Elevator</h6>
                        </div>
                    </div>
                </div>

                {{-- Red Box --}}
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow rounded-4 overflow-hidden text-center">
                        <div
                            style="height: 200px; background: linear-gradient(180deg, #E05A2B, #C04020); display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-box" style="font-size: 60px; color: rgba(255,255,255,0.3);"></i>
                        </div>
                        <div class="p-3" style="background: #007A75;">
                            <h6 class="fw-bold mb-0"
                                style="color: #FFD000; font-family: 'Georgia', serif; font-style: italic;">Red Box</h6>
                        </div>
                    </div>
                </div>

                {{-- Grey --}}
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow rounded-4 overflow-hidden text-center">
                        <div
                            style="height: 200px; background: linear-gradient(180deg, #7A7A7A, #555); display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-square" style="font-size: 60px; color: rgba(255,255,255,0.2);"></i>
                        </div>
                        <div class="p-3" style="background: #007A75;">
                            <h6 class="fw-bold mb-0"
                                style="color: #FFD000; font-family: 'Georgia', serif; font-style: italic;">Grey</h6>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <a href="{{ route('reservasi.index') }}" class="btn btn-lg fw-bold rounded-pill px-5 py-3"
                    style="background: #FFD000; color: #1A1A2E; border:none; font-size:16px;">
                    <i class="fas fa-calendar-check me-2"></i>Reservasi Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection
