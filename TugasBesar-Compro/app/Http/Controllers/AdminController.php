<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ServicePackage;
use App\Models\Gallery;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard statistik sederhana.
     */
    public function index()
    {
        $stats = [
            'total_reservations' => Reservation::count(),
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'confirmed_reservations' => Reservation::where('status', 'confirmed')->count(),
            'total_packages' => ServicePackage::count(),
        ];

        $recentReservations = Reservation::with('servicePackage')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentReservations'));
    }

    // --- RESERVATION MANAGEMENT ---
    public function reservations()
    {
        $reservations = Reservation::with('servicePackage')->latest()->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateReservationStatus(Request $request, Reservation $reservation)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,completed,cancelled']);
        $reservation->update(['status' => $request->status]);

        return back()->with('success', 'Status reservasi berhasil diperbarui.');
    }

    // --- PACKAGE MANAGEMENT ---
    public function packages()
    {
        $packages = ServicePackage::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function createPackage()
    {
        return view('admin.packages.create');
    }

    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'max_people' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/packages'), $imageName);
            $data['image'] = $imageName;
        }

        ServicePackage::create($data);
        return redirect()->route('admin.packages')->with('success', 'Paket berhasil ditambahkan.');
    }

    // --- FAQ & GALLERY (Stub for brevity, same logic CRUD) ---
    // --- AUTHENTICATION ---
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
