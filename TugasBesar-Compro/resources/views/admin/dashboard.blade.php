@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold" style="color: #007A75;">Dashboard Overview</h3>
    <span class="text-muted fw-bold">Halo, {{ auth()->user()->name }}!</span>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card stat-card p-3 text-center border-0 border-start border-4 border-primary">
            <div class="text-primary h2 mb-1 fw-bold">{{ $stats['total_reservations'] }}</div>
            <div class="small text-muted text-uppercase fw-bold">Total Booking</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3 text-center border-0 border-start border-4 border-warning">
            <div class="text-warning h2 mb-1 fw-bold">{{ $stats['pending_reservations'] }}</div>
            <div class="small text-muted text-uppercase fw-bold">Pending</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3 text-center border-0 border-start border-4 border-success">
            <div class="text-success h2 mb-1 fw-bold">{{ $stats['confirmed_reservations'] }}</div>
            <div class="small text-muted text-uppercase fw-bold">Dikonfirmasi</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3 text-center border-0 border-start border-4" style="border-color: #00A99D !important;">
            <div class="h2 mb-1 fw-bold" style="color: #00A99D;">{{ $stats['total_packages'] }}</div>
            <div class="small text-muted text-uppercase fw-bold">Paket Aktif</div>
        </div>
    </div>
</div>

<div class="card stat-card p-4 border-0">
    <h5 class="fw-bold mb-4" style="color: #00A99D;"><i class="fas fa-list-alt me-2"></i>Reservasi Terbaru</h5>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th class="text-secondary">Pelanggan</th>
                    <th class="text-secondary">Paket</th>
                    <th class="text-secondary">Tanggal & Jam</th>
                    <th class="text-secondary">Status</th>
                    <th class="text-secondary">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentReservations as $res)
                <tr>
                    <td>
                        <div class="fw-bold text-dark">{{ $res->name }}</div>
                        <div class="small text-muted"><i class="fab fa-whatsapp text-success me-1"></i>{{ $res->phone }}</div>
                    </td>
                    <td><span class="badge" style="background:#00A99D;">{{ $res->servicePackage->name }}</span></td>
                    <td>
                        <i class="far fa-calendar-alt text-muted me-1"></i>{{ $res->reservation_date->format('d M Y') }}<br>
                        <i class="far fa-clock text-muted me-1"></i>{{ $res->reservation_time }} WIB
                    </td>
                    <td>
                        @if($res->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half me-1"></i>Pending</span>
                        @elseif($res->status == 'confirmed')
                            <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Confirmed</span>
                        @elseif($res->status == 'completed')
                            <span class="badge bg-primary"><i class="fas fa-flag-checkered me-1"></i>Completed</span>
                        @elseif($res->status == 'cancelled')
                            <span class="badge bg-danger"><i class="fas fa-times me-1"></i>Cancelled</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.reservations.edit', $res->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="fas fa-search me-1"></i>Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada reservasi terbaru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="text-end mt-3">
        <a href="{{ route('admin.reservations') }}" class="btn btn-sm" style="background: #FFD000; color: #1A1A2E; font-weight:bold;">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
    </div>
</div>
@endsection
