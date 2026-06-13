<x-app-layout>
    <!-- Info Section -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
            <div class="flex flex-col space-y-stack-lg">
                <div>
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-stack-sm">
                        Misi Kami di AutoRide
                    </h1>
                    <div class="h-1 w-16 bg-secondary-container rounded-full"></div>
                </div>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                    Di AutoRide Rental (dioperasikan oleh Velocity Drive), kami percaya bahwa mobilitas harus transparan, efisien, dan dapat diandalkan. Misi kami adalah memberdayakan perjalanan Anda dengan menyediakan armada kendaraan terawat yang siap pakai, proses pemesanan digital yang mulus tanpa hambatan, dan layanan pelanggan profesional yang mengutamakan ketenangan pikiran Anda di setiap kilometer.
                </p>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                    Baik Anda seorang profesional yang membutuhkan transportasi dinas yang cepat, atau pelancong yang ingin menjelajahi destinasi baru, kami berkomitmen untuk menjadi mitra perjalanan Anda yang paling terpercaya, memberikan pengalaman rental modern dengan standar korporat.
                </p>
            </div>
            
            <!-- Decorative Image / Bento Box Style -->
            <div class="relative w-full aspect-square md:aspect-[4/3] rounded-xl overflow-hidden shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 bg-surface group hover:-translate-y-1 hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300">
                <img alt="Kantor AutoRide modern" class="w-full h-full object-cover" data-alt="A modern, brightly lit corporate office space featuring sleek glass partitions, minimalist white desks, and ergonomic navy blue chairs. The atmosphere is professional, efficient, and trustworthy. Soft natural light streams through large windows, highlighting the clean, modern corporate aesthetic. Subtle orange accents in the decor echo the brand's vibrant energy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjKK1IxBAGSac601p9pYYzN_sfEkIZkLrvvNO9Vup7UEd-5XaU_y0uHQQjOdt8MUfeFFE8kBRcuTLG11o7yDvHIuQHu4tb5c2Yuawcppexf_Z9ieWsZL82Z6-te2ewk6e3CjI43VGNqQTCQduXLQJJ088qNSwdj8IDI34cIpJlH_9XG4yjW-ztr-b_fYSAXCfxGBmtSF2iksmCTy94KCmijjI82yzp36T5R_tkeRc4bAZpJnSPEpbQBLpe-OyoVcc7K03e_kSKhys">
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="bg-slate-50 py-section-gap border-t border-slate-200">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex flex-col items-center">
            <div class="text-center mb-stack-lg">
                <h2 class="font-headline-md text-headline-md text-primary mb-stack-sm">Kunjungi Kantor Kami</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Temukan pusat layanan AutoRide di kota Anda.</p>
            </div>
            
            <!-- Map Container -->
            <div class="w-full max-w-4xl rounded-xl overflow-hidden shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 bg-surface mb-stack-lg aspect-video relative group">
                <!-- Embedded Google Map (Jakarta as placeholder) -->
                <iframe allowfullscreen="" class="absolute inset-0 grayscale contrast-125 opacity-90 group-hover:grayscale-0 transition-all duration-500" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24009855512!2d106.75877864467776!3d-6.229746499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x100c5e82dd4b820!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" style="border:0;" width="100%">
                </iframe>
            </div>
            
            <!-- Action Button -->
            <button class="bg-primary hover:bg-primary-container text-white font-label-md text-label-md py-3 px-6 rounded-lg shadow-sm hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-200 flex items-center space-x-2">
                <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">location_on</span>
                <span class="">Buka Peta Besar</span>
            </button>
        </div>
    </section>
</x-app-layout>
