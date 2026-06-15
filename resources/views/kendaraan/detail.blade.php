<x-app-layout>
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-md">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" class="flex py-stack-sm text-body-sm text-outline mb-6">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('beranda') }}" class="hover:text-primary transition-colors">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-sm mx-1">chevron_right</span>
                        <a href="{{ route('kendaraan.index') }}" class="hover:text-primary transition-colors">Daftar Kendaraan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-sm mx-1">chevron_right</span>
                        <span class="text-on-surface font-semibold">{{ $kendaraan->nama_kendaraan }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Detail Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            <!-- Left Column: Gallery -->
            <div class="md:col-span-7 space-y-gutter">
                <div class="bg-surface rounded-3xl overflow-hidden shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)]">
                    <img src="{{ $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCAq_hivCr6iqSl5x-TT9a6xKFrQQY7M10X4fxFXWY91VsXpre2G1guCfburjmIPWM0UYlwFeZD-r0CQpZgQiuhksaqtLuNvre1_Tp3puMYx-3dIDt11CGXmt_KWEGOSOOlj7RZuuthtMqLYBbpaObqhAbKsGWCgAOs4sFE9rmi6u429rpgjND5jgI41P4ZHbvJhzyrOqxv614SDhtseQXL_6pBw33r4-8DafiLc5afD1MN_guLSU-PUjB905H3KWsQ_Aa_KnGth10' }}" 
                         alt="{{ $kendaraan->nama_kendaraan }} Front View" id="main-image" class="w-full aspect-video object-cover transition-all duration-200">
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @php
                        $galeri = (is_array($kendaraan->gambar_galeri) && count($kendaraan->gambar_galeri) > 0) ? $kendaraan->gambar_galeri : [
                            $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuBXglxGybZor3kXqRrwlrGTDqLZjVt6WaLUCIDDWh9GIyLZnwy5m164i7eopucIh6Nl8S0lNocd4Vm3QnMiMFa-EDeCPqm0aggZrGNYrgsqgqdy0S4x81zJgHXVTp25Xgu7DOktmfCW6eCNwqGef01mLELr9tP3Yp3n5Pd70PSBS-Bc76-x0CKwBtMwmKCaOk793Kn7HgTe2rjysoP9s7gq-noQtBp7wTxSBNpEp95yghSB-dEKVwnVuIPaRPWwVfQWzrLs26RJuR0',
                            $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCgGSVYhcB1rV-jWX5e-aa1vuM70CFOzFHU2BA7FW3b-drZcci4jbs1dAPWRHcqm9GVA12P3T7LouCyIxS8nex5ITy5MFs-C7tmmisKQJq7iA-qfDNSl7FiKHblsOP31aQ3cBLpX5s4yMsXkfUtbmkGu4Ldj5N0GkzXF8bzZxwG62HnWNNtB5Cx9vaXkl168ZROJiGJkH7WckoNRTNg2XU5lnMsclQ794RZxr_ydFM8CK2QH1oKVxxCD9lb67oUrLLUEg5cC9KVkXI',
                            $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAYuDCvHs8yv8rPacS6XparPbQQvaJLKJdpW6skhk2OJnfOC6_EnrviOZTLGZepLf0rStWLdEm0hFr0TQdFgtwsBP_G3Pd_Nx4nnSwpm8NaPkP6uIxu3HpWzkfewPFg3urhpaN04rROb_SjIg8ASGv7Dkv-rwogQGUu6DkZ9rdpOD-Ka03drpHcq3sdQgnaln1O1kuFVY0wQuGpn7GrWwgvbTnqrXbSwS4DArC0SOa-gfC2YCz0Ox0R5L59pmDLsXcyGN6AriLM_Rs'
                        ];
                    @endphp
                    @foreach(array_slice($galeri, 0, 3) as $img)
                    <div class="bg-surface rounded-xl overflow-hidden shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] cursor-pointer hover:ring-2 ring-secondary-container transition-all">
                        <img src="{{ $img }}" alt="Gallery Image" class="gallery-img w-full aspect-[4/3] object-cover">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column: Information & Booking -->
            <div class="md:col-span-5 space-y-gutter">
                <div class="bg-surface p-stack-lg rounded-3xl shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-4 py-1 rounded-full bg-blue-100 text-primary text-label-sm uppercase font-bold tracking-wider">{{ $kendaraan->tipe }} PREMIUM</span>
                        <div class="flex items-center text-secondary-container">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="ml-1 font-label-md text-on-surface">{{ number_format($kendaraan->rating, 1) }} ({{ $kendaraan->umpanBaliks ? $kendaraan->umpanBaliks->count() : 0 }} Review)</span>
                        </div>
                    </div>
                    
                    <h1 class="font-headline-lg text-on-surface mb-2">{{ $kendaraan->nama_kendaraan }}</h1>
                    <p class="font-body-md text-on-surface-variant mb-6">Nikmati kemewahan dan kenyamanan maksimal untuk perjalanan keluarga atau bisnis Anda dengan {{ $kendaraan->nama_kendaraan }} terbaru. Efisien dan tangguh.</p>
                    
                    <div class="flex items-baseline gap-2 mb-8">
                        <span class="text-headline-md text-secondary-container font-bold">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}</span>
                        <span class="text-on-surface-variant font-body-sm">/ hari</span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        @if($kendaraan->tipe === 'Mobil' && isset($kendaraan->spesifikasi['seats']))
                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-primary">groups</span>
                            <div>
                                <p class="text-label-sm text-outline">Kapasitas</p>
                                <p class="text-label-md text-on-surface">{{ $kendaraan->spesifikasi['seats'] }} Penumpang</p>
                            </div>
                        </div>
                        @elseif($kendaraan->tipe === 'Motor' && isset($kendaraan->spesifikasi['cc']))
                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-primary">two_wheeler</span>
                            <div>
                                <p class="text-label-sm text-outline">Kapasitas Mesin</p>
                                <p class="text-label-md text-on-surface">{{ $kendaraan->spesifikasi['cc'] }} CC</p>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-primary">settings_input_component</span>
                            <div>
                                <p class="text-label-sm text-outline">Transmisi</p>
                                <p class="text-label-md text-on-surface">{{ $kendaraan->spesifikasi['transmisi'] ?? 'Otomatis' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-primary">local_gas_station</span>
                            <div>
                                <p class="text-label-sm text-outline">Bahan Bakar</p>
                                <p class="text-label-md text-on-surface">{{ $kendaraan->spesifikasi['bahan_bakar'] ?? 'Bensin' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-primary">luggage</span>
                            <div>
                                <p class="text-label-sm text-outline">Bagasi</p>
                                <p class="text-label-md text-on-surface">{{ $kendaraan->spesifikasi['bagasi'] ?? 'Standard' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-container-lowest border border-slate-200 p-6 rounded-2xl mb-6">
                        <div class="flex items-center gap-2 text-success mb-6">
                            <span class="material-symbols-outlined">verified_user</span>
                            <span class="text-body-sm font-semibold">Termasuk asuransi dasar & pajak</span>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('/pemesanan/create/' . $kendaraan->id) }}" class="w-full bg-secondary-container text-on-primary py-4 rounded-xl font-headline-sm hover:translate-y-[-4px] transition-transform shadow-lg active:scale-95 text-center inline-block">
                                Pesan Sekarang
                            </a>
                            <button class="w-full border-2 border-primary text-primary py-4 rounded-xl font-label-md flex items-center justify-center gap-2 hover:bg-slate-50 transition-all active:scale-95">
                                <span class="material-symbols-outlined">chat</span>
                                Tanya Ketersediaan (WhatsApp)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Specifications Table-like Detail -->
        <section class="mt-section-gap">
            <h2 class="font-headline-md text-on-surface mb-gutter">Detail Spesifikasi</h2>
            <div class="bg-surface rounded-3xl overflow-hidden shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 border-b border-r border-slate-100 flex justify-between items-center">
                        <span class="text-outline">Tipe Mesin</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['mesin'] ?? 'Standard' }}</span>
                    </div>
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <span class="text-outline">Tenaga Maksimum</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['power'] ?? 'N/A' }}</span>
                    </div>
                    <div class="p-6 border-b border-r border-slate-100 flex justify-between items-center">
                        <span class="text-outline">Torsi Maksimum</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['torque'] ?? 'N/A' }}</span>
                    </div>
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <span class="text-outline">Tahun Produksi</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['tahun'] ?? '2023 - 2024' }}</span>
                    </div>
                    <div class="p-6 border-r border-slate-100 flex justify-between items-center">
                        <span class="text-outline">Sistem Hiburan</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['entertainment'] ?? 'Standard Audio' }}</span>
                    </div>
                    <div class="p-6 flex justify-between items-center">
                        <span class="text-outline">Fitur Keamanan</span>
                        <span class="font-label-md">{{ $kendaraan->spesifikasi['safety'] ?? 'ABS + EBD' }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Terms and Conditions -->
        <section class="mt-section-gap mb-section-gap">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <div class="bg-white p-8 rounded-3xl shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-100">
                    <div class="w-12 h-12 bg-blue-50 text-primary rounded-2xl flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <h3 class="font-headline-sm mb-2">Syarat Sewa</h3>
                    <ul class="text-body-sm text-on-surface-variant space-y-2">
                        <li>• KTP & SIM Aktif</li>
                        <li>• Kartu Identitas Lainnya</li>
                        <li>• Akun Media Sosial Aktif</li>
                    </ul>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-100">
                    <div class="w-12 h-12 bg-orange-50 text-secondary-container rounded-2xl flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <h3 class="font-headline-sm mb-2">Waktu Sewa</h3>
                    <ul class="text-body-sm text-on-surface-variant space-y-2">
                        <li>• Durasi minimal 24 Jam</li>
                        <li>• Overtime 10% per jam</li>
                        <li>• Pengambilan mulai jam 08:00</li>
                    </ul>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-100">
                    <div class="w-12 h-12 bg-green-50 text-success rounded-2xl flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">health_and_safety</span>
                    </div>
                    <h3 class="font-headline-sm mb-2">Layanan Extra</h3>
                    <ul class="text-body-sm text-on-surface-variant space-y-2">
                        <li>• Driver Profesional (Opsional)</li>
                        <li>• Antar Jemput Bandara</li>
                        <li>• Emergency Road Assistance 24/7</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const galleryImages = document.querySelectorAll('.gallery-img');
            const mainImage = document.getElementById('main-image');

            galleryImages.forEach(img => {
                img.addEventListener('click', () => {
                    const tempSrc = mainImage.src;
                    
                    mainImage.style.opacity = '0';
                    setTimeout(() => {
                        mainImage.src = img.src;
                        mainImage.style.opacity = '1';
                    }, 200);
                });
            });
        });
    </script>
</x-app-layout>
