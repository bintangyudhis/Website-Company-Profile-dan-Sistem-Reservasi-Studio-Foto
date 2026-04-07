<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sejenak Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #212529; color: white; padding: 20px; }
        .main-content { margin-left: 250px; padding: 30px; }
        .nav-link { color: #888; padding: 12px 15px; border-radius: 8px; margin-bottom: 5px; }
        .nav-link:hover, .nav-link.active { background: #343a40; color: white; }
        .stat-card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="fw-bold mb-4">SEJENAK <span class="text-primary">ADMIN</span></h4>
        <nav class="nav flex-column">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-check me-2"></i> Reservasi</a>
            <a class="nav-link" href="{{ route('admin.packages') }}"><i class="fas fa-boxes me-2"></i> Paket Layanan</a>
            <a class="nav-link" href="{{ route('admin.galleries') }}"><i class="fas fa-images me-2"></i> Galeri Foto</a>
            <a class="nav-link" href="{{ route('admin.faqs') }}"><i class="fas fa-question-circle me-2"></i> FAQ & Bot</a>
            <hr class="border-secondary">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link bg-transparent border-0 text-start w-100"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Dashboard Overview</h3>
            <span class="text-muted">Halo, {{ auth()->user()->name }}!</span>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card stat-card p-3 text-center">
                    <div class="text-primary h2 mb-1">{{ $stats['total_reservations'] }}</div>
                    <div class="small text-muted text-uppercase fw-bold">Total Booking</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3 text-center">
                    <div class="text-warning h2 mb-1">{{ $stats['pending_reservations'] }}</div>
                    <div class="small text-muted text-uppercase fw-bold">Pending</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3 text-center">
                    <div class="text-success h2 mb-1">{{ $stats['confirmed_reservations'] }}</div>
                    <div class="small text-muted text-uppercase fw-bold">Dikonfirmasi</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3 text-center">
                    <div class="text-info h2 mb-1">{{ $stats['total_packages'] }}</div>
                    <div class="small text-muted text-uppercase fw-bold">Paket Aktif</div>
                </div>
            </div>
        </div>

        <div class="card stat-card p-4">
            <h5 class="fw-bold mb-4">Reservasi Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Pelanggan</th>
                            <th>Paket</th>
                            <th>Tanggal & Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentReservations as $res)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $res->name }}</div>
                                <div class="small text-muted">{{ $res->phone }}</div>
                            </td>
                            <td>{{ $res->servicePackage->name }}</td>
                            <td>{{ $res->reservation_date->format('d M Y') }} - {{ $res->reservation_time }}</td>
                            <td>
                                @if($res->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($res->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-secondary">{{ $res->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.reservations') }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
