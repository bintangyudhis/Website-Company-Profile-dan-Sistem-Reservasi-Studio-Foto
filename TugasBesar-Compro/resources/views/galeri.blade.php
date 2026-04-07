@extends('layouts.app')

@section('content')
    <div class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="fw-bold">Galeri Foto</h1>
            <p class="lead">Koleksi karya terbaik dari Sejenak Studio.</p>
        </div>
    </div>

    <div class="container py-5">
        <!-- Filter (Opsional) -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <button class="btn btn-primary rounded-pill px-4 filter-btn" data-filter="all">Semua</button>
            <button class="btn btn-outline-primary rounded-pill px-4 filter-btn" data-filter="Berdua">Berdua</button>
            <button class="btn btn-outline-primary rounded-pill px-4 filter-btn" data-filter="Senandung">Senandung</button>
            <button class="btn btn-outline-primary rounded-pill px-4 filter-btn" data-filter="Memori">Memori</button>
            <button class="btn btn-outline-primary rounded-pill px-4 filter-btn" data-filter="Lembayung">Lembayung</button>
        </div>

        <div class="row g-4" id="gallery-container">
            @forelse($galleries as $gallery)
                <div class="col-md-4 col-sm-6 gallery-item" data-category="{{ $gallery->category }}">
                    <div class="card border-0 shadow-sm overflow-hidden rounded-4 h-100">
                        <img src="{{ url('images/galleries/' . $gallery->image) }}"
                            onerror="this.src='https://via.placeholder.com/600x600?text={{ $gallery->category }}'"
                            class="img-fluid w-100" style="object-fit: cover; aspect-ratio: 1/1;"
                            alt="Paket {{ $gallery->category }}">
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-3x text-light mb-3"></i>
                    <p class="text-muted">Galeri masih kosong.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.filter-btn');
            const items = document.querySelectorAll('.gallery-item');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active styling from all
                    buttons.forEach(btn => {
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-outline-primary');
                    });

                    // Add active styling to clicked
                    button.classList.remove('btn-outline-primary');
                    button.classList.add('btn-primary');

                    const filter = button.getAttribute('data-filter');

                    items.forEach(item => {
                        const category = item.getAttribute('data-category');
                        if (filter === 'all' || category.includes(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
