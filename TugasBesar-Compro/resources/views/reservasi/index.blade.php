@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Buat Reservasi</h1>
        <p class="lead">Pilih paket dan jadwal sesuai keinginan Anda.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reservasi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">No. HP (WhatsApp)</label>
                            <input type="text" name="phone" class="form-control" placeholder="Contoh: 08123456789" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Paket Layanan</label>
                        <select name="service_package_id" class="form-select" required>
                            <option value="">-- Pilih Paket --</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}" {{ old('service_package_id') == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="reservation_date" class="form-control" value="{{ old('reservation_date') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jam</label>
                            <select name="reservation_time" class="form-select" required>
                                <option value="">-- Pilih Jam --</option>
                                @php
                                    $times = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];
                                @endphp
                                @foreach($times as $time)
                                    <option value="{{ $time }}" {{ old('reservation_time') == $time ? 'selected' : '' }}>{{ $time }} WIB</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jumlah Orang</label>
                        <input type="number" name="head_count" class="form-control" min="1" value="{{ old('head_count', 1) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control" rows="3" placeholder="Contoh: Request background warna putih">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">KIRIM RESERVASI</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
