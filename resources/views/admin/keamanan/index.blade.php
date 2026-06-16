<x-admin-layout>
    <div x-data="{ reviewModal: false }">
        <div class="mb-8">
            <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Keamanan & Kontrol Akses</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Kelola permintaan reset sandi dan penghapusan akun pengguna.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Reset Password Requests -->
            <div class="lg:col-span-7 bg-surface rounded-[20px] shadow-sm border border-slate-200 p-6 flex flex-col gap-6">
                <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                    <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">key</span>
                        Permintaan Reset Sandi
                    </h3>
                    <span class="bg-surface-container-high text-primary font-label-sm text-label-sm px-3 py-1 rounded-full">3 Menunggu</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 font-label-md text-label-md text-on-surface-variant">
                                <th class="py-3 px-4 font-semibold">Pengguna</th>
                                <th class="py-3 px-4 font-semibold">Tanggal Request</th>
                                <th class="py-3 px-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="font-body-sm text-body-sm">
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors group">
                                <td class="py-4 px-4">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-on-background">Budi Santoso</span>
                                        <span class="text-outline">budi.s@example.com</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-on-surface-variant">24 Okt 2023, 10:30</td>
                                <td class="py-4 px-4 text-right">
                                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-label-sm text-label-sm hover:bg-surface-tint hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 inline-flex items-center gap-1">
                                        Proses <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 0;">arrow_forward</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors group">
                                <td class="py-4 px-4">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-on-background">Siti Rahmawati</span>
                                        <span class="text-outline">siti.r@example.com</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-on-surface-variant">23 Okt 2023, 15:45</td>
                                <td class="py-4 px-4 text-right">
                                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-label-sm text-label-sm hover:bg-surface-tint hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 inline-flex items-center gap-1">
                                        Proses <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 0;">arrow_forward</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors group">
                                <td class="py-4 px-4">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-on-background">Ahmad Wijaya</span>
                                        <span class="text-outline">ahmad.w@example.com</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-on-surface-variant">22 Okt 2023, 09:15</td>
                                <td class="py-4 px-4 text-right">
                                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-label-sm text-label-sm hover:bg-surface-tint hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 inline-flex items-center gap-1">
                                        Proses <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 0;">arrow_forward</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Account Deletion Requests -->
            <div class="lg:col-span-5 bg-surface rounded-[20px] shadow-sm border border-slate-200 p-6 flex flex-col gap-6">
                <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                    <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">person_remove</span>
                        Manajemen Akun
                    </h3>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Berikut adalah daftar pengguna yang mengajukan permohonan penghapusan akun permanen.</p>
                
                <div class="flex flex-col gap-4">
                    <!-- Deletion Item -->
                    <div class="border border-error-container bg-surface-bright rounded-xl p-4 flex flex-col gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-label-md text-label-md font-semibold text-on-background">Dian Sastro</h4>
                                <p class="font-body-sm text-body-sm text-outline">dian.s@example.com</p>
                            </div>
                            <span class="bg-error-container text-on-error-container font-label-sm text-label-sm px-2 py-1 rounded">Kritis</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span class="">Diminta: 20 Okt 2023</span>
                        </div>
                        <div class="pt-2 flex gap-2">
                            <button @click="reviewModal = true" class="flex-1 bg-surface border border-slate-200 text-on-surface-variant font-label-md text-label-md py-2 rounded-lg hover:bg-slate-50 transition-colors">Tinjau</button>
                            <button class="flex-1 bg-error text-white font-label-md text-label-md py-2 rounded-lg hover:bg-on-error-container hover:-translate-y-0.5 hover:shadow-md transition-all">Hapus Akun</button>
                        </div>
                    </div>
                    
                    <!-- Deletion Item -->
                    <div class="border border-slate-200 bg-surface rounded-xl p-4 flex flex-col gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-label-md text-label-md font-semibold text-on-background">Reza Rahadian</h4>
                                <p class="font-body-sm text-body-sm text-outline">reza.r@example.com</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span class="">Diminta: 18 Okt 2023</span>
                        </div>
                        <div class="pt-2 flex gap-2">
                            <button @click="reviewModal = true" class="flex-1 bg-surface border border-slate-200 text-on-surface-variant font-label-md text-label-md py-2 rounded-lg hover:bg-slate-50 transition-colors">Tinjau</button>
                            <button class="flex-1 bg-error text-white font-label-md text-label-md py-2 rounded-lg hover:bg-on-error-container hover:-translate-y-0.5 hover:shadow-md transition-all">Hapus Akun</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- User Review Modal -->
        <div x-show="reviewModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <!-- Backdrop -->
            <div @click="reviewModal = false" x-show="reviewModal" x-transition.opacity class="absolute inset-0 bg-on-background/60 backdrop-blur-sm"></div>
            
            <!-- Modal Container -->
            <div x-show="reviewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-surface w-full max-w-[600px] rounded-2xl shadow-2xl overflow-hidden flex flex-col">
                <!-- Header -->
                <div class="flex items-center justify-between p-6 border-b border-slate-100">
                    <h3 class="font-headline-sm text-headline-sm text-primary">Detail Pengguna</h3>
                    <button @click="reviewModal = false" class="text-outline hover:text-on-background transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <!-- Content -->
                <div class="p-6 overflow-y-auto max-h-[80vh] flex flex-col gap-6">
                    <!-- Profile Section -->
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-4xl">person</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2">
                                <h4 class="font-headline-sm text-headline-sm text-on-background">Dian Sastro</h4>
                                <span class="bg-error-container text-on-error-container font-label-sm text-label-sm px-2 py-0.5 rounded">Kritis</span>
                            </div>
                            <p class="text-outline">dian.s@example.com</p>
                            <p class="text-label-sm text-secondary mt-1">Status: Aktif</p>
                        </div>
                    </div>
                    
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 gap-4 p-4 bg-surface-container-low rounded-xl">
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">Total Pemesanan</p>
                            <p class="font-semibold text-on-background">12 Pesanan</p>
                        </div>
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">Bergabung Sejak</p>
                            <p class="font-semibold text-on-background">15 Jan 2023</p>
                        </div>
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">NIK</p>
                            <p class="font-semibold text-on-background">3271xxxxxxxxxxxx</p>
                        </div>
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">No. Telepon</p>
                            <p class="font-semibold text-on-background">+62 812-xxxx-xxxx</p>
                        </div>
                    </div>
                    
                    <!-- History Table -->
                    <div>
                        <h5 class="font-label-md text-label-md font-bold text-on-background mb-3">Riwayat Pesanan Terakhir</h5>
                        <div class="border border-slate-100 rounded-lg overflow-hidden">
                            <table class="w-full text-left text-body-sm">
                                <thead class="bg-slate-50 text-outline font-label-sm">
                                    <tr>
                                        <th class="py-2 px-3">ID</th>
                                        <th class="py-2 px-3">Kendaraan</th>
                                        <th class="py-2 px-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr>
                                        <td class="py-2 px-3">#ORD-992</td>
                                        <td class="py-2 px-3">Toyota Avanza</td>
                                        <td class="py-2 px-3 text-success">Selesai</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-3">#ORD-841</td>
                                        <td class="py-2 px-3">Honda Brio</td>
                                        <td class="py-2 px-3 text-success">Selesai</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-3">#ORD-720</td>
                                        <td class="py-2 px-3">Mitsubishi Xpander</td>
                                        <td class="py-2 px-3 text-error">Dibatalkan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                    <button @click="reviewModal = false" class="px-6 py-2 border border-slate-200 text-on-surface-variant font-label-md rounded-lg hover:bg-slate-50 transition-colors">Tutup</button>
                    <button class="px-6 py-2 bg-error text-white font-label-md rounded-lg hover:bg-on-error-container transition-all">Hapus Akun</button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
