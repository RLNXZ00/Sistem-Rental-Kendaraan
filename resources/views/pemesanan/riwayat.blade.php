<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen" x-data="{ activeModal: false, historyModal: false, cancelModal: false, selectedPemesanan: {} }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            <header>
                <h1 class="text-3xl font-bold text-blue-900" style="font-family: 'Montserrat', sans-serif;">Pemesanan Saya</h1>
                <p class="text-slate-600 mt-2" style="font-family: 'Inter', sans-serif;">Kelola dan lihat detail seluruh perjalanan Anda bersama AutoRide.</p>
            </header>

            <!-- Active Booking Section -->
            <section class="flex flex-col gap-6">
                <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-2" style="font-family: 'Montserrat', sans-serif;">
                    <span class="material-symbols-outlined text-orange-500">schedule</span>
                    Pemesanan Aktif
                </h2>
                
                @if($pemesananAktif->isEmpty())
                    <div class="bg-white p-6 rounded-xl border border-slate-200 text-center text-slate-500 shadow-sm">
                        Tidak ada pemesanan aktif saat ini.
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($pemesananAktif as $pesanan)
                        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg cursor-pointer"
                             @click="selectedPemesanan = {{ json_encode([
                                 'id' => $pesanan->id,
                                 'kendaraan' => $pesanan->kendaraan->nama_kendaraan ?? 'Kendaraan',
                                 'gambar' => $pesanan->kendaraan->gambar_utama ? asset($pesanan->kendaraan->gambar_utama) : 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800',
                                 'tanggal' => \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M Y') . ' - ' . \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y'),
                                 'durasi' => $pesanan->durasi_hari . ' Hari',
                                 'total' => 'Rp ' . number_format($pesanan->total_biaya, 0, ',', '.'),
                                 'status' => $pesanan->status
                             ]) }}; activeModal = true">
                            <div class="aspect-video w-full bg-slate-100 relative">
                                <img src="{{ $pesanan->kendaraan->gambar_utama ? asset($pesanan->kendaraan->gambar_utama) : 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800' }}" class="w-full h-full object-cover" alt="{{ $pesanan->kendaraan->nama_kendaraan ?? 'Mobil' }}">
                                
                                @if($pesanan->status === 'Berjalan')
                                <div class="absolute top-4 left-4 bg-emerald-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">local_taxi</span>
                                    Berjalan
                                </div>
                                @else
                                <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">event_upcoming</span>
                                    Akan Datang
                                </div>
                                @endif
                            </div>
                            <div class="p-4 flex flex-col gap-2">
                                <h3 class="text-xl font-bold text-slate-900" style="font-family: 'Montserrat', sans-serif;">{{ $pesanan->kendaraan->nama_kendaraan ?? 'Kendaraan' }}</h3>
                                <p class="text-sm text-slate-500 flex items-center gap-1" style="font-family: 'Inter', sans-serif;">
                                    <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                    {{ \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </section>

            <!-- History Section -->
            <section class="flex flex-col gap-6">
                <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-2" style="font-family: 'Montserrat', sans-serif;">
                    <span class="material-symbols-outlined text-blue-900">history</span>
                    Riwayat Pemesanan
                </h2>
                
                @if($riwayatPemesanan->isEmpty())
                    <div class="bg-white p-6 rounded-xl border border-slate-200 text-center text-slate-500 shadow-sm">
                        Belum ada riwayat pemesanan.
                    </div>
                @else
                    <div class="flex flex-col gap-4">
                        @foreach($riwayatPemesanan as $pesanan)
                        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative flex flex-col md:flex-row items-center p-4 gap-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                            <!-- Indicator -->
                            <div class="absolute left-0 top-0 bottom-0 w-[6px] {{ $pesanan->status === 'Selesai' ? 'bg-emerald-500' : ($pesanan->status === 'Denda Terlambat' ? 'bg-red-500' : 'bg-slate-400') }}"></div>
                            
                            <!-- Icon -->
                            <div class="w-full md:w-auto flex-shrink-0 flex items-center justify-center md:justify-start md:ml-2">
                                @if($pesanan->status === 'Selesai')
                                <div class="w-16 h-16 bg-blue-50 rounded-lg flex items-center justify-center text-blue-900">
                                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                                </div>
                                @elseif($pesanan->status === 'Denda Terlambat')
                                <div class="w-16 h-16 bg-red-50 rounded-lg flex items-center justify-center text-red-700">
                                    <span class="material-symbols-outlined text-3xl">warning</span>
                                </div>
                                @else
                                <div class="w-16 h-16 bg-slate-100 rounded-lg flex items-center justify-center text-slate-500">
                                    <span class="material-symbols-outlined text-3xl">cancel</span>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-grow w-full text-center md:text-left">
                                <h3 class="text-xl font-bold text-slate-900" style="font-family: 'Montserrat', sans-serif;">{{ $pesanan->kendaraan->nama_kendaraan ?? 'Kendaraan' }}</h3>
                                <p class="text-sm text-slate-500 mt-1" style="font-family: 'Inter', sans-serif;">{{ \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y') }}</p>
                                <div class="flex items-center justify-center md:justify-start gap-2 mt-2">
                                    @if($pesanan->status === 'Selesai')
                                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded">Selesai</span>
                                        <span class="text-sm text-slate-600 font-medium">Rp {{ number_format($pesanan->total_biaya, 0, ',', '.') }}</span>
                                    @elseif($pesanan->status === 'Denda Terlambat')
                                        <span class="text-xs font-semibold text-red-600 bg-red-100 px-2 py-0.5 rounded">Denda Terlambat</span>
                                        <span class="text-sm text-slate-600 font-medium">Rp {{ number_format($pesanan->total_biaya + $pesanan->denda, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-xs font-semibold text-slate-600 bg-slate-200 px-2 py-0.5 rounded">{{ $pesanan->status }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <div class="w-full md:w-auto mt-4 md:mt-0">
                                <button class="w-full md:w-auto border border-blue-900 text-blue-900 hover:bg-blue-900 hover:text-white transition-colors px-4 py-2 rounded-lg text-sm font-semibold"
                                        @click="selectedPemesanan = {{ json_encode([
                                            'kendaraan' => $pesanan->kendaraan->nama_kendaraan ?? 'Kendaraan',
                                            'gambar' => $pesanan->kendaraan->gambar_utama ? asset($pesanan->kendaraan->gambar_utama) : 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800',
                                            'tanggal' => \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M Y') . ' - ' . \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y'),
                                            'durasi' => $pesanan->durasi_hari . ' Hari' . ($pesanan->denda > 0 ? ' (+ Denda)' : ''),
                                            'total' => 'Rp ' . number_format($pesanan->total_biaya + $pesanan->denda, 0, ',', '.'),
                                            'status' => $pesanan->status
                                        ]) }}; historyModal = true">
                                    Detail Riwayat
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>

        <!-- MODAL PEMESANAN AKTIF -->
        <div x-show="activeModal" style="display: none;" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300">
            <div @click.away="activeModal = false" x-show="activeModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col">
                <!-- Header -->
                <div class="flex items-center justify-between p-4 border-b border-slate-200 bg-white">
                    <h2 class="text-xl font-bold text-blue-900 ml-2" style="font-family: 'Montserrat', sans-serif;">Detail Pemesanan Aktif</h2>
                    <button @click="activeModal = false" class="p-2 rounded-full hover:bg-slate-100 text-slate-500 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <!-- Content -->
                <div class="p-6 overflow-y-auto max-h-[70vh]">
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-full aspect-video bg-slate-100 rounded-xl mb-4 overflow-hidden relative shadow-sm border border-slate-200">
                            <img :src="selectedPemesanan.gambar" class="w-full h-full object-cover" alt="Vehicle">
                        </div>
                        <h3 class="text-xl font-bold text-blue-900 text-center mb-2" x-text="selectedPemesanan.kendaraan" style="font-family: 'Montserrat', sans-serif;"></h3>
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border"
                             :class="selectedPemesanan.status === 'Berjalan' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-blue-50 text-blue-900 border-blue-100'">
                            <span class="w-2 h-2 rounded-full mr-2" :class="selectedPemesanan.status === 'Berjalan' ? 'bg-emerald-500' : 'bg-blue-600'"></span>
                            <span x-text="selectedPemesanan.status"></span>
                        </div>
                    </div>
                    <div class="space-y-4 border-t border-slate-200 pt-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-slate-600">
                                <span class="material-symbols-outlined mr-2 text-blue-900">calendar_month</span>
                                <span class="text-sm font-semibold">Tanggal Sewa</span>
                            </div>
                            <span class="text-sm font-semibold text-slate-900" x-text="selectedPemesanan.tanggal"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-slate-600">
                                <span class="material-symbols-outlined mr-2 text-blue-900">schedule</span>
                                <span class="text-sm font-semibold">Durasi</span>
                            </div>
                            <span class="text-sm font-semibold text-slate-900" x-text="selectedPemesanan.durasi"></span>
                        </div>
                        <div class="flex justify-between items-center border-t border-slate-100 pt-4 mt-2">
                            <div class="flex items-center text-slate-600">
                                <span class="material-symbols-outlined mr-2 text-blue-900">payments</span>
                                <span class="text-base font-semibold">Total Biaya</span>
                            </div>
                            <span class="text-xl font-bold text-blue-900" x-text="selectedPemesanan.total"></span>
                        </div>
                    </div>
                </div>
                <!-- Actions -->
                <div class="p-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-2">
                    <button x-show="selectedPemesanan.status === 'Akan Datang'" @click="cancelModal = true" class="px-6 py-2 rounded-lg border border-red-600 text-red-600 text-sm font-semibold hover:bg-red-600 hover:text-white transition-colors duration-200">
                        Batalkan Pesanan
                    </button>
                    <button @click="activeModal = false" class="px-6 py-2 rounded-lg border border-blue-900 text-blue-900 text-sm font-semibold hover:bg-blue-900 hover:text-white transition-colors duration-200">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL RIWAYAT -->
        <div x-show="historyModal" style="display: none;" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300">
            <div @click.away="historyModal = false" x-show="historyModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden flex flex-col">
                <!-- Header -->
                <div class="flex items-center justify-between p-4 border-b border-slate-200 bg-white">
                    <h2 class="text-xl font-bold text-blue-900 ml-2" style="font-family: 'Montserrat', sans-serif;">Detail Riwayat Pemesanan</h2>
                    <button @click="historyModal = false" class="p-2 rounded-full hover:bg-slate-100 text-slate-500 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <!-- Content -->
                <div class="p-6 overflow-y-auto max-h-[70vh]">
                    <div class="w-full aspect-video rounded-xl overflow-hidden bg-slate-100 relative shadow-sm border border-slate-200 mb-6">
                        <img :src="selectedPemesanan.gambar" class="w-full h-full object-cover" alt="Vehicle">
                        <div class="absolute top-2 right-2 px-3 py-1 rounded-full text-xs font-semibold shadow-md flex items-center gap-1"
                             :class="selectedPemesanan.status === 'Selesai' ? 'bg-emerald-500 text-white' : (selectedPemesanan.status === 'Denda Terlambat' ? 'bg-red-500 text-white' : 'bg-slate-500 text-white')">
                            <span class="material-symbols-outlined text-[14px]" x-text="selectedPemesanan.status === 'Selesai' ? 'check_circle' : (selectedPemesanan.status === 'Denda Terlambat' ? 'warning' : 'info')"></span>
                            <span x-text="selectedPemesanan.status"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl font-bold text-slate-900" x-text="selectedPemesanan.kendaraan" style="font-family: 'Montserrat', sans-serif;"></h3>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div class="col-span-2 md:col-span-1">
                                <span class="block text-slate-500 text-xs font-semibold mb-1 uppercase tracking-wider">Tanggal Sewa</span>
                                <div class="flex items-center gap-2 text-slate-900 text-sm bg-slate-50 p-2 rounded-lg border border-slate-200 font-semibold">
                                    <span class="material-symbols-outlined text-blue-900 text-[20px]">calendar_month</span>
                                    <span x-text="selectedPemesanan.tanggal"></span>
                                </div>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <span class="block text-slate-500 text-xs font-semibold mb-1 uppercase tracking-wider">Durasi</span>
                                <div class="flex items-center gap-2 text-slate-900 text-sm bg-slate-50 p-2 rounded-lg border border-slate-200 font-semibold">
                                    <span class="material-symbols-outlined text-blue-900 text-[20px]">schedule</span>
                                    <span x-text="selectedPemesanan.durasi"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 my-4">
                    
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-200 flex justify-between items-center shadow-sm">
                        <div>
                            <span class="block text-blue-900 text-xs font-bold mb-1">Total Biaya</span>
                            <span class="text-2xl font-bold text-blue-900" x-text="selectedPemesanan.total" style="font-family: 'Montserrat', sans-serif;"></span>
                        </div>
                        <span class="material-symbols-outlined text-blue-900 text-[32px] opacity-20">payments</span>
                    </div>
                    
                    <div class="mt-4 flex items-start gap-2 text-slate-600 text-sm bg-slate-50 p-3 rounded-lg border border-slate-200" x-show="selectedPemesanan.status === 'Selesai'">
                        <span class="material-symbols-outlined text-[18px] text-slate-500 mt-0.5">info</span>
                        <p>Pemesanan ini telah selesai dan kendaraan telah dikembalikan dengan kondisi baik. Terima kasih telah menggunakan AutoRide.</p>
                    </div>
                    
                    <div class="mt-4 flex items-start gap-2 text-red-700 text-sm bg-red-50 p-3 rounded-lg border border-red-200" x-show="selectedPemesanan.status === 'Denda Terlambat'">
                        <span class="material-symbols-outlined text-[18px] text-red-500 mt-0.5">warning</span>
                        <p>Terdapat biaya denda akibat keterlambatan pengembalian yang sudah ditambahkan ke dalam total tagihan Anda.</p>
                    </div>
                </div>
                <!-- Actions -->
                <div class="p-4 border-t border-slate-200 bg-white flex justify-end gap-2">
                    <button class="px-4 py-2 bg-white text-blue-900 border border-blue-900 rounded-lg text-sm font-semibold hover:-translate-y-1 hover:shadow-md transition-all duration-200">Unduh Invoice</button>
                    <button @click="historyModal = false" class="px-4 py-2 bg-blue-900 text-white rounded-lg text-sm font-semibold hover:bg-blue-800 hover:-translate-y-1 hover:shadow-md transition-all duration-200">Pesan Lagi</button>
                </div>
            </div>
        </div>
        <!-- MODAL KONFIRMASI PEMBATALAN -->
        <div x-show="cancelModal" style="display: none;" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[60] flex items-center justify-center p-4 transition-opacity duration-300">
            <div @click.away="cancelModal = false" x-show="cancelModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden flex flex-col">
                <div class="p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center text-red-600 mb-4">
                        <span class="material-symbols-outlined text-4xl">warning</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Batalkan Pesanan Ini?</h3>
                    <p class="text-sm text-slate-600 mb-6">Apakah Anda yakin ingin membatalkan penyewaan mobil <strong class="text-slate-900" x-text="selectedPemesanan.kendaraan"></strong>? Aksi ini tidak dapat dibatalkan.</p>
                    
                    <form :action="'/pemesanan/' + selectedPemesanan.id + '/batal'" method="POST" class="w-full text-left" x-data="{ alasan: '' }">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-slate-700 mb-3">Beritahu kami alasan pembatalan Anda:</label>
                            
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 text-sm text-slate-700 cursor-pointer hover:bg-slate-50 p-2 rounded-lg transition-colors border border-transparent hover:border-slate-200">
                                    <input type="radio" name="alasan_batal_radio" value="Menemukan kendaraan lain" x-model="alasan" class="w-4 h-4 text-red-600 focus:ring-red-500 cursor-pointer border-slate-300">
                                    Menemukan kendaraan lain
                                </label>
                                <label class="flex items-center gap-3 text-sm text-slate-700 cursor-pointer hover:bg-slate-50 p-2 rounded-lg transition-colors border border-transparent hover:border-slate-200">
                                    <input type="radio" name="alasan_batal_radio" value="Kesalahan memilih tanggal" x-model="alasan" class="w-4 h-4 text-red-600 focus:ring-red-500 cursor-pointer border-slate-300">
                                    Kesalahan memilih tanggal
                                </label>
                                <label class="flex items-center gap-3 text-sm text-slate-700 cursor-pointer hover:bg-slate-50 p-2 rounded-lg transition-colors border border-transparent hover:border-slate-200">
                                    <input type="radio" name="alasan_batal_radio" value="Berubah pikiran" x-model="alasan" class="w-4 h-4 text-red-600 focus:ring-red-500 cursor-pointer border-slate-300">
                                    Berubah pikiran
                                </label>
                                <label class="flex items-center gap-3 text-sm text-slate-700 cursor-pointer hover:bg-slate-50 p-2 rounded-lg transition-colors border border-transparent hover:border-slate-200" :class="alasan === 'Lainnya' ? 'bg-slate-50 border-slate-200' : ''">
                                    <input type="radio" name="alasan_batal_radio" value="Lainnya" x-model="alasan" class="w-4 h-4 text-red-600 focus:ring-red-500 cursor-pointer border-slate-300">
                                    Lainnya...
                                </label>
                            </div>
                            
                            <!-- Panel Text Area (Muncul jika Lainnya dipilih) -->
                            <div x-show="alasan === 'Lainnya'" x-collapse class="mt-3 overflow-hidden transition-all duration-300">
                                <textarea name="alasan_batal_lainnya" rows="2" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 text-sm placeholder-slate-400" placeholder="Tuliskan alasan spesifik Anda di sini..." :required="alasan === 'Lainnya'"></textarea>
                            </div>
                        </div>
                        <div class="flex gap-3 mt-6">
                            <button type="button" @click="cancelModal = false" class="flex-1 px-4 py-2 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors">Kembali</button>
                            <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">Ya, Batalkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
