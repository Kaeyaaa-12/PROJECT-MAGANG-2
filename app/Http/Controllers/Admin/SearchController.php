<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Accessory;
use App\Models\Rental;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        if (empty($query)) {
            // Jika pencarian kosong, kembalikan ke halaman sebelumnya
            return back();
        }

        // Cari di Koleksi
        $koleksis = Collection::where('nama_koleksi', 'LIKE', "%{$query}%")
            ->orWhere('kategori', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate(10, ['*'], 'koleksi_page');

        // Cari di Aksesoris
        $aksesoris = Accessory::where('nama_aksesoris', 'LIKE', "%{$query}%")
            ->orWhere('kategori', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate(10, ['*'], 'aksesoris_page');

        // Cari di Data Sewa (berdasarkan nama penyewa)
        $rentals = Rental::with('items.rentable')
            ->where('nama_penyewa', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate(10, ['*'], 'rentals_page');

        return view('admin.search_results', compact('koleksis', 'aksesoris', 'rentals', 'query'));
    }
}