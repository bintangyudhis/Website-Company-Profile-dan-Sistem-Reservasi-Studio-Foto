<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejenak Studio - Photo Studio & Reservation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* ===== SEJENAK STUDIO - BRAND COLOR PALETTE ===== */
        :root {
            --teal:       #00A99D;
            --teal-dark:  #007A75;
            --teal-light: #E0F7F5;
            --yellow:     #FFD000;
            --yellow-dark:#E6B800;
            --dark:       #1A1A2E;
            --grey-soft:  #F5F7F8;
        }

        body { font-family: 'Poppins', sans-serif; background-color: var(--grey-soft); color: #333; }

        /* Navbar */
        .navbar { background-color: #fff; box-shadow: 0 2px 8px rgba(0,169,157,0.15); }
        .navbar-brand span { color: var(--teal); }
        .nav-link:hover, .nav-link.active { color: var(--teal) !important; }

        /* Bootstrap primary override */
        .btn-primary  { background-color: var(--teal) !important; border-color: var(--teal) !important; color: #fff !important; }
        .btn-primary:hover { background-color: var(--teal-dark) !important; border-color: var(--teal-dark) !important; }
        .btn-outline-primary { border-color: var(--teal) !important; color: var(--teal) !important; }
        .btn-outline-primary:hover { background-color: var(--teal) !important; color: white !important; }
        .text-primary { color: var(--teal) !important; }
        .bg-primary   { background-color: var(--teal) !important; }
        .border-primary { border-color: var(--teal) !important; }

        /* Yellow accent */
        .btn-yellow { background-color: var(--yellow); border: none; color: #1A1A2E; font-weight: 600; }
        .btn-yellow:hover { background-color: var(--yellow-dark); color: #1A1A2E; }
        .text-yellow { color: var(--yellow) !important; }
        .badge-teal   { background-color: var(--teal); color: white; }

        /* Hero */
        .hero-section {
            background: linear-gradient(rgba(0,169,157,0.85), rgba(0,122,117,0.92)),
                        url('https://images.unsplash.com/photo-1542038784456-1ea8e935640e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover; background-position: center;
            color: white; padding: 120px 0;
        }

        /* Footer */
        footer { background-color: var(--teal-dark); color: white; padding: 50px 0; }
        footer a { color: rgba(255,255,255,0.75) !important; }
        footer a:hover { color: var(--yellow) !important; }

        /* Chatbot Floating Button */
        #chatbot-bubble {
            position: fixed; bottom: 24px; right: 24px;
            width: 60px; height: 60px;
            background: var(--teal-dark);
            color: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 26px; text-decoration: none;
            box-shadow: 0 4px 16px rgba(0,169,157,0.4);
            z-index: 1000;
            transition: transform 0.2s, background 0.2s;
        }
        #chatbot-bubble:hover { background: var(--teal); transform: scale(1.08); color: white; }
        #chatbot-bubble .chat-badge {
            position: absolute; top: -2px; right: -2px;
            background: var(--yellow); color: #1A1A2E;
            border-radius: 50%; width: 18px; height: 18px;
            font-size: 10px; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">SEJENAK <span class="text-primary">STUDIO</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('paket') }}">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('informasi') }}">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('chatbot.index') }}"><i class="fas fa-robot me-1 text-success"></i>Chatbot</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary rounded-pill px-4" href="{{ route('reservasi.index') }}">Reservasi Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">SEJENAK STUDIO</h5>
                    <p class="small text-muted">Menangkap setiap momen berharga Anda dengan sentuhan profesional di Purwokerto.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">LINK CEPAT</h5>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('paket') }}" class="text-decoration-none text-muted">Paket Layanan</a></li>
                        <li><a href="{{ route('galeri') }}" class="text-decoration-none text-muted">Galeri Foto</a></li>
                        <li><a href="{{ route('reservasi.index') }}" class="text-decoration-none text-muted">Buat Janji</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">IKUTI KAMI</h5>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://instagram.com/sejenakselfphoto" target="_blank" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 border-secondary">
            <p class="small text-muted mb-0">&copy; 2024 Sejenak Studio Purwokerto. All rights reserved.</p>
        </div>
    </footer>

    <!-- Chatbot Floating Button → arahkan ke halaman chat room -->
    <a href="{{ route('chatbot.index') }}" id="chatbot-bubble" title="Tanya Sejenak Bot">
        <i class="fas fa-comments"></i>
        <span class="chat-badge">!</span>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
