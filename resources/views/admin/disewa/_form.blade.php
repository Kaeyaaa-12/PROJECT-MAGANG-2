{{-- resources/views/admin/disewa/_form.blade.php --}}
<form action="{{ $action }}" method="POST" x-data="sewaForm()">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    {{-- ... (semua elemen form dari Nama Penyewa sampai <hr> tetap sama persis) ... --}}

    <div class="p-6 rounded-lg shadow-lg space-y-6" style="background-color: var(--bg-dark-secondary);">
        {{-- Data Penyewa --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama_penyewa" class="block text-sm font-medium" style="color: var(--text-light);">Nama
                    Penyewa</label>
                <input type="text" name="nama_penyewa" id="nama_penyewa"
                    value="{{ old('nama_penyewa', $sewa->nama_penyewa) }}" required
                    class="mt-1 block w-full input-field">
            </div>
            <div>
                <label for="nomor_whatsapp" class="block text-sm font-medium" style="color: var(--text-light);">Nomor
                    WhatsApp</label>
                <input type="text" name="nomor_whatsapp" id="nomor_whatsapp"
                    value="{{ old('nomor_whatsapp', $sewa->nomor_whatsapp) }}" required
                    class="mt-1 block w-full input-field">
            </div>
        </div>
        <div>
            <label for="alamat" class="block text-sm font-medium" style="color: var(--text-light);">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" required class="mt-1 block w-full input-field">{{ old('alamat', $sewa->alamat) }}</textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_mulai" class="block text-sm font-medium" style="color: var(--text-light);">Disewa
                    Tanggal</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                    value="{{ old('tanggal_mulai', $sewa->tanggal_mulai ? \Carbon\Carbon::parse($sewa->tanggal_mulai)->format('Y-m-d') : '') }}"
                    required class="mt-1 block w-full input-field">
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-sm font-medium" style="color: var(--text-light);">Sampai
                    Tanggal</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                    value="{{ old('tanggal_selesai', $sewa->tanggal_selesai ? \Carbon\Carbon::parse($sewa->tanggal_selesai)->format('Y-m-d') : '') }}"
                    required class="mt-1 block w-full input-field">
            </div>
        </div>
        <hr style="border-color: var(--border-dark);">

        {{-- Repeater untuk Item yang Disewa --}}
        <h3 class="text-lg font-semibold text-white">Item Disewa</h3>
        <div id="item-repeater" class="space-y-4">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 border rounded-md" style="border-color: var(--border-dark);">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium" style="color: var(--text-light);">Tipe</label>
                            <select :name="`items[${index}][item_type]`" x-model="item.item_type"
                                @change="fetchItems(index)" class="mt-1 block w-full input-field text-xs">
                                <option value="">-- Pilih --</option>
                                <option value="collection">Koleksi</option>
                                <option value="accessory">Aksesoris</option>
                            </select>
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-xs font-medium" style="color: var(--text-light);">Pilih
                                Item</label>
                            <select :name="`items[${index}][item_id]`" x-model="item.item_id"
                                @change="fetchVarians(index)" class="mt-1 block w-full input-field text-xs">
                                <option value="">-- Memuat --</option>
                                <template x-for="option in item.item_options">
                                    <option :value="option.id" x-text="option.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-xs font-medium"
                                style="color: var(--text-light);">Varian/Ukuran</label>
                            <select :name="`items[${index}][varian]`" x-model="item.varian"
                                class="mt-1 block w-full input-field text-xs">
                                <option value="">-- Memuat --</option>
                                <template x-for="variant in item.varian_options">
                                    <option :value="variant.value" x-text="variant.text" :disabled="variant.stock <= 0">
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium" style="color: var(--text-light);">Jumlah</label>
                            <input type="number" :name="`items[${index}][jumlah]`" x-model.number="item.jumlah"
                                min="1" class="mt-1 block w-full input-field text-xs">
                        </div>
                        <div class="md:col-span-2 flex items-end">
                            <button type="button" @click="removeItem(index)"
                                class="px-3 py-2 text-xs text-red-400 hover:text-red-300">Hapus</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <button type="button" @click="addItem()"
            class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
            style="background-color: var(--text-gold);">+ Tambah Item</button>

        @if ($errors->any())
            <div class="p-3 mt-4 text-sm text-red-300 bg-red-800 bg-opacity-30 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ route('admin.disewa.index') }}"
            class="px-4 py-2 text-sm font-bold text-white rounded-lg hover:opacity-80"
            style="background-color: #444;">Batal</a>
        <button type="submit" class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
            style="background-color: var(--text-gold);">{{ $submitText }}</button>
    </div>
</form>

<style>
    .input-field {
        background-color: #2d2d2d;
        border-color: var(--border-dark);
        color: var(--text-light);
        border-radius: 0.375rem;
    }

    .input-field:focus {
        --tw-ring-color: var(--text-gold);
        border-color: var(--text-gold);
    }
</style>

<script>
    function sewaForm() {
        return {
            collections: @json($collections),
            accessories: @json($accessories),
            // === PERBAIKAN UTAMA: SINTAKS SANGAT SEDERHANA ===
            items: @json($itemsForJs),

            init() {
                // ... (seluruh isi method init() dan lainnya tetap sama seperti jawaban sebelumnya) ...
                if (this.items.length > 0) {
                    this.items.forEach((item, index) => {
                        this.fetchItems(index, true).then(() => {
                            this.fetchVarians(index, true);
                        });
                    });
                } else {
                    this.addItem();
                }
            },
            addItem() {
                this.items.push({
                    item_type: '',
                    item_id: '',
                    varian: '',
                    jumlah: 1,
                    item_options: [],
                    varian_options: []
                });
            },
            removeItem(index) {
                this.items.splice(index, 1);
            },
            async fetchItems(index, isInitialLoad = false) {
                const type = this.items[index].item_type;
                this.items[index].item_options = [];
                if (!isInitialLoad) {
                    this.items[index].item_id = '';
                }
                if (type === 'collection') {
                    this.items[index].item_options = this.collections.map(c => ({
                        id: c.id,
                        name: c.nama_koleksi
                    }));
                } else if (type === 'accessory') {
                    this.items[index].item_options = this.accessories.map(a => ({
                        id: a.id,
                        name: a.nama_aksesoris
                    }));
                }
            },
            async fetchVarians(index, isInitialLoad = false) {
                const type = this.items[index].item_type;
                const id = this.items[index].item_id;
                const currentVarian = this.items[index].varian;
                this.items[index].varian_options = [];
                if (!isInitialLoad) {
                    this.items[index].varian = '';
                }
                if (!type || !id) return;
                try {
                    const response = await fetch(`/admin/get-item-details/${type}/${id}`);
                    const data = await response.json();
                    let variants = [];
                    if (type === 'collection') {
                        for (const jenis in data) {
                            for (const ukuran in data[jenis]) {
                                variants.push({
                                    value: `${jenis}_${ukuran}`,
                                    text: `${jenis} - ${ukuran} (Stok: ${data[jenis][ukuran]})`,
                                    stock: data[jenis][ukuran]
                                });
                            }
                        }
                    } else {
                        for (const ukuran in data) {
                            variants.push({
                                value: ukuran,
                                text: `${ukuran} (Stok: ${data[ukuran]})`,
                                stock: data[ukuran]
                            });
                        }
                    }
                    this.items[index].varian_options = variants;
                    if (isInitialLoad) {
                        this.items[index].varian = currentVarian;
                    }
                } catch (error) {
                    console.error('Error fetching variants:', error);
                }
            }
        }
    }
</script>
