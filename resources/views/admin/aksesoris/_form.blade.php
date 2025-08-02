<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="p-6 rounded-lg shadow-lg space-y-6" style="background-color: var(--bg-dark-secondary);">
        {{-- Nama Aksesoris & Kategori --}}
        <div>
            <label for="nama_aksesoris" class="block text-sm font-medium" style="color: var(--text-light);">Nama
                Aksesoris</label>
            <input type="text" name="nama_aksesoris" id="nama_aksesoris"
                class="mt-1 block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500"
                style="background-color: #2d2d2d; border-color: var(--border-dark);"
                value="{{ old('nama_aksesoris', $aksesori->nama_aksesoris ?? '') }}" required>
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium" style="color: var(--text-light);">Kategori</label>
            <input type="text" name="kategori" id="kategori"
                class="mt-1 block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500"
                style="background-color: #2d2d2d; border-color: var(--border-dark);"
                value="{{ old('kategori', $aksesori->kategori ?? '') }}" required>
        </div>

        {{-- Input Stok Varian --}}
        <div>
            <label class="block text-sm font-medium" style="color: var(--text-light);">Ukuran & Stok</label>
            <div id="stok-container" class="space-y-3 mt-2">
                {{-- Konten dinamis dari JavaScript --}}
            </div>
            <button type="button" id="tambah-ukuran" class="mt-2 px-3 py-1 text-xs font-bold text-black rounded"
                style="background-color: var(--text-gold);">+ Tambah Ukuran</button>
        </div>


        {{-- Input Gambar --}}
        <div class="space-y-4">
            <label class="block text-sm font-medium" style="color: var(--text-light);">Gambar</label>
            <div>
                <label for="gambar_1" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar
                    1</label>
                <input type="file" name="gambar_1" id="gambar_1"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
            </div>
            <div>
                <label for="gambar_2" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar
                    2</label>
                <input type="file" name="gambar_2" id="gambar_2"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
            </div>
            <div>
                <label for="gambar_3" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar
                    3</label>
                <input type="file" name="gambar_3" id="gambar_3"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ route('admin.aksesoris.index') }}"
            class="px-4 py-2 text-sm font-bold text-white rounded-lg hover:opacity-80"
            style="background-color: #444;">Batal</a>
        <button type="submit" class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
            style="background-color: var(--text-gold);">{{ $submitText }}</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('stok-container');
        const tambahBtn = document.getElementById('tambah-ukuran');

        const existingStok = @json($aksesori->stok_varian ?? []);

        const createUkuranInput = (ukuran = '', jumlah = '') => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-x-2';
            div.innerHTML = `
                <input type="text" name="stok[ukuran][]" placeholder="Ukuran (cth: L)" class="block w-1/2 rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500" style="background-color: #2d2d2d; border-color: #444;" value="${ukuran}" required>
                <input type="number" name="stok[jumlah][]" placeholder="Jumlah Stok" class="block w-1/2 rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500" style="background-color: #2d2d2d; border-color: #444;" value="${jumlah}" required>
                <button type="button" class="remove-ukuran text-red-400 hover:text-red-300">&times;</button>
            `;
            container.appendChild(div);
            div.querySelector('.remove-ukuran').addEventListener('click', () => div.remove());
        };

        tambahBtn.addEventListener('click', () => createUkuranInput());

        if (Object.keys(existingStok).length > 0) {
            Object.entries(existingStok).forEach(([ukuran, jumlah]) => {
                createUkuranInput(ukuran, jumlah);
            });
        } else {
            createUkuranInput(); // Tambah satu input default jika belum ada data
        }
    });
</script>
