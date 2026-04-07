@extends('admin.layouts.app')

@section('title', 'Edit Informasi & FAQ - Sejenak Studio')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color: #007A75;">Edit Informasi Chatbot</h3>
        <a href="{{ route('admin.faqs') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Topik / Pertanyaan (Keywords)</label>
                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}"
                    required>
                <small class="text-muted">Gunakan kata kunci atau kalimat pertanyaan yang sering ditanyakan user.</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Jawaban / Isi Informasi</label>
                <textarea name="answer" class="form-control" rows="8" required>{{ old('answer', $faq->answer) }}</textarea>
                <small class="text-muted">Gunakan Enter untuk membuat paragraf / baris baru.</small>
            </div>

            <button type="submit" class="btn fw-bold py-2 w-100 text-white" style="background:#00A99D;">Simpan
                Perubahan</button>
        </form>
    </div>
@endsection
