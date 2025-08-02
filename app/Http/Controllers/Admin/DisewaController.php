<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Collection;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DisewaController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('items.rentable')->latest()->paginate(10);
        return view('admin.disewa.index', compact('rentals'));
    }

    public function create()
    {
        $collections = Collection::orderBy('nama_koleksi')->get();
        $accessories = Accessory::orderBy('nama_aksesoris')->get();
        $sewa = new Rental();

        // === PERSIAPAN DATA UNTUK JAVASCRIPT ===
        $itemsForJs = old('items', []);

        return view('admin.disewa.create', compact('collections', 'accessories', 'sewa', 'itemsForJs'));
    }

    public function edit(Rental $disewa)
    {
        $collections = Collection::orderBy('nama_koleksi')->get();
        $accessories = Accessory::orderBy('nama_aksesoris')->get();
        $sewa = $disewa->load('items.rentable');

        // === PERSIAPAN DATA UNTUK JAVASCRIPT ===
        $existingItems = $sewa->items->map(function ($item) {
            if (!$item->rentable) return null;
            return [
                'item_type' => $item->rentable_type == \App\Models\Collection::class ? 'collection' : 'accessory',
                'item_id' => $item->rentable_id,
                'varian' => $item->varian,
                'jumlah' => $item->jumlah,
            ];
        })->filter()->values()->toArray();

        $itemsForJs = old('items', $existingItems);

        return view('admin.disewa.edit', compact('sewa', 'collections', 'accessories', 'itemsForJs'));
    }

    // ... (Method store, destroy, dan helper lainnya tetap sama persis seperti jawaban sebelumnya) ...

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'nomor_whatsapp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'items' => 'required|array|min:1',
            'items.*.item_type' => 'required|in:collection,accessory',
            'items.*.item_id' => 'required|integer',
            'items.*.varian' => 'required|string',
            'items.*.jumlah' => 'required|integer|min:1',
        ], [
            'items.required' => 'Minimal harus ada satu item yang disewa.',
            'items.*.item_id.required' => 'Setiap baris harus memilih item.',
            'items.*.varian.required' => 'Setiap baris harus memilih varian.',
        ]);

        DB::beginTransaction();
        try {
            $rental = Rental::create([
                'nama_penyewa' => $validated['nama_penyewa'],
                'nomor_whatsapp' => $validated['nomor_whatsapp'],
                'alamat' => $validated['alamat'],
                'tanggal_mulai' => $validated['tanggal_mulai'],
                'tanggal_selesai' => $validated['tanggal_selesai'],
            ]);

            foreach ($validated['items'] as $itemData) {
                $item = $this->findRentableItem($itemData['item_type'], $itemData['item_id']);
                $this->updateStock($item, $itemData['varian'], -$itemData['jumlah']);
                $rental->items()->create([
                    'rentable_id' => $item->id,
                    'rentable_type' => get_class($item),
                    'varian' => $itemData['varian'],
                    'jumlah' => $itemData['jumlah'],
                ]);
            }
            DB::commit();
            return redirect()->route('admin.disewa.index')->with('success', 'Data sewa berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e instanceof ValidationException) throw $e;
            return back()->withInput()->withErrors(['db_error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy(Rental $disewa)
    {
        DB::beginTransaction();
        try {
            foreach ($disewa->items as $rentalItem) {
                if ($rentalItem->rentable) {
                    $this->updateStock($rentalItem->rentable, $rentalItem->varian, $rentalItem->jumlah);
                }
            }
            $disewa->delete();
            DB::commit();
            return redirect()->route('admin.disewa.index')->with('success', 'Data sewa berhasil dihapus dan stok telah dikembalikan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['db_error' => 'Gagal menghapus data: ' . $e->getMessage()]);
        }
    }

    public function getItemDetails($type, $id)
    {
        $item = $this->findRentableItem($type, $id);
        return response()->json($item->stok_varian ?? []);
    }

    private function findRentableItem($type, $id)
    {
        return $type === 'collection' ? Collection::findOrFail($id) : Accessory::findOrFail($id);
    }

    private function updateStock($item, $varian, $quantityChange)
    {
        $stokVarian = $item->stok_varian ?? [];
        if ($item instanceof Collection) {
            $varianParts = explode('_', $varian, 2);
            if (count($varianParts) < 2 || !isset($stokVarian[$varianParts[0]][$varianParts[1]])) throw ValidationException::withMessages(['stok' => "Varian {$varian} tidak valid."]);
            $stokVarian[$varianParts[0]][$varianParts[1]] += $quantityChange;
        } elseif ($item instanceof Accessory) {
            if (!isset($stokVarian[$varian])) throw ValidationException::withMessages(['stok' => "Varian {$varian} tidak valid."]);
            $stokVarian[$varian] += $quantityChange;
        }

        if ($this->hasNegativeStock($stokVarian)) throw ValidationException::withMessages(['jumlah' => "Stok untuk varian {$varian} tidak mencukupi."]);

        $item->stok_varian = $stokVarian;
        $item->save();
    }

    private function hasNegativeStock(array $stokVarian): bool
    {
        foreach ($stokVarian as $value) {
            if (is_array($value) ? $this->hasNegativeStock($value) : $value < 0) return true;
        }
        return false;
    }
}
