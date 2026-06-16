<x-admin-layout>
    <main class="flex-1 p-margin-desktop max-w-container-max mx-auto w-full">
        <div class="mb-8">
            <h2 class="font-headline-lg text-headline-lg text-primary mb-2">Tentang Sistem</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Informasi detail mengenai versi aplikasi, log pembaruan, dan status server Velocity Drive.</p>
        </div>

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            <!-- Versi Aplikasi (Hero Card) - Spans 8 cols -->
            <div class="md:col-span-8 bg-surface rounded-card border border-slate-200 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col relative group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-fixed rounded-full blur-3xl opacity-20 -mr-20 -mt-20 group-hover:bg-primary-container transition-colors duration-500"></div>
                
                <div class="p-8 flex-1 flex flex-col justify-center relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
                        <h3 class="font-headline-md text-headline-md text-primary">Velocity Drive Core</h3>
                    </div>
                    
                    <div class="flex items-baseline gap-4 mb-4">
                        <span class="font-headline-xl text-headline-xl text-on-background">v1.2.4</span>
                        <span class="px-3 py-1 bg-surface-container-low text-primary font-label-sm text-label-sm rounded-full border border-primary-fixed">Stable Build</span>
                    </div>
                    
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-lg mb-8">
                        Sistem manajemen penyewaan kendaraan utama. Versi ini berfokus pada peningkatan stabilitas transaksi dan optimalisasi antarmuka pengguna untuk pengalaman administratif yang lebih efisien.
                    </p>
                    
                    <div class="flex gap-6 border-t border-slate-200 pt-6">
                        <div>
                            <p class="font-label-sm text-label-sm text-outline mb-1">Terakhir Diperbarui</p>
                            <p class="font-body-md text-body-md text-on-background font-medium">15 Oktober 2023</p>
                        </div>
                        <div>
                            <p class="font-label-sm text-label-sm text-outline mb-1">Framework</p>
                            <p class="font-body-md text-body-md text-on-background font-medium">Laravel 10.x</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Info - Spans 4 cols -->
            <div class="md:col-span-4 bg-surface rounded-card border border-slate-200 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 p-8 flex flex-col">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-headline-sm text-headline-sm text-primary">Status Sistem</h3>
                    <span class="flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-success opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-success"></span>
                    </span>
                </div>
                
                <div class="flex-1 flex flex-col gap-6 justify-center">
                    <!-- Metric 1 -->
                    <div class="bg-slate-50 rounded-lg p-4 border border-slate-100">
                        <div class="flex items-center gap-2 mb-2 text-outline">
                            <span class="material-symbols-outlined text-[20px]">memory</span>
                            <span class="font-label-sm text-label-sm">Penggunaan Memori</span>
                        </div>
                        <div class="flex items-end justify-between">
                            <span class="font-headline-md text-headline-md text-on-background">45%</span>
                            <span class="font-label-sm text-label-sm text-success">Normal</span>
                        </div>
                        <div class="w-full bg-slate-200 rounded-full h-1.5 mt-3">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    
                    <!-- Metric 2 -->
                    <div class="bg-slate-50 rounded-lg p-4 border border-slate-100">
                        <div class="flex items-center gap-2 mb-2 text-outline">
                            <span class="material-symbols-outlined text-[20px]">schedule</span>
                            <span class="font-label-sm text-label-sm">Server Uptime</span>
                        </div>
                        <div class="flex items-end justify-between">
                            <span class="font-headline-md text-headline-md text-on-background">99.9%</span>
                            <span class="font-label-sm text-label-sm text-success">Optimal</span>
                        </div>
                    </div>
                </div>
                
                <button class="mt-6 w-full py-2 px-4 border border-slate-200 rounded-lg text-primary font-label-md text-label-md hover:bg-slate-50 transition-colors">
                    Jalankan Diagnostik
                </button>
            </div>

            <!-- Update Log - Spans 12 cols -->
            <div class="md:col-span-12 bg-surface rounded-card border border-slate-200 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] p-8">
                <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-4">
                    <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined">history</span>
                        Catatan Pembaruan (Changelog)
                    </h3>
                    <button class="text-secondary hover:text-secondary-container font-label-sm text-label-sm transition-colors">Lihat Semua</button>
                </div>
                
                <div class="relative border-l-2 border-slate-200 ml-3 pl-8 py-2 space-y-10">
                    <!-- Log Item 1 -->
                    <div class="relative group">
                        <span class="absolute -left-[41px] top-1 h-5 w-5 rounded-full border-4 border-surface bg-primary group-hover:bg-secondary transition-colors"></span>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 mb-2">
                            <h4 class="font-label-md text-label-md text-on-background text-lg">Versi 1.2.4</h4>
                            <span class="font-label-sm text-label-sm text-outline">15 Oktober 2023</span>
                            <span class="px-2 py-0.5 bg-surface-container-high text-primary font-label-sm text-[10px] rounded uppercase tracking-wider ml-2">Patch</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 font-body-sm text-body-sm text-on-surface-variant">
                            <li>Peningkatan performa query pada modul pencarian kendaraan.</li>
                            <li>Perbaikan bug tampilan pada dashboard mobile admin.</li>
                            <li>Penambahan integrasi notifikasi email untuk transaksi baru.</li>
                        </ul>
                    </div>
                    
                    <!-- Log Item 2 -->
                    <div class="relative group">
                        <span class="absolute -left-[41px] top-1 h-5 w-5 rounded-full border-4 border-surface bg-slate-300 group-hover:bg-primary transition-colors"></span>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 mb-2">
                            <h4 class="font-label-md text-label-md text-on-background text-lg">Versi 1.2.3</h4>
                            <span class="font-label-sm text-label-sm text-outline">28 September 2023</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 font-body-sm text-body-sm text-on-surface-variant">
                            <li>Implementasi fitur riwayat penyewaan lengkap untuk setiap pelanggan.</li>
                            <li>Optimalisasi kompresi gambar saat admin mengunggah foto kendaraan baru.</li>
                        </ul>
                    </div>
                    
                    <!-- Log Item 3 -->
                    <div class="relative group">
                        <span class="absolute -left-[41px] top-1 h-5 w-5 rounded-full border-4 border-surface bg-slate-300 group-hover:bg-primary transition-colors"></span>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 mb-2">
                            <h4 class="font-label-md text-label-md text-on-background text-lg">Versi 1.2.0</h4>
                            <span class="font-label-sm text-label-sm text-outline">01 September 2023</span>
                            <span class="px-2 py-0.5 bg-secondary-fixed text-secondary-container font-label-sm text-[10px] rounded uppercase tracking-wider ml-2">Mayor</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 font-body-sm text-body-sm text-on-surface-variant">
                            <li>Peluncuran modul manajemen armada yang sepenuhnya dirombak.</li>
                            <li>Penambahan sistem peran (Role-Based Access Control) untuk staf admin.</li>
                            <li>Desain ulang antarmuka pengguna mengikuti pedoman gaya korporat baru.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
