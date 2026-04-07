@extends('admin.layouts.app')

@section('title', 'Detail Reservasi - Sejenak Studio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold" style="color: #007A75;">Detail Reservasi #{{ $reservation->id }}</h3>
    <a href="{{ route('admin.reservations') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h5 class="fw-bold mb-3 border-bottom pb-2">Informasi Pelanggan</h5>
            <table class="table table-borderless">
                <tr>
                    <td width="30%" class="text-muted">Nama Lengkap</td>
                    <td class="fw-bold">{{ $reservation->name }}</td>
                </tr>
                <tr>
                    <td class="text-muted">No. WhatsApp</td>
                    <td class="fw-bold">
                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $reservation->phone) }}" target="_blank" class="text-success text-decoration-none">
                            <i class="fab fa-whatsapp me-1"></i> {{ $reservation->phone }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="text-muted">Tanggal Booking</td>
                    <td class="fw-bold">{{ $reservation->reservation_date->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Jam Booking</td>
                    <td class="fw-bold">{{ $reservation->reservation_time }} WIB</td>
                </tr>
            </table>

            <h5 class="fw-bold mb-3 mt-4 border-bottom pb-2">Detail Pilihan</h5>
            <table class="table table-borderless">
                <tr>
                    <td width="30%" class="text-muted">Paket Dipilih</td>
                    <td class="fw-bold text-primary">{{ $reservation->servicePackage->name }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Background</td>
                    <td class="fw-bold">{{ $reservation->background ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Jumlah Orang</td>
                    <td class="fw-bold">{{ $reservation->head_count }} Orang</td>
                </tr>
                <tr>
                    <td class="text-muted">Catatan Khusus</td>
                    <td class="fw-bold">{{ $reservation->notes ?: '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background-color: #E0F7F5;">
            <h5 class="fw-bold mb-3" style="color: #007A75;">Pengaturan Status</h5>
            
            <form action="{{ route('admin.reservations.status', $reservation->id) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Ubah Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $reservation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <button type="submit" class="btn w-100 fw-bold text-white" style="background:#00A99D;">Simpan Status</button>
            </form>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 border border-danger">
            <h5 class="fw-bold mb-3 text-danger">Hapus Reservasi</h5>
            <p class="small text-muted">Tindakan ini akan menghapus data reservasi secara permanen.</p>
            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data reservasi ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 fw-bold"><i class="fas fa-trash-alt me-2"></i>Hapus Permanen</button>
            </form>
        </div>
    </div>
</div>
@endsection
