<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Menampilkan form reservasi.
     */
    public function index()
    {
        $packages = ServicePackage::all();
        return view('reservasi.index', compact('packages'));
    }

    /**
     * Menyimpan data reservasi baru.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service_package_id' => 'required|exists:service_packages,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'head_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // 2. Cek bentrok jadwal (Tanggal + Jam sama)
        $isConflict = Reservation::where('reservation_date', $request->reservation_date)
            ->where('reservation_time', $request->reservation_time)
            ->whereIn('status', ['pending', 'confirmed']) // Hanya cek yang belum batal/selesai
            ->exists();

        if ($isConflict) {
            return back()->withErrors(['reservation_time' => 'Maaf, jadwal pada tanggal dan jam tersebut sudah terisi. Silakan pilih waktu lain.'])->withInput();
        }

        // 3. Cek kapasitas orang (Opsional, tapi bagus untuk validasi)
        $package = ServicePackage::find($request->service_package_id);
        if ($request->head_count > $package->max_people) {
            return back()->withErrors(['head_count' => "Jumlah orang melebihi kapasitas paket ({$package->max_people} orang)."]) ->withInput();
        }

        // 4. Simpan ke database (Default status = pending)
        Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'service_package_id' => $request->service_package_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'head_count' => $request->head_count,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('reservasi.success')->with('success', 'Reservasi berhasil dikirim! Silakan tunggu konfirmasi dari admin melalui WhatsApp.');
    }

    public function success()
    {
        return view('reservasi.success');
    }
}
