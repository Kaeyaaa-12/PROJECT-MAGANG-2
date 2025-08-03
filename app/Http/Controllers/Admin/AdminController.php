<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Collection;
use App\Models\Accessory;
use App\Models\Rental; // Pastikan Model Rental di-import
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        // --- AWAL PERUBAHAN ---

        // Menghitung statistik
        $totalKoleksi = Collection::count();
        $totalAksesoris = Accessory::count();
        $sedangDisewa = Rental::where('tanggal_selesai', '>=', now())->count();

        $stokKoleksi = Collection::all()->sum(function ($item) {
            $total = 0;
            if (is_array($item->stok_varian)) {
                foreach ($item->stok_varian as $jenis) {
                    if (is_array($jenis)) {
                        $total += array_sum($jenis);
                    }
                }
            }
            return $total;
        });

        $stokAksesoris = Accessory::all()->sum(function ($item) {
            $total = 0;
            if (is_array($item->stok_varian)) {
                $total = array_sum($item->stok_varian);
            }
            return $total;
        });

        $totalStok = $stokKoleksi + $stokAksesoris;

        // Mengambil data sewa terbaru untuk tabel (misal, 5 data terakhir)
        $dataSewaTerbaru = Rental::with('items.rentable')
                                ->latest() // Mengurutkan dari yang paling baru
                                ->take(5)    // Mengambil 5 data teratas
                                ->get();

        return view('admin.dashboard', compact(
            'totalKoleksi',
            'totalAksesoris',
            'sedangDisewa',
            'totalStok',
            'dataSewaTerbaru' // Mengirim data sewa ke view
        ));
        // --- AKHIR PERUBAHAN ---
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
