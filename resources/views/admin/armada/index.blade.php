@extends('layouts.admin')

@section('content')
    <div class="p-margin-desktop max-w-[1280px] mx-auto">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-stack-lg gap-4">
            <div>
                <h2 class="font-headline-lg text-headline-lg font-bold text-on-background">Armada Management</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage your vehicle fleet, track status, and update details.</p>
            </div>
            <button class="border border-secondary-container text-secondary-container px-6 py-3 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-secondary-container/10 transition-all hover:-translate-y-1">
                <span class="material-symbols-outlined">visibility</span>
                Lihat Semua
            </button>
            <button class="bg-secondary-container text-white px-6 py-3 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-[#E66A17] transition-all hover:-translate-y-1 shadow-md hover:shadow-lg" onclick="document.getElementById('add-vehicle-slideover').classList.remove('hidden')">
                <span class="material-symbols-outlined">add</span>
                Tambah Kendaraan Baru
            </button>
        </div>
        
        <!-- Filters & Tabs -->
        <div class="bg-surface rounded-xl border border-slate-200 p-4 mb-stack-lg flex flex-wrap gap-4 items-center justify-between shadow-sm">
            <div class="flex gap-2">
                <a href="{{ route('admin.armada.index', ['status' => request('status')]) }}" class="px-4 py-2 rounded-lg {{ !request('tipe') ? 'bg-primary-container text-white' : 'bg-slate-100 text-on-surface-variant hover:bg-slate-200' }} font-label-md text-label-md transition-colors">Semua</a>
                <a href="{{ route('admin.armada.index', ['tipe' => 'Mobil', 'status' => request('status')]) }}" class="px-4 py-2 rounded-lg {{ request('tipe') == 'Mobil' ? 'bg-primary-container text-white' : 'bg-slate-100 text-on-surface-variant hover:bg-slate-200' }} font-label-md text-label-md transition-colors">Mobil</a>
                <a href="{{ route('admin.armada.index', ['tipe' => 'Motor', 'status' => request('status')]) }}" class="px-4 py-2 rounded-lg {{ request('tipe') == 'Motor' ? 'bg-primary-container text-white' : 'bg-slate-100 text-on-surface-variant hover:bg-slate-200' }} font-label-md text-label-md transition-colors">Motor</a>
            </div>
            <div class="flex gap-4">
                <form action="{{ route('admin.armada.index') }}" method="GET" id="filterForm">
                    @if(request('tipe'))
                        <input type="hidden" name="tipe" value="{{ request('tipe') }}">
                    @endif
                    <select name="status" onchange="document.getElementById('filterForm').submit()" class="border border-slate-200 rounded-lg px-4 py-2 text-body-sm font-body-sm bg-slate-50 outline-none focus:border-primary-container">
                        <option value="" {{ !request('status') ? 'selected' : '' }}>Status: Semua</option>
                        <option value="Tersedia" {{ request('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Kosong" {{ request('status') == 'Kosong' ? 'selected' : '' }}>Kosong</option>
                    </select>
                </form>
            </div>
        </div>
        
        <!-- Vehicle Grid (Bento/Card Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
            @forelse($kendaraans as $kendaraan)
            <!-- Card: {{ $kendaraan->nama_kendaraan }} -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative {{ $kendaraan->stok <= 0 ? 'opacity-75' : '' }}">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="{{ $kendaraan->stok > 0 ? 'bg-success/10 text-success border-success/20' : 'bg-secondary-container/10 text-secondary-container border-secondary-container/20' }} px-3 py-1 rounded-full font-label-sm text-label-sm border">{{ $kendaraan->stok > 0 ? 'Tersedia' : 'Kosong' }}</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="{{ $kendaraan->nama_kendaraan }}" class="w-full h-full object-cover" src="{{ $kendaraan->gambar_utama ? asset($kendaraan->gambar_utama) : 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800' }}"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">{{ $kendaraan->nama_kendaraan }}</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $kendaraan->tipe }} • {{ $kendaraan->kategori }}</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">{{ $kendaraan->rating }}</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">{{ strtolower($kendaraan->tipe) == 'motor' ? 'speed' : 'airline_seat_recline_normal' }}</span>
                            {{ $kendaraan->spesifikasi['kapasitas_penumpang'] ?? 'N/A' }}
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            {{ $kendaraan->spesifikasi['transmisi'] ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="text-primary font-bold text-lg mb-3">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }} <span class="text-sm font-normal text-slate-500">/ hari</span></div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal-{{ $kendaraan->id }}').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <form action="{{ route('admin.armada.destroy', $kendaraan->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 h-full rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Kendaraan untuk ID: {{ $kendaraan->id }} -->
            <div class="fixed inset-0 z-[100] hidden" id="edit-vehicle-modal-{{ $kendaraan->id }}">
                <div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="document.getElementById('edit-vehicle-modal-{{ $kendaraan->id }}').classList.add('hidden')"></div>
                <form action="{{ route('admin.armada.update', $kendaraan->id) }}" method="POST" enctype="multipart/form-data" class="absolute right-0 top-0 h-full w-full max-w-2xl bg-surface shadow-2xl flex flex-col">
                    @csrf
                    @method('PUT')
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-white">
                        <h2 class="font-headline-md text-headline-md font-bold text-on-background">Edit Detail Kendaraan</h2>
                        <button type="button" class="p-2 hover:bg-slate-100 rounded-full transition-colors" onclick="document.getElementById('edit-vehicle-modal-{{ $kendaraan->id }}').classList.add('hidden')">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <!-- Content -->
                    <div class="flex-1 overflow-y-auto p-6 space-y-8">
                        <section>
                            <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Informasi Dasar</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Kendaraan</label>
                                    <input name="nama_kendaraan" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="text" value="{{ $kendaraan->nama_kendaraan }}"/>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tipe Kendaraan</label>
                                    <select name="tipe" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                        <option {{ $kendaraan->tipe == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                                        <option {{ $kendaraan->tipe == 'Motor' ? 'selected' : '' }}>Motor</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
                                    <input name="kategori" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., SUV, MPV, Matic" type="text" value="{{ $kendaraan->kategori }}"/>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Harga Sewa per Hari</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-body-sm">Rp</span>
                                        <input name="harga_sewa" required class="w-full border border-slate-200 rounded-lg pl-12 pr-4 py-2 focus:border-primary-container outline-none" type="number" value="{{ $kendaraan->harga_sewa }}"/>
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Stok Unit</label>
                                    <input name="stok" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50" type="number" value="{{ $kendaraan->stok }}"/>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Spesifikasi Utama</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Penumpang</label>
                                    <input name="kapasitas_penumpang" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="text" value="{{ $kendaraan->spesifikasi['kapasitas_penumpang'] ?? '' }}"/>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Transmisi</label>
                                    <select name="transmisi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                        <option {{ ($kendaraan->spesifikasi['transmisi'] ?? '') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                        <option {{ ($kendaraan->spesifikasi['transmisi'] ?? '') == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Bahan Bakar</label>
                                    <select name="bahan_bakar" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                        <option {{ ($kendaraan->spesifikasi['bahan_bakar'] ?? '') == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                                        <option {{ ($kendaraan->spesifikasi['bahan_bakar'] ?? '') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                        <option {{ ($kendaraan->spesifikasi['bahan_bakar'] ?? '') == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Bagasi</label>
                                    <input name="kapasitas_bagasi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="text" value="{{ $kendaraan->spesifikasi['kapasitas_bagasi'] ?? '' }}"/>
                                </div>
                            </div>
                        </section>
                        <section class="space-y-6">
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Deskripsi Kendaraan</label>
                                <textarea name="deskripsi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none resize-none" rows="4">{{ $kendaraan->deskripsi }}</textarea>
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Ganti Gambar Utama (Opsional)</label>
                                <input type="file" name="gambar_utama" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" accept="image/*">
                            </div>
                        </section>
                    </div>
                    <!-- Footer -->
                    <div class="p-6 border-t border-slate-200 bg-white flex gap-3">
                        <button type="button" class="flex-1 px-6 py-3 border border-slate-200 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-slate-50 transition-colors" onclick="document.getElementById('edit-vehicle-modal-{{ $kendaraan->id }}').classList.add('hidden')">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 px-6 py-3 bg-secondary-container text-white rounded-lg font-label-md text-label-md hover:bg-[#E66A17] transition-all shadow-md">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
            @empty
            <div class="col-span-full py-12 text-center bg-slate-50 rounded-xl border border-slate-200">
                <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">directions_car</span>
                <p class="text-on-surface-variant">Belum ada armada kendaraan.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Slideover Tambah Kendaraan -->
    <div class="fixed inset-0 z-[100] hidden" id="add-vehicle-slideover">
        <div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')"></div>
        <form action="{{ route('admin.armada.store') }}" method="POST" enctype="multipart/form-data" class="absolute right-0 top-0 h-full w-full max-w-2xl bg-surface shadow-2xl flex flex-col">
            @csrf
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-white">
                <h2 class="font-headline-md text-headline-md font-bold text-on-background">Tambah Kendaraan Baru</h2>
                <button type="button" class="p-2 hover:bg-slate-100 rounded-full transition-colors" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-6 space-y-8">
                <!-- Section 1: Informasi Dasar -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Informasi Dasar</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Kendaraan</label>
                            <input name="nama_kendaraan" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., Toyota Avanza" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tipe Kendaraan</label>
                            <select name="tipe" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
                            <input name="kategori" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., SUV, MPV, Matic" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Harga Sewa per Hari</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-body-sm">Rp</span>
                                <input name="harga_sewa" required class="w-full border border-slate-200 rounded-lg pl-12 pr-4 py-2 focus:border-primary-container outline-none" type="number"/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Stok Unit</label>
                            <input name="stok" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="number"/>
                        </div>
                    </div>
                </section>
                <!-- Section 2: Spesifikasi Utama -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Spesifikasi Utama</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Penumpang</label>
                            <input name="kapasitas_penumpang" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., 7 Penumpang" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Transmisi</label>
                            <select name="transmisi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Manual</option>
                                <option>Otomatis</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Bahan Bakar</label>
                            <select name="bahan_bakar" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Bensin</option>
                                <option>Diesel</option>
                                <option>Listrik</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Bagasi</label>
                            <input name="kapasitas_bagasi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., 4 Koper" type="text"/>
                        </div>
                    </div>
                </section>
                <!-- Section 3: Deskripsi & Media -->
                <section class="space-y-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Deskripsi Lengkap</label>
                        <textarea name="deskripsi" class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none resize-none" rows="4"></textarea>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Foto Utama</label>
                        <input type="file" name="gambar_utama" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" accept="image/*">
                    </div>
                </section>
            </div>
            <!-- Footer -->
            <div class="p-6 border-t border-slate-200 bg-white flex gap-3">
                <button type="button" class="flex-1 px-6 py-3 border border-slate-200 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-slate-50 transition-colors" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-secondary-container text-white rounded-lg font-label-md text-label-md hover:bg-[#E66A17] transition-all shadow-md">
                    Simpan Kendaraan
                </button>
            </div>
        </form>
@endsection
