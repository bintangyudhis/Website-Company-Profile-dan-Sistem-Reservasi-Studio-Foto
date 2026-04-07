@extends('admin.layouts.app')

@section('title', 'Manajemen Informasi & FAQ - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold" style="color: #007A75;">Manajemen Informasi (Chatbot DB)</h3>
        <p class="text-muted mb-0">Kelola informasi harga, kontak, dan lokasi yang digunakan oleh Chatbot.</p>
    </div>
    <button class="btn fw-bold text-dark" style="background:#FFD000;" data-bs-toggle="modal" data-bs-target="#addFaqModal">
        <i class="fas fa-plus me-2"></i>Tambah Info Baru
    </button>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th class="text-secondary" width="30%">Topik / Pertanyaan (Keyword)</th>
                    <th class="text-secondary" width="55%">Isi Informasi / Jawaban</th>
                    <th class="text-secondary text-end" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr>
                    <td class="fw-bold text-dark">{{ $faq->question }}</td>
                    <td class="text-muted"><pre style="font-family:inherit; white-space: pre-wrap; font-size:13px; margin:0;">{{ Str::limit($faq->answer, 150) }}</pre></td>
                    <td class="text-end">
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus informasi ini?');"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-muted">Belum ada data informasi/FAQ.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah FAQ -->
<div class="modal fade" id="addFaqModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 border-0">
            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 bg-light">
                    <h5 class="modal-title fw-bold" style="color:#007A75;">Tambah Informasi Chatbot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Topik / Pertanyaan (Keywords)</label>
                        <input type="text" name="question" class="form-control" placeholder="Contoh: Lokasi studio dimana?" required>
                        <small class="text-muted">Gunakan kata kunci atau kalimat pertanyaan yang sering ditanyakan user.</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jawaban / Isi Informasi</label>
                        <textarea name="answer" class="form-control" rows="5" placeholder="Masukkan jawaban bot di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white fw-bold" style="background:#00A99D;">Simpan Informasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
