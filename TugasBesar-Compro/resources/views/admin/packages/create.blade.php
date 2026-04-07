@extends('admin.layouts.app')

@section('title', 'Tambah Paket Layanan - Sejenak Studio')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color: #007A75;">Tambah Paket Baru</h3>
        <a href="{{ route('admin.packages') }}" class="btn btn-outline-secondary"><i
                class="fas fa-arrow-left me-2"></i>Kembali</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nama Paket</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Tambahan</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                <small class="text-muted">Jelaskan fasilitas paket singkat.</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Beban Maksimal Orang</label>
                <input type="number" name="max_people" class="form-control" value="{{ old('max_people') }}" required>
            </div>
        </div>

            <button type="submit" class="btn fw-bold py-2 w-100 mt-3" style="background:#00A99D; color:white;">Simpan
                Paket</button>
        </form>
    </div>
@endsection
