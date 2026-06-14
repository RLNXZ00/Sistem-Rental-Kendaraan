<x-app-layout>
    <!-- Hero Section -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div class="flex flex-col gap-stack-lg">
            <h1 class="font-headline-xl text-headline-xl text-primary font-bold">Sewa Kendaraan Tanpa Ribet</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                Nikmati perjalanan Anda dengan armada modern dan terawat kami. Dari mobil keluarga yang nyaman hingga motor yang gesit, AutoRide menyediakan solusi mobilitas profesional dan efisien untuk setiap kebutuhan Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-stack-md pt-4">
                <a href="{{ route('kendaraan.index') }}" class="bg-secondary-container text-on-secondary font-label-md text-label-md px-6 py-3 rounded hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-center">
                    Pesan Sekarang
                </a>
                <a href="#koleksi-unggulan" class="border border-primary text-primary font-label-md text-label-md px-6 py-3 rounded hover:-translate-y-1 hover:shadow-sm hover:bg-slate-50 transition-all duration-300 text-center">
                    Lihat Armada
                </a>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow-md bg-slate-100 h-96 relative">
            <img alt="Hero Vehicle" class="w-full h-full object-cover" data-alt="A sleek, modern silver sedan parked elegantly next to a premium touring motorcycle on a clean, brightly lit concrete surface. The scene is bathed in professional, high-key lighting that emphasizes the smooth metallic curves and pristine condition of the vehicles. The background is a minimalist, modern architectural setting in light grey tones, reflecting a clean corporate aesthetic. The overall mood conveys trust, efficiency, and premium mobility, perfectly suited for a professional rental service interface in light mode." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGZEaPP0N43ldBQVCRAfAlgu7OsWqMj_q5T1nSHL1EVzBTIZ46jBqcCz5YvVceuIX87AEWHMypnIN9WEiNLQZlswss4EC8vE6FMdcJDXqoKrHdwXYmHAifwK7B1hsh8ABWUtWt7FJogYPkkn3LOuxRjeAeX6B6Yf2qS07I54apE-e1suXc0EwhgHrL-FCRaifa9jyTeuvBEe0jDJu6zl5lW6YnvQO186T-12Mu08n2t72E-Zvbkt9rOgUdr_y57xQyLWJJtsj8vQ0"/>
        </div>
    </section>

    <!-- Featured Collection (Bento Grid) -->
    <section id="koleksi-unggulan" class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap bg-slate-50 rounded-3xl mb-section-gap scroll-mt-20">
        <div class="flex flex-col gap-stack-sm mb-8">
            <h2 class="font-headline-lg text-headline-lg text-on-background font-bold">Koleksi Unggulan</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Pilihan kendaraan terbaik yang paling sering disewa oleh pelanggan profesional kami.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-auto md:h-[600px]">
            <!-- Large Card (Left) -->
            <div class="md:col-span-7 bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 border border-slate-200 overflow-hidden flex flex-col group cursor-pointer">
                <div class="h-2/3 bg-slate-100 overflow-hidden relative">
                    <div class="absolute top-4 left-4 bg-surface-container-low text-primary px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1 shadow-sm z-10">
                        <span class="material-symbols-outlined text-[16px]">directions_car</span> Mobil
                    </div>
                    <img alt="Premium SUV" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A luxurious, modern dark blue SUV positioned prominently in a brightly lit, pristine studio environment. The vehicle's polished surface reflects a soft, diffused white light, highlighting its sophisticated design lines and robust build. The setting is minimalist, relying on a pure white to light-grey gradient background that keeps the focus entirely on the vehicle. The visual style is highly professional and corporate, emphasizing reliability and premium comfort within a clean light mode UI context." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZPVlYaqwttdwv_hrEJXtrxMY7RxfSS-_73fzhBzyFEg-AU6JpWN-K6ZfquQnlH5M-AxcBbYkV-1_Z_KYprGkz4-ghBfo7OdI37nJzCgnzxcGQrPuighzFVTOxaPdrKNYw_TQekAyQUyRpSE6molb1s90to0voTtTQS6folFN-SvUCXURRIts-xudCMfx8gUoerBVHJHuoDbc_FiBLQ_JivKvFIfuHxIIB072e4gciv3u1oiRc0sxwJF3BYd6HkFaJUbNRw8KTIQ8"/>
                </div>
                <div class="p-6 flex flex-col justify-between flex-grow">
                    <div>
                        <h3 class="font-headline-md text-headline-md font-bold text-on-surface">Toyota Fortuner VRZ</h3>
                        <div class="flex items-center gap-2 mt-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-[18px] text-secondary-container">star</span>
                            <span class="">4.9 (120 Ulasan)</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-4">
                        <div>
                            <span class="font-label-md text-label-md text-on-surface-variant">Mulai dari</span>
                            <div class="font-headline-sm text-headline-sm font-bold text-primary">Rp 800.000 <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">/ hari</span></div>
                        </div>
                        <a href="{{ route('kendaraan.show', 1) }}" class="bg-primary text-on-primary border border-primary px-4 py-2 rounded-lg font-label-md hover:bg-primary-container transition-colors duration-200 flex items-center gap-2">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stacked Cards (Right) -->
            <div class="md:col-span-5 grid grid-rows-2 gap-gutter">
                <!-- Top Small Card -->
                <div class="bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 border border-slate-200 overflow-hidden flex cursor-pointer group">
                    <div class="w-2/5 bg-slate-100 overflow-hidden relative">
                        <img alt="City Car" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A compact, pristine white city car parked on an urban street lined with modern glass buildings during a bright, sunny day. The lighting is natural and clear, casting soft shadows and highlighting the car's practical yet modern design. The environment feels efficient and vibrant, reflecting a professional urban lifestyle. The composition is balanced and clean, fitting seamlessly into a trustworthy, functional light-mode web interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxEJHrhOvce4RametoVf4JlOGYh_KLnQRBrlr6XQQY0UVlM4wnYHRuB5qa3S6uARro4s-_k4tdaYLzDRokdB7sJMaHPN8eRKEauzLJSY7O8xCudQrLxpiLv-raeXWYtWe3LkZQp9Zf6fZdmd-_EU9tjLt9PMrn8WFTPj5GKt_XLw3KJFJe7HKBCv9LSG41dX-NlN_FCpZbqX7QJSdPdAmcHb9kn2HPMZBAEzvOFvmS3rh_Lrol1pwg8iubUt9Yl5RHN8SmRFdt1oA"/>
                    </div>
                    <div class="w-3/5 p-4 flex flex-col justify-center">
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface line-clamp-1">Honda Brio RS</h3>
                        <div class="font-body-sm text-body-sm text-on-surface-variant mt-1">Mobil Compact</div>
                        <div class="font-headline-sm text-headline-sm font-bold text-primary mt-3">Rp 350.000 <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">/ hari</span></div>
                    </div>
                </div>

                <!-- Bottom Small Card -->
                <div class="bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 border border-slate-200 overflow-hidden flex cursor-pointer group">
                    <div class="w-2/5 bg-slate-100 overflow-hidden relative">
                        <div class="absolute top-2 left-2 bg-surface-container-highest text-secondary-container px-2 py-0.5 rounded-full font-label-sm text-[10px] flex items-center gap-1 shadow-sm z-10">
                            <span class="material-symbols-outlined text-[12px]">motorcycle</span> Motor
                        </div>
                        <img alt="Scooter" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A sleek, modern matte grey automatic scooter positioned cleanly against a stark white studio backdrop. The studio lighting is bright, even, and professional, emphasizing the scooter's functional design and flawless finish. The aesthetic is strictly minimalist and corporate, removing any distracting background elements to focus purely on the vehicle as a reliable service product. The overall tone is crisp, efficient, and perfectly suited for a trustworthy rental platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcFQks4ZOmhE9VhyI5HZZr8kDUiuJRiJ_suBdEFS4IzdcnY_b272uRAVVCNz1Zmy_hyDXceWznU3S2FONlVPtAO6FUf04KHkUjNbcAJKzL4RvIcoNYs2JNT0WZfA-q4ECPUUj719c7pKcttlOSoDtfN2BtKHnvfCaVLceWmouQWyx7Z-DlVpFRbxqQJsuySB_6RtIpPJRWp29Ce67k46lhJoNk_QLM27b6MpFKRy6m814PmCUeD0u-xULNW_Vh41c7X1fPZ1zvp9k"/>
                    </div>
                    <div class="w-3/5 p-4 flex flex-col justify-center">
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface line-clamp-1">Yamaha NMAX</h3>
                        <div class="font-body-sm text-body-sm text-on-surface-variant mt-1">Skuter Premium</div>
                        <div class="font-headline-sm text-headline-sm font-bold text-primary mt-3">Rp 150.000 <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">/ hari</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feedback Section -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap flex flex-col gap-section-gap">
        <!-- Input Card -->
        <div class="bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 p-8 max-w-2xl mx-auto w-full text-center">
            <div class="w-16 h-16 bg-surface-container-low text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-3xl">chat_bubble</span>
            </div>
            <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-2">Punya Masukan?</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-6">Bantu kami meningkatkan layanan profesional AutoRide.</p>
            <form action="{{ route('umpan-balik.store') }}" method="POST" class="flex flex-col gap-4 text-left">
                @csrf
                <input type="hidden" name="kendaraan_id" value="1"> <!-- Dummy ID for static slice -->
                <input type="hidden" name="rating" value="5"> <!-- Dummy rating for static slice -->
                <div class="flex flex-col gap-1">
                    <label class="font-label-sm text-label-sm text-on-surface">Pesan Anda</label>
                    <textarea name="komentar" class="rounded-lg border-slate-200 bg-surface focus:border-primary focus:ring focus:ring-primary/20 transition-all text-body-md font-body-md p-3 min-h-[100px]" placeholder="Bagikan pengalaman Anda..." required></textarea>
                </div>
                <button type="submit" class="bg-secondary-container text-on-secondary font-label-md text-label-md py-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition-all duration-300 w-full md:w-auto self-end px-8">
                    Kirim Masukan
                </button>
            </form>
        </div>

        <!-- Testimonials Grid -->
        <div>
            <h3 class="font-headline-sm text-headline-sm font-bold text-center mb-8 text-on-surface">Apa Kata Pelanggan Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <div class="flex gap-1 text-secondary-container mb-3">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 italic">"Proses sewa sangat cepat dan tidak ribet. Mobil dalam kondisi prima dan bersih. Sangat direkomendasikan untuk perjalanan bisnis."</p>
                    <div class="font-label-md text-label-md text-primary">Budi Santoso</div>
                </div>

                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <div class="flex gap-1 text-secondary-container mb-3">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 italic">"Pelayanan pelanggan luar biasa. Aplikasi mudah digunakan untuk booking dadakan. Motornya irit dan terawat."</p>
                    <div class="font-label-md text-label-md text-primary">Siti Rahma</div>
                </div>

                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <div class="flex gap-1 text-secondary-container mb-3">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm">star</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 italic">"Pilihan kendaraan beragam. Harga sangat transparan tanpa biaya tersembunyi. Solusi tepat untuk liburan keluarga."</p>
                    <div class="font-label-md text-label-md text-primary">Andi Pratama</div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
