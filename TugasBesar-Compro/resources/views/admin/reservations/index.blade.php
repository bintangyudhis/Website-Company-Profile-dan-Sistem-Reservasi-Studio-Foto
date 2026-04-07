<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #212529; color: white; padding: 20px; }
        .main-content { margin-left: 250px; padding: 30px; }
        .nav-link { color: #888; padding: 12px 15px; border-radius: 8px; margin-bottom: 5px; text-decoration: none; display: block; }
        .nav-link:hover, .nav-link.active { background: #343a40; color: white; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="fw-bold mb-4">SEJENAK <span class="text-primary">ADMIN</span></h4>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a class="nav-link active" href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-check me-2"></i> Reservasi</a>
            <a class="nav-link" href="{{ route('admin.packages') }}"><i class="fas fa-boxes me-2"></i> Paket Layanan</a>
            <a class="nav-link" href="{{ route('admin.galleries') }}"><i class="fas fa-images me-2"></i> Galeri Foto</a>
            <a class="nav-link" href="{{ route('admin.faqs') }}"><i class="fas fa-question-circle me-2"></i> FAQ & Bot</a>
        </nav>
    </div>

    <div class="main-content">
        <h3 class="fw-bold mb-4">Daftar Reservasi</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>Paket</th>
                            <th>Jadwal</th>
                            <th>Anggota</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $res)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $res->name }}</div>
                                <div class="text-primary small">{{ $res->phone }}</div>
                            </td>
                            <td>{{ $res->servicePackage->name }}</td>
                            <td>
                                <div>{{ $res->reservation_date->format('d M Y') }}</div>
                                <div class="small text-muted">{{ $res->reservation_time }} WIB</div>
                            </td>
                            <td>{{ $res->head_count }} orang</td>
                            <td>
                                <form action="{{ route('admin.reservations.status', $res->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $res->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light" title="Detail"><i class="fas fa-eye text-muted"></i></button>
                                <a href="https://wa.me/{{ $res->phone }}" target="_blank" class="btn btn-sm btn-light text-success" title="Hubungi WA"><i class="fab fa-whatsapp"></i></a>
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
