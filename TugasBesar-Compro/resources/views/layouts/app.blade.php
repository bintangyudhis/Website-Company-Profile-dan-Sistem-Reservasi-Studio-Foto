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
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-primary { background-color: #0d6efd; border: none; }
        .hero-section { background: linear-gradient(RGBA(0,0,0,0.6), RGBA(0,0,0,0.6)), url('https://images.unsplash.com/photo-1542038784456-1ea8e935640e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center; color: white; padding: 100px 0; }
        footer { background-color: #212529; color: white; padding: 40px 0; }
        /* Chatbot Style */
        #chatbot-bubble { position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; background: #0d6efd; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; cursor: pointer; box-shadow: 0 4px 10px rgba(0,0,0,0.2); z-index: 1000; }
        #chatbot-window { position: fixed; bottom: 90px; right: 20px; width: 350px; height: 450px; background: white; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.2); display: none; flex-direction: column; z-index: 1000; overflow: hidden; }
        .chat-header { background: #0d6efd; color: white; padding: 15px; font-weight: bold; }
        .chat-body { flex: 1; padding: 15px; overflow-y: auto; background: #f0f2f5; }
        .chat-footer { padding: 10px; border-top: 1px solid #eee; display: flex; }
        .message { margin-bottom: 10px; padding: 8px 12px; border-radius: 15px; max-width: 80%; }
        .bot { background: #e9ecef; align-self: flex-start; }
        .user { background: #0d6efd; color: white; align-self: flex-end; margin-left: auto; }
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
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
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 border-secondary">
            <p class="small text-muted mb-0">&copy; 2024 Sejenak Studio Purwokerto. All rights reserved.</p>
        </div>
    </footer>

    <!-- Chatbot UI -->
    <div id="chatbot-bubble">
        <i class="fas fa-comment-dots"></i>
    </div>
    <div id="chatbot-window">
        <div class="chat-header d-flex justify-content-between align-items-center">
            <span>Tanya Sejenak Bot</span>
            <button class="btn btn-sm text-white" onclick="toggleChat()"><i class="fas fa-times"></i></button>
        </div>
        <div class="chat-body d-flex flex-column" id="chat-messages">
            <div class="message bot">Halo! Ada yang bisa saya bantu? Silakan tanya apa saja tentang Sejenak Studio.</div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chat-input" class="form-control form-control-sm" placeholder="Ketik pertanyaan...">
            <button class="btn btn-primary btn-sm ms-2" onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleChat() {
            $('#chatbot-window').fadeToggle();
        }
        $('#chatbot-bubble').click(toggleChat);

        function sendMessage() {
            let msg = $('#chat-input').val();
            if(!msg) return;

            $('#chat-messages').append(`<div class="message user">${msg}</div>`);
            $('#chat-input').val('');
            $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);

            $.post("{{ route('chatbot.chat') }}", {
                _token: "{{ csrf_token() }}",
                message: msg
            }, function(data) {
                $('#chat-messages').append(`<div class="message bot">${data.reply}</div>`);
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
            });
        }

        $('#chat-input').keypress(function(e) {
            if(e.which == 13) sendMessage();
        });
    </script>
</body>
</html>
