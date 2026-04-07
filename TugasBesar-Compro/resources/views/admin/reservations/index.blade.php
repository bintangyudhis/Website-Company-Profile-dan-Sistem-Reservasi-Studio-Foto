@extends('admin.layouts.app')

@section('title', 'Daftar Reservasi - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold" style="color: #007A75;">Daftar Reservasi</h3>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th class="text-secondary">#ID</th>
                    <th class="text-secondary">Pelanggan</th>
                    <th class="text-secondary">Paket</th>
                    <th class="text-secondary">Jadwal</th>
                    <th class="text-secondary">Status</th>
                    <th class="text-secondary">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $res)
                <tr>
                    <td class="text-muted fw-bold">#{{ $res->id }}</td>
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
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($res->status == 'confirmed')
                            <span class="badge bg-success">Confirmed</span>
                        @elseif($res->status == 'completed')
                            <span class="badge bg-primary">Completed</span>
                        @elseif($res->status == 'cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.reservations.edit', $res->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="fas fa-edit me-1"></i>Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="fas fa-calendar-times fa-3x mb-3 opacity-25"></i>
                        <p class="mb-0">Belum ada data reservasi pelanggan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
