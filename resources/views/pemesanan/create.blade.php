<x-app-layout>
    <main class="flex-grow max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap w-full">
        <div class="mb-stack-lg">
            <h1 class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface mb-stack-sm">Detail Pemesanan</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Lengkapi data diri Anda untuk mengonfirmasi pesanan kendaraan.</p>
        </div>

        <form action="{{ route('pemesanan.store') }}" method="POST" id="form-pemesanan">
            @csrf
            <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->id ?? 1 }}">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Left Column: Form & Duration -->
                <div class="lg:col-span-8 space-y-stack-lg">
                    
                    <!-- Personal Info Form Card -->
                    <section class="bg-surface rounded-[20px] shadow-sm border border-slate-200 p-margin-mobile md:p-margin-desktop">
                        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary" data-icon="person">person</span> Data Diri Penyewa
                        </h2>
                        
                        <div class="space-y-stack-md">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
                                <div class="flex flex-col gap-stack-sm">
                                    <label for="namaLengkap" class="font-label-md text-label-md text-on-surface">Nama Lengkap</label>
                                    <input type="text" id="namaLengkap" value="{{ auth()->user()->name ?? '' }}" class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md h-[48px] px-4" placeholder="Masukkan nama lengkap sesuai KTP" readonly>
                                </div>
                                <div class="flex flex-col gap-stack-sm">
                                    <label for="nik" class="font-label-md text-label-md text-on-surface">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" id="nik" value="{{ auth()->user()->nik ?? '' }}" class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md h-[48px] px-4" placeholder="16 digit NIK" readonly>
                                </div>
                            </div>
                            <div class="flex flex-col gap-stack-sm">
                                <label for="alamat" class="font-label-md text-label-md text-on-surface">Alamat Lengkap</label>
                                <textarea id="alamat" rows="3" class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md p-4" placeholder="Masukkan alamat lengkap domisili saat ini" readonly>{{ auth()->user()->alamat ?? '' }}</textarea>
                            </div>
                            <div class="flex flex-col gap-stack-sm">
                                <label for="email" class="font-label-md text-label-md text-on-surface">Alamat Email</label>
                                <input type="email" id="email" value="{{ auth()->user()->email ?? '' }}" class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md h-[48px] px-4" placeholder="contoh@email.com" readonly>
                            </div>
                        </div>
                    </section>

                    <!-- Rental Details Form Card -->
                    <section class="bg-surface rounded-[20px] shadow-sm border border-slate-200 p-margin-mobile md:p-margin-desktop">
                        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary" data-icon="calendar_today">calendar_today</span> Rencana Sewa
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md">
                            <div class="flex flex-col gap-stack-sm">
                                <label for="tanggal_mulai" class="font-label-md text-label-md text-on-surface">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md h-[48px] px-4">
                            </div>
                            <div class="flex flex-col gap-stack-sm">
                                <label for="durasi_hari" class="font-label-md text-label-md text-on-surface">Durasi Sewa (Hari)</label>
                                <input type="number" name="durasi_hari" id="durasi_hari" value="1" min="1" required class="rounded-lg border-slate-200 bg-slate-50 text-on-surface focus:border-primary focus:ring focus:ring-primary-container focus:ring-opacity-20 font-body-md text-body-md h-[48px] px-4 text-center">
                            </div>
                            <div class="flex flex-col gap-stack-sm">
                                <label class="font-label-md text-label-md text-on-surface">Tanggal Selesai</label>
                                <div class="bg-slate-100 rounded-lg h-[48px] px-4 flex items-center text-on-surface-variant font-body-md text-body-md border border-transparent">
                                    <span id="tanggalSelesai">Pilih tanggal mulai</span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right Column: Vehicle Summary & Cost Calculation (Sticky) -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 bg-surface rounded-[20px] shadow-sm border border-slate-200 p-margin-mobile md:p-margin-desktop flex flex-col gap-stack-md">
                        <!-- Vehicle Info -->
                        <div class="relative w-full aspect-[16/9] rounded-xl overflow-hidden mb-stack-sm bg-slate-100">
                            <img src="{{ isset($kendaraan) ? $kendaraan->gambar_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu1eCwLTLbCCGXVU6ov7xfzNChrJOWaYDwl4UzCNNrpy6HS_LsxPEikJDmi8KAqOWZEyye49ancahF2WboiIrx2-GIfCioDtW6IFn6_ymqNCLOX59m_czj-8dh4iSFnf0YbO0NANbB1JrwXuIDlTWpplCA6ihp6Krm24k95_M5EtwgPfOzPUq31GSDkfQeuMN8VP9zRFaWXg1hrZi93fU-Gk0HyJvFnuqFSiW3sj6rky2pKcgUBCWPJ2PoP5uEuE3NWquu1Mwqyw4' }}" alt="Vehicle Image" class="w-full h-full object-cover">
                            <div class="absolute top-3 left-3 bg-inverse-surface/80 backdrop-blur-sm px-3 py-1 rounded-full flex items-center gap-1 text-on-primary">
                                <span class="material-symbols-outlined text-[16px]" data-icon="directions_car">{{ isset($kendaraan) && $kendaraan->tipe === 'Motor' ? 'motorcycle' : 'directions_car' }}</span>
                                <span class="font-label-sm text-label-sm">{{ $kendaraan->tipe ?? 'Mobil' }}</span>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $kendaraan->nama ?? 'Toyota Innova Zenix' }}</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-[16px] text-[#F59E0B]" data-icon="star">star</span>
                                {{ number_format($kendaraan->rating ?? 4.9, 1) }} Ulasan
                            </p>
                        </div>
                        
                        <div class="h-px bg-slate-200 w-full my-stack-sm"></div>

                        <!-- Cost Calculation -->
                        <h4 class="font-label-md text-label-md text-on-surface mb-2">Rincian Biaya</h4>
                        <div class="flex justify-between items-center font-body-sm text-body-sm">
                            <span class="text-on-surface-variant">Harga per hari</span>
                            <span class="text-on-surface font-medium" data-harga-harian="{{ $kendaraan->harga_sewa ?? 650000 }}">Rp {{ number_format($kendaraan->harga_sewa ?? 650000, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center font-body-sm text-body-sm mt-2">
                            <span class="text-on-surface-variant">Durasi</span>
                            <span class="text-on-surface font-medium"><span id="summary-durasi">1</span> Hari</span>
                        </div>
                        
                        <div class="h-px bg-slate-200 w-full my-stack-sm border-dashed border-t-2"></div>
                        
                        <div class="flex justify-between items-end mb-stack-md">
                            <span class="font-headline-sm text-headline-sm text-on-surface">Total Biaya</span>
                            <span class="font-headline-sm text-headline-sm text-primary font-bold" id="total-biaya">Rp {{ number_format($kendaraan->harga_sewa ?? 650000, 0, ',', '.') }}</span>
                        </div>

                        <!-- CTA Button -->
                        <button type="submit" class="w-full bg-[#F97316] text-on-primary font-label-md text-label-md py-4 rounded-lg hover:-translate-y-1 hover:shadow-lg hover:shadow-[#F97316]/20 transition-all duration-200 flex justify-center items-center gap-2 mt-auto">
                            Lanjut Pembayaran <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                        </button>
                        <p class="font-label-sm text-label-sm text-on-surface-variant text-center mt-2 flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="lock">lock</span> Pembayaran aman dan terenkripsi
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hargaHarian = {{ isset($kendaraan) ? $kendaraan->harga_sewa : 650000 }};
            const durasiInput = document.getElementById('durasi_hari');
            const summaryDurasi = document.getElementById('summary-durasi');
            const totalBiayaDisplay = document.getElementById('total-biaya');
            const tanggalMulaiInput = document.getElementById('tanggal_mulai');
            const tanggalSelesaiDisplay = document.getElementById('tanggalSelesai');

            const formatRupiah = (number) => {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
            };

            const calculate = () => {
                let hari = parseInt(durasiInput.value);
                if (isNaN(hari) || hari < 1) {
                    hari = 1;
                }
                
                summaryDurasi.textContent = hari;
                const total = hari * hargaHarian;
                totalBiayaDisplay.textContent = formatRupiah(total);

                if (tanggalMulaiInput.value) {
                    const startDate = new Date(tanggalMulaiInput.value);
                    if (!isNaN(startDate.getTime())) {
                        const endDate = new Date(startDate);
                        endDate.setDate(startDate.getDate() + hari);
                        tanggalSelesaiDisplay.textContent = endDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                    }
                } else {
                    tanggalSelesaiDisplay.textContent = 'Pilih tanggal mulai';
                }
            };

            durasiInput.addEventListener('input', calculate);
            tanggalMulaiInput.addEventListener('change', calculate);
        });
    </script>
</x-app-layout>
