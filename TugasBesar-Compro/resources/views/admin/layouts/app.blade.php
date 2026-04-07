<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Sejenak Studio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #007A75; color: white; padding: 20px; z-index: 1000; overflow-y: auto;}
        .main-content { margin-left: 250px; padding: 30px; }
        .nav-link { color: #e0f2f1; padding: 12px 15px; border-radius: 8px; margin-bottom: 5px; }
        .nav-link:hover, .nav-link.active { background: #00A99D; color: white; }
        .stat-card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="fw-bold mb-4 text-white">SEJENAK <span style="color:#FFD000;">ADMIN</span></h4>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a class="nav-link {{ request()->routeIs('admin.reservations*') ? 'active' : '' }}" href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-check me-2"></i> Reservasi</a>
            <a class="nav-link {{ request()->routeIs('admin.packages*') ? 'active' : '' }}" href="{{ route('admin.packages') }}"><i class="fas fa-boxes me-2"></i> Paket Layanan</a>
            <a class="nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}" href="{{ route('admin.galleries') }}"><i class="fas fa-images me-2"></i> Galeri Foto</a>
            <a class="nav-link {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}" href="{{ route('admin.faqs') }}"><i class="fas fa-question-circle me-2"></i> FAQ & Bot</a>
            <hr class="border-light opacity-50">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link bg-transparent border-0 text-start w-100" style="color: #ffcccc;"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
