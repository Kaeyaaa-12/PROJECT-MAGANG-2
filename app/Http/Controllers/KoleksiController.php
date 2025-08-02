<?php

namespace App\Http\Controllers; // [PERBAIKAN] Namespace yang benar

use App\Models\Collection; // [PERBAIKAN] Import model
use Illuminate\Http\Request; // [PERBAIKAN] Import Request
use Illuminate\Support\Carbon; // [PERBAIKAN] Import Carbon untuk tanggal

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = Collection::latest()->paginate(12);
        return view('koleksi', ['koleksis' => $koleksis]);
    }

    public function show($id)
    {
        $koleksi = Collection::findOrFail($id);
        return view('detailkoleksi', compact('koleksi'));
    }

    /**
     * [PERBAIKAN UTAMA] Mengambil tanggal yang sudah disewa dengan logika baru.
     */
    public function getBookedDates($id)
    {
        $koleksi = Collection::findOrFail($id);

        // 1. Ambil semua item sewa yang berhubungan dengan koleksi ini
        // 2. Sertakan data transaksi rental induknya dengan 'with('rental')'
        $rentalItems = $koleksi->rentalItems()->with('rental')->get();

        $bookedDates = [];
        // Loop melalui setiap item sewa
        foreach ($rentalItems as $item) {
            // Pastikan transaksi induknya ada
            if ($item->rental) {
                // Ambil tanggal dari transaksi induk
                $bookedDates[] = [
                    'from' => Carbon::parse($item->rental->tanggal_mulai)->format('Y-m-d'),
                    'to'   => Carbon::parse($item->rental->tanggal_selesai)->format('Y-m-d'),
                ];
            }
        }

        // Menghapus duplikasi rentang tanggal jika ada
        $uniqueBookedDates = array_values(array_unique($bookedDates, SORT_REGULAR));

        return response()->json($uniqueBookedDates);
    }
}