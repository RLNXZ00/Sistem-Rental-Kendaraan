<x-app-layout>
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg w-full">
        
        @include('profile.partials.header')

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            
            @include('profile.partials.sidebar')

            <!-- Main Panel: Personal Information -->
            <div class="lg:col-span-8">
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-primary">Notifikasi</h2>
                            <p class="text-body-md text-on-surface-variant">Kelola dan pantau pemberitahuan aktivitas akun Anda.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="material-symbols-outlined text-primary-container text-4xl opacity-20">notifications</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <!-- Rental Ending -->
                        <div class="p-4 bg-surface-bright rounded-xl border border-slate-100 hover:border-primary-container transition-colors">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-surface-container-low rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-primary-container">info</span>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex justify-between items-start">
                                        <span class="font-label-md text-label-md text-primary-container">Sewa Berakhir</span>
                                        <span class="text-[10px] text-on-surface-variant">Baru saja</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Masa sewa Toyota Camry Anda telah berakhir. Silakan lakukan pengembalian atau perpanjangan.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Thank You -->
                        <div class="p-4 bg-surface-bright rounded-xl border border-slate-100 hover:border-primary-container transition-colors">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-success/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-success">check_circle</span>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex justify-between items-start">
                                        <span class="font-label-md text-label-md text-primary-container">Terima Kasih</span>
                                        <span class="text-[10px] text-on-surface-variant">2 jam yang lalu</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Terima kasih telah mempercayai layanan AutoRide untuk perjalanan Anda. Kami tunggu pesanan berikutnya!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Overdue Warning -->
                        <div class="p-4 bg-surface-bright rounded-xl border border-slate-100 hover:border-primary-container transition-colors">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-secondary-container/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-secondary-container">warning</span>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex justify-between items-start">
                                        <span class="font-label-md text-label-md text-secondary-container">Peringatan Denda</span>
                                        <span class="text-[10px] text-on-surface-variant">Kemarin</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Kendaraan Mitsubishi Pajero belum dikembalikan. Anda dikenakan denda keterlambatan sesuai ketentuan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center">
                        <button class="text-label-md text-primary hover:underline">Muat Notifikasi Lainnya</button>
                    </div>
                </div>

                <!-- Recent Bookings Teaser -->
                <div class="mt-gutter bg-surface rounded-2xl p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-headline-sm text-headline-sm text-primary">Riwayat Transaksi Terakhir</h3>
                        <a class="text-secondary-container font-label-md hover:underline" href="{{ route('pemesanan.riwayat') }}">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <!-- Item 1 -->
                        <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-50 bg-surface-bright hover:border-primary-container transition-colors">
                            <div class="w-16 h-12 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                <img alt="Vehicle" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvxgmiOu6n1O75s9c_Vv6suPPuQ06OUYBSZQL2y5expqIfofuZq4qhnYHqzfhOzLK-EaNLm6uRQ8SSFhRyQ8KG9TldzLoFw6Qfd3aPbAtMSQXrx4QuWdavix_vek8SD8HCLDx6XfeZfnCPSQUKxq70P6ns5NUCUENDE-Ko7ItWCZGEhn58l3H5TEEFWTIq4qHDnCDNjnTCN_rJPfMm7xYlUGvY-EY-picJo_dhmu6_M1ICqU_LFCFGPZcRAm3qi2181mujGmJzJPQ" class="w-full h-full object-cover"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-label-md text-on-surface truncate">Toyota Fortuner GR Sport</h4>
                                <p class="text-body-sm text-on-surface-variant">12 Jan - 15 Jan 2024</p>
                            </div>
                            <div class="text-right">
                                <span class="block font-bold text-primary">Rp 2.400.000</span>
                                <span class="text-[10px] font-bold text-success uppercase">Selesai</span>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-50 bg-surface-bright hover:border-primary-container transition-colors opacity-80">
                            <div class="w-16 h-12 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                <img alt="Motorbike" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDW4HP-zJKb1Hf2Ig1dF1v7lgBiyjjflO-8xCpAP79tUYESLGtKGJ7W9su_o6WqkW8E4QTO08FNaVppIoPYiHLVBemkdh6UzVq6oXyiVwYADrzNJuYBfvk2QM2h6WhBYBz_X2s__8gTsWUwnOHoaZ9Xj0mIPGaNxU1P659kwC5I7hRMwoA2SDE8M1ySl554leHQICSET4Oheta2cZEXLmsF4ltiubqyMSfNiBcmWD7ErVEMqDdM2fN6jRwTr4e-t8Ko2DSllLNFU3o" class="w-full h-full object-cover"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-label-md text-on-surface truncate">Honda Africa Twin</h4>
                                <p class="text-body-sm text-on-surface-variant">05 Jan - 07 Jan 2024</p>
                            </div>
                            <div class="text-right">
                                <span class="block font-bold text-primary">Rp 1.100.000</span>
                                <span class="text-[10px] font-bold text-on-surface-variant uppercase">Dibatalkan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
