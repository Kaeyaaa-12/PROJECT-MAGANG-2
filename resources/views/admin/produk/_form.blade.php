@csrf
<div class="space-y-6">
    <div>
        <label for="nama_produk" class="block text-sm font-medium text-gray-300">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-accent-color focus:border-accent-color"
            value="{{ old('nama_produk', $produk->nama_produk ?? '') }}" required>
    </div>
    <div>
        <label for="kategori" class="block text-sm font-medium text-gray-300">Kategori</label>
        <input type="text" name="kategori" id="kategori"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-accent-color focus:border-accent-color"
            value="{{ old('kategori', $produk->kategori ?? '') }}" required>
    </div>

    {{-- Stok Varian --}}
    <div class="space-y-4">
        <label class="block text-sm font-medium text-gray-300">Stok Berdasarkan Varian</label>
        @foreach (['Pria', 'Wanita', 'Anak'] as $jenis)
            <div class="p-4 border border-gray-600 rounded-lg">
                <h4 class="font-semibold text-white">{{ $jenis }}</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                    @foreach (['S', 'M', 'L', 'XL'] as $ukuran)
                        <div>
                            <label for="stok_{{ strtolower($jenis) }}_{{ strtolower($ukuran) }}"
                                class="block text-xs font-medium text-gray-400">Ukuran {{ $ukuran }}</label>
                            <input type="number" name="stok[{{ strtolower($jenis) }}][{{ $ukuran }}]"
                                id="stok_{{ strtolower($jenis) }}_{{ strtolower($ukuran) }}"
                                class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm text-sm"
                                value="{{ old('stok.' . strtolower($jenis) . '.' . $ukuran, $produk->stok_varian[strtolower($jenis)][$ukuran] ?? '') }}"
                                placeholder="0">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Upload Gambar --}}
    <div class="space-y-4">
        <div>
            <label for="gambar_1" class="block text-sm font-medium text-gray-300">Gambar Utama</label>
            <input type="file" name="gambar_1" id="gambar_1"
                class="mt-1 block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500"
                {{ !isset($produk) ? 'required' : '' }}>
        </div>
        <div>
            <label for="gambar_2" class="block text-sm font-medium text-gray-300">Gambar 2</label>
            <input type="file" name="gambar_2" id="gambar_2"
                class="mt-1 block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500">
        </div>
        <div>
            <label for="gambar_3" class="block text-sm font-medium text-gray-300">Gambar 3</label>
            <input type="file" name="gambar_3" id="gambar_3"
                class="mt-1 block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500">
        </div>
    </div>
</div>

<div class="mt-8 flex justify-end space-x-4">
    <a href="{{ route('admin.produk.index') }}"
        class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">Batal</a>
    <button type="submit" class="px-4 py-2 text-white font-bold rounded-lg transition"
        style="background-color: var(--accent-color); color: var(--sidebar-bg);">{{ $tombol_text ?? 'Simpan' }}</button>
</div>
