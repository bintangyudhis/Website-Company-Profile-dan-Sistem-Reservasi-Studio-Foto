@extends('admin.layouts.app')

@section('title', 'Manajemen Galeri - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold" style="color: #007A75;">Manajemen Galeri</h3>
    <button class="btn fw-bold text-dark" style="background:#FFD000;" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
        <i class="fas fa-plus me-2"></i>Tambah Foto
    </button>
</div>

<div class="row g-4">
    @forelse($galleries as $gallery)
    <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative h-100">
            <img src="{{ url('images/galleries/' . $gallery->image) }}" onerror="this.src='https://via.placeholder.com/600x600?text={{ $gallery->category }}'" class="img-fluid" style="object-fit: cover; aspect-ratio: 1/1;" alt="{{ $gallery->title }}">
            
            <div class="p-2 text-center bg-white">
                <span class="badge bg-primary mb-1">{{ $gallery->category }}</span>
            </div>

            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger rounded-circle shadow" onclick="return confirm('Hapus foto ini?');"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
        <i class="fas fa-images fa-4x text-muted mb-3 opacity-25"></i>
        <p class="text-muted">Belum ada foto galeri, silakan tambah foto baru.</p>
    </div>
    @endforelse
</div>

<!-- Modal Tambah Galeri -->
<div class="modal fade" id="addGalleryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0">
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-0 bg-light">
                    <h5 class="modal-title fw-bold" style="color:#007A75;">Tambah Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori / Paket</label>
                        <select name="category" class="form-select" required>
                            <option value="">-- Pilih Paket --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Foto</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Untuk sementara akan menggunakan placeholder otomatis jika tidak ada gambar yang diupload.</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white fw-bold" style="background:#00A99D;">Upload Foto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
