@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Tentang Sejenak Studio</h1>
        <p class="lead">Kenali kami lebih dekat.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow" alt="Studio">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-3">Visi & Misi</h2>
            <p>Sejenak Studio lahir dari keinginan untuk membantu setiap orang mengabadikan momen berharga mereka dengan kualitas terbaik dan harga yang terjangkau. Kami percaya bahwa setiap jepretan adalah cerita yang layak disimpan selamanya.</p>
            <p>Misi kami adalah memberikan layanan fotografi yang ramah, profesional, dan kreatif bagi masyarakat Purwokerto dan sekitarnya.</p>
            
            <h2 class="fw-bold mt-4 mb-3">Kenapa Memilih Kami?</h2>
            <ul class="list-unstyled">
                <li><i class="fas fa-check-circle text-primary me-2"></i> Fotografer berpengalaman</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Berbagai pilihan background unik</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Peralatan studio modern</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Harga kompetitif & transparan</li>
            </ul>
        </div>
    </div>
</div>
@endsection
