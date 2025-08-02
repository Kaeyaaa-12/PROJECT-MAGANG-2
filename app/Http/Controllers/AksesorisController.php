<?php

namespace App\Http\Controllers; // [PERBAIKAN] Namespace yang benar

use App\Models\Accessory; // [PERBAIKAN] Import model
use Illuminate\Http\Request; // [PERBAIKAN] Import Request
use Illuminate\Support\Carbon; // [PERBAIKAN] Import Carbon untuk tanggal

class AksesorisController extends Controller
{
    public function index()
    {
        $aksesoris = Accessory::latest()->paginate(12);
        return view('aksesoris', ['aksesoris' => $aksesoris]);
    }

    public function show($id)
    {
        $aksesori = Accessory::findOrFail($id);
        return view('detailaksesoris', ['aksesoris' => $aksesori]);
    }

    /**
     * [PERBAIKAN UTAMA] Mengambil tanggal yang sudah disewa dengan logika baru.
     */
    public function getBookedDates($id)
    {
        $aksesori = Accessory::findOrFail($id);

        // 1. Ambil semua item sewa yang berhubungan dengan aksesoris ini
        // 2. Sertakan data transaksi rental induknya dengan 'with('rental')'
        $rentalItems = $aksesori->rentalItems()->with('rental')->get();

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