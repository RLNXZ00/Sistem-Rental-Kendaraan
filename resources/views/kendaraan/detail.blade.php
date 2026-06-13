<x-app-layout>
    <!-- Main Content Canvas -->
    <main class="flex-grow max-w-container-max mx-auto w-full px-margin-mobile md:px-margin-desktop py-stack-lg md:py-section-gap">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm mb-stack-lg">
            <a class="hover:text-primary transition-colors" href="{{ route('beranda') }}">Beranda</a>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('kendaraan.index') }}">Daftar Kendaraan</a>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-on-surface font-medium">Toyota Fortuner VRZ</span>
        </nav>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter lg:gap-8 items-start">
            <!-- Left Column: Image Gallery (Bento Style) -->
            <div class="lg:col-span-7 flex flex-col gap-stack-sm">
                <!-- Main Hero Image -->
                <div class="bg-surface rounded-xl overflow-hidden shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] aspect-[4/3] md:aspect-[16/9] relative group">
                    <img alt="Toyota Fortuner VRZ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" data-alt="A sleek, modern Toyota Fortuner VRZ parked on a scenic coastal road during golden hour. The warm, bright sunlight reflects off its pristine white exterior, highlighting its bold, aerodynamic curves. The scene evokes a sense of premium travel and adventure, perfectly suited for a professional vehicle rental service. The overall aesthetic is bright, clean, and aspirational, matching a modern light-mode interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuArtp7esFaSE1SqzMnlRZkJPejDBKmPXKOVFt1oNL4_pebemdviVNhYTGz4hnMJKWWnMf7oZ_j-xZ9mbLB9zH4RnKHazqRWVkMY1ogmtKjYcv5PFlpsMHeiIkbRJwCaXotiq17JpW_o1MMpP3kPs4vUEJ746tzrFUuKKMRk_aXJ-nOOqjRbJTQMswBl48d2w36ZOlbJtt5eW4WutJIhbAncRsZn0f-4eHU57LKUQ_MIS5RcX_m7QeQNu1iu8pHEZgKJzXyoI7Gs3Ps">
                    <!-- Floating Badge -->
                    <div class="absolute top-4 left-4 bg-surface-container-high text-on-surface px-3 py-1 rounded-full font-label-sm text-label-sm shadow-sm flex items-center gap-1 backdrop-blur-md bg-opacity-80">
                        <span class="material-symbols-outlined text-[16px] text-success" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Tersedia Hari Ini
                    </div>
                </div>
                <!-- Secondary Images Grid (Bento) -->
                <div class="grid grid-cols-3 gap-stack-sm">
                    <div class="bg-surface rounded-xl overflow-hidden aspect-[4/3] shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                        <img class="w-full h-full object-cover" data-alt="A close-up view of the premium leather interior of a modern SUV. The steering wheel and dashboard are visible, bathed in soft, natural daylight. The image conveys luxury, comfort, and a professional aesthetic suitable for a high-end rental service in a bright, clean design system." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxCJGPyHuA126xqbVLYiWZPkPqWHB04OvmvvgEqeaQTtTCCHFMskQB-dxRdEKtVtK5Mm02Fr_46TKsjZ6YijRUfHJqKvepHTrY91qHMBUjSOmMIZdeiin_eC66eIsvjFUsb0gUJnhSMgPfAZzfvmRwQRoZo9nBNLA6mjTh96U78JxAWecGnpTZ3MKcuxKIfFWa5R91Sr0vqQXVTkrlB9opMJ4aJ1Euuukuitpaw8uu8cJ4En2h1j3qi045TQcyeS-w_bJusLfJHn4">
                    </div>
                    <div class="bg-surface rounded-xl overflow-hidden aspect-[4/3] shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                        <img class="w-full h-full object-cover" data-alt="A detailed shot of the sophisticated center console and infotainment system of a modern vehicle. The screen is glowing subtly in a well-lit cabin. The overall tone is technological, efficient, and clean, aligning perfectly with a modern corporate UI design style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCN4px-VqdePjUExFInStLxyZmzrOc7uP14Utm8DxaTvTC-N0Zkn1EndGwiqQFeCCdpAez2j48wcc31ZUo46CJZnn1o3jeD1GpRLDO4XHXjb_5wpJjrtfMjbJ0qv45IqMK0_4FvdVOcsX_LM0_TtoS_5SnKQ28DJOre7LYDlgYRMoN1xR1A_r1TXpkS6xLTbXNw9LMnFyS6tV7xfgOqxxas1lPHSWUK71SDaoRiGd8ou2B_n6j5O9ALFv6Y7xfAK4SOkJ1ASo50W8A">
                    </div>
                    <div class="bg-surface rounded-xl overflow-hidden aspect-[4/3] shadow-sm hover:shadow-md transition-shadow cursor-pointer relative">
                        <img class="w-full h-full object-cover" data-alt="A view showing the spacious rear seating and ample legroom of a premium SUV. Soft light filters through the windows, emphasizing the comfortable, clean upholstery. The image perfectly supports a trustworthy and professional vehicle rental narrative within a bright, spacious layout." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkp-XoqgrCH9f_ntc2RD0xAIyzL7ZVbgDsJzT8qPrBnYzBSW4B0FgG9kDYnB5bkszs9Ujdh3-IY4yO0hk3gnYxguNtlgCF9WhZzOB_gJg9OU4ERe51Vd3JYgyjeCzTrzBRFSU2Z78wUzsVwk_XBQHb7HwTBz3GpvvvMzrF23D8kLPelTW882Gzc5G7WKj4kGdV7jgwf5QbO1HpjlrpoqX7Zme-FMaSSD3dGzolsStf59ZqtrFYsK1CFukUb_OE-BbW0kwikRRW6Ys">
                        <div class="absolute inset-0 bg-primary/40 flex items-center justify-center">
                            <span class="text-white font-label-md text-label-md flex items-center gap-1">
                                <span class="material-symbols-outlined">photo_library</span>
                                Lihat Semua
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Vehicle Details -->
            <div class="lg:col-span-5 flex flex-col">
                <!-- Title & Header Area -->
                <div class="bg-surface rounded-xl p-stack-md md:p-stack-lg shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 mb-stack-lg flex flex-col gap-stack-md relative overflow-hidden">
                    <!-- Decorative Background Element -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/5 rounded-full blur-2xl pointer-events-none"></div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-surface-container text-primary-container px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-wider">SUV Premium</span>
                            <!-- Rating -->
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-secondary-container text-lg" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-label-md text-label-md text-on-surface">4.9</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant">(120 Ulasan)</span>
                            </div>
                        </div>
                        <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">Toyota Fortuner VRZ</h1>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Nikmati perjalanan Anda dengan kenyamanan maksimal dan performa tangguh. Fortuner VRZ menawarkan ruang kabin yang luas, teknologi hiburan terkini, dan fitur keselamatan premium untuk keluarga atau perjalanan bisnis Anda.
                    </p>
                    <!-- Price Block -->
                    <div class="mt-stack-sm pt-stack-sm border-t border-slate-200">
                        <div class="text-on-surface-variant font-label-sm text-label-sm mb-1">Mulai dari</div>
                        <div class="flex items-baseline gap-2">
                            <span class="font-headline-md text-headline-md text-primary">Rp 850.000</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">/ hari</span>
                        </div>
                    </div>
                </div>

                <!-- Specifications Bento Grid -->
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-stack-sm">Spesifikasi Utama</h3>
                <div class="grid grid-cols-2 gap-stack-sm mb-stack-lg">
                    <div class="bg-surface rounded-xl p-4 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant">Kapasitas</div>
                            <div class="font-label-md text-label-md text-on-surface">7 Penumpang</div>
                        </div>
                    </div>
                    <div class="bg-surface rounded-xl p-4 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">settings</span>
                        </div>
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant">Transmisi</div>
                            <div class="font-label-md text-label-md text-on-surface">Otomatis</div>
                        </div>
                    </div>
                    <div class="bg-surface rounded-xl p-4 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">local_gas_station</span>
                        </div>
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant">Bahan Bakar</div>
                            <div class="font-label-md text-label-md text-on-surface">Diesel</div>
                        </div>
                    </div>
                    <div class="bg-surface rounded-xl p-4 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">work</span>
                        </div>
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant">Bagasi</div>
                            <div class="font-label-md text-label-md text-on-surface">4 Koper</div>
                        </div>
                    </div>
                </div>

                <!-- Sticky CTA Block (Mobile & Desktop) -->
                <div class="bg-surface rounded-xl p-stack-md shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] border border-slate-200 sticky top-24 z-40">
                    <div class="flex items-center gap-2 mb-4 text-sm text-on-surface-variant">
                        <span class="material-symbols-outlined text-success text-[18px]">verified_user</span>
                        <span class="">Termasuk asuransi dasar & pajak</span>
                    </div>
                    <button class="w-full bg-[#F97316] hover:bg-[#ea580c] text-white font-label-md text-label-md py-4 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:-translate-y-1 shadow-md hover:shadow-lg">
                        <span class="material-symbols-outlined">calendar_month</span>
                        Pesan Sekarang
                    </button>
                    <button class="w-full mt-stack-sm bg-transparent border border-primary text-primary hover:bg-surface-container font-label-md text-label-md py-3 rounded-lg transition-colors duration-200">
                        Tanya Ketersediaan (WhatsApp)
                    </button>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
