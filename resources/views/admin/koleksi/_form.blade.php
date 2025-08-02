<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="p-6 rounded-lg shadow-lg space-y-6" style="background-color: var(--bg-dark-secondary);">
        {{-- Nama Koleksi & Kategori (Tidak berubah) --}}
        <div>
            <label for="nama_koleksi" class="block text-sm font-medium" style="color: var(--text-light);">Nama
                Koleksi</label>
            <input type="text" name="nama_koleksi" id="nama_koleksi"
                class="mt-1 block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500"
                style="background-color: #2d2d2d; border-color: var(--border-dark);"
                value="{{ old('nama_koleksi', $koleksi->nama_koleksi ?? '') }}" required>
            @error('nama_koleksi')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium" style="color: var(--text-light);">Kategori</label>
            <input type="text" name="kategori" id="kategori"
                class="mt-1 block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500"
                style="background-color: #2d2d2d; border-color: var(--border-dark);"
                value="{{ old('kategori', $koleksi->kategori ?? '') }}" required>
            @error('kategori')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Stok Varian (Tidak berubah) --}}
        <div>
            <label class="block text-sm font-medium" style="color: var(--text-light);">Stok Varian</label>
            <div id="stok-container" class="space-y-4 mt-2">
                {{-- JavaScript akan mengisi bagian ini --}}
            </div>
            <button type="button" id="tambah-jenis" class="mt-2 px-3 py-1 text-xs font-bold text-black rounded"
                style="background-color: var(--text-gold);">+ Tambah Jenis</button>
        </div>

        {{-- === AWAL PERUBAHAN GAMBAR === --}}
        <div class="space-y-4">
            <label class="block text-sm font-medium" style="color: var(--text-light);">Gambar Koleksi</label>

            {{-- Input Gambar 1 --}}
            <div>
                <label for="gambar_1" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar 1
                    (Utama)</label>
                <input type="file" name="gambar_1" id="gambar_1"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
                @error('gambar_1')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Gambar 2 --}}
            <div>
                <label for="gambar_2" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar
                    2</label>
                <input type="file" name="gambar_2" id="gambar_2"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
                @error('gambar_2')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Gambar 3 --}}
            <div>
                <label for="gambar_3" class="block text-xs font-medium" style="color: var(--text-muted);">Gambar
                    3</label>
                <input type="file" name="gambar_3" id="gambar_3"
                    class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                    style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);">
                @error('gambar_3')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            @if ($method === 'PUT')
                <p class="text-xs mt-1" style="color: var(--text-muted);">Unggah gambar baru untuk mengganti atau
                    menambahkan gambar.</p>
            @endif
        </div>
        {{-- === AKHIR PERUBAHAN GAMBAR === --}}
    </div>

    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ route('admin.koleksi.index') }}"
            class="px-4 py-2 text-sm font-bold text-white rounded-lg hover:opacity-80"
            style="background-color: #444;">Batal</a>
        <button type="submit" class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
            style="background-color: var(--text-gold);">{{ $submitText }}</button>
    </div>
</form>

{{-- SCRIPT JAVASCRIPT UNTUK STOK (TIDAK BERUBAH) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('stok-container');
        const tambahJenisBtn = document.getElementById('tambah-jenis');
        let jenisIndex = 0;

        const existingStok = @json($koleksi->stok_varian ?? []);

        const createJenisInput = (jenisKey = '', ukuranData = {}) => {
            jenisIndex++;
            const jenisDiv = document.createElement('div');
            jenisDiv.className = 'p-4 border rounded-md space-y-3';
            jenisDiv.style.borderColor = 'var(--border-dark)';

            jenisDiv.innerHTML = `
            <div class="flex items-center justify-between">
                <input type="text" name="stok[${jenisIndex}][jenis]" placeholder="Nama Jenis (cth: Pria Dewasa)" class="block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500" style="background-color: #3a3a3a; border-color: #444;" value="${jenisKey}" required>
                <button type="button" class="remove-jenis ml-4 text-red-400 hover:text-red-300">&times;</button>
            </div>
            <div class="ukuran-container space-y-2"></div>
            <button type="button" class="tambah-ukuran px-2 py-1 text-xs font-bold text-black rounded" style="background-color: var(--text-gold);">+ Tambah Ukuran</button>
        `;

            container.appendChild(jenisDiv);

            const ukuranContainer = jenisDiv.querySelector('.ukuran-container');
            if (Object.keys(ukuranData).length > 0) {
                Object.entries(ukuranData).forEach(([ukuran, stok]) => {
                    createUkuranInput(ukuranContainer, jenisIndex, ukuran, stok);
                });
            }

            jenisDiv.querySelector('.remove-jenis').addEventListener('click', () => jenisDiv.remove());
            jenisDiv.querySelector('.tambah-ukuran').addEventListener('click', () => createUkuranInput(
                ukuranContainer, jenisIndex));
        };

        const createUkuranInput = (parent, jIndex, ukuranKey = '', stokVal = '') => {
            const ukuranDiv = document.createElement('div');
            ukuranDiv.className = 'flex items-center gap-x-2';
            ukuranDiv.innerHTML = `
            <input type="text" name="stok[${jIndex}][ukuran][]" placeholder="Ukuran (cth: L)" class="block w-1/2 rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500" style="background-color: #2d2d2d; border-color: #444;" value="${ukuranKey}" required>
            <input type="number" name="stok[${jIndex}][stok][]" placeholder="Jumlah Stok" class="block w-1/2 rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500" style="background-color: #2d2d2d; border-color: #444;" value="${stokVal}" required>
            <button type="button" class="remove-ukuran text-red-400 hover:text-red-300">&times;</button>
        `;
            parent.appendChild(ukuranDiv);
            ukuranDiv.querySelector('.remove-ukuran').addEventListener('click', () => ukuranDiv.remove());
        };

        tambahJenisBtn.addEventListener('click', () => createJenisInput());

        if (Object.keys(existingStok).length > 0) {
            Object.entries(existingStok).forEach(([jenis, ukuran]) => {
                createJenisInput(jenis, ukuran);
            });
        } else {
            createJenisInput();
        }
    });
</script>
