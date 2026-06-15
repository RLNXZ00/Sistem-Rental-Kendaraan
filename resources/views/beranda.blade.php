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
            @if($kendaraanUnggulan->count() > 0)
            <!-- Large Card (Left) -->
            <div class="md:col-span-7 bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 border border-slate-200 overflow-hidden flex flex-col group cursor-pointer" onclick="window.location='{{ route('kendaraan.show', $kendaraanUnggulan[0]->id) }}'">
                <div class="h-2/3 bg-slate-100 overflow-hidden relative">
                    <div class="absolute top-4 left-4 bg-surface-container-low text-primary px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1 shadow-sm z-10">
                        <span class="material-symbols-outlined text-[16px]">{{ $kendaraanUnggulan[0]->tipe == 'Motor' ? 'motorcycle' : 'directions_car' }}</span> {{ $kendaraanUnggulan[0]->tipe }}
                    </div>
                    <img alt="{{ $kendaraanUnggulan[0]->nama_kendaraan }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $kendaraanUnggulan[0]->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZPVlYaqwttdwv_hrEJXtrxMY7RxfSS-_73fzhBzyFEg-AU6JpWN-K6ZfquQnlH5M-AxcBbYkV-1_Z_KYprGkz4-ghBfo7OdI37nJzCgnzxcGQrPuighzFVTOxaPdrKNYw_TQekAyQUyRpSE6molb1s90to0voTtTQS6folFN-SvUCXURRIts-xudCMfx8gUoerBVHJHuoDbc_FiBLQ_JivKvFIfuHxIIB072e4gciv3u1oiRc0sxwJF3BYd6HkFaJUbNRw8KTIQ8' }}"/>
                </div>
                <div class="p-6 flex flex-col justify-between flex-grow">
                    <div>
                        <h3 class="font-headline-md text-headline-md font-bold text-on-surface">{{ $kendaraanUnggulan[0]->nama_kendaraan }}</h3>
                        <div class="flex items-center gap-2 mt-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-[18px] text-secondary-container" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="">{{ number_format($kendaraanUnggulan[0]->rating, 1) }} ({{ $kendaraanUnggulan[0]->umpan_baliks_count ?? 0 }} Ulasan)</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-4">
                        <div>
                            <span class="font-label-md text-label-md text-on-surface-variant">Mulai dari</span>
                            <div class="font-headline-sm text-headline-sm font-bold text-primary">Rp {{ number_format($kendaraanUnggulan[0]->harga_sewa, 0, ',', '.') }} <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">/ hari</span></div>
                        </div>
                        <a href="{{ route('kendaraan.show', $kendaraanUnggulan[0]->id) }}" class="bg-primary text-on-primary border border-primary px-4 py-2 rounded-lg font-label-md hover:bg-primary-container transition-colors duration-200 flex items-center gap-2">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Stacked Cards (Right) -->
            <div class="md:col-span-5 grid grid-rows-2 gap-gutter">
                @foreach($kendaraanUnggulan->skip(1)->take(2) as $kendaraan)
                <!-- Small Card -->
                <div class="bg-surface rounded-[20px] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 border border-slate-200 overflow-hidden flex cursor-pointer group" onclick="window.location='{{ route('kendaraan.show', $kendaraan->id) }}'">
                    <div class="w-2/5 bg-slate-100 overflow-hidden relative">
                        <div class="absolute top-2 left-2 bg-surface-container-highest text-secondary-container px-2 py-0.5 rounded-full font-label-sm text-[10px] flex items-center gap-1 shadow-sm z-10">
                            <span class="material-symbols-outlined text-[12px]">{{ $kendaraan->tipe == 'Motor' ? 'motorcycle' : 'directions_car' }}</span> {{ $kendaraan->tipe }}
                        </div>
                        <img alt="{{ $kendaraan->nama_kendaraan }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxEJHrhOvce4RametoVf4JlOGYh_KLnQRBrlr6XQQY0UVlM4wnYHRuB5qa3S6uARro4s-_k4tdaYLzDRokdB7sJMaHPN8eRKEauzLJSY7O8xCudQrLxpiLv-raeXWYtWe3LkZQp9Zf6fZdmd-_EU9tjLt9PMrn8WFTPj5GKt_XLw3KJFJe7HKBCv9LSG41dX-NlN_FCpZbqX7QJSdPdAmcHb9kn2HPMZBAEzvOFvmS3rh_Lrol1pwg8iubUt9Yl5RHN8SmRFdt1oA' }}"/>
                    </div>
                    <div class="w-3/5 p-4 flex flex-col justify-center relative">
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface line-clamp-1 pr-8">{{ $kendaraan->nama_kendaraan }}</h3>
                        <div class="font-body-sm text-body-sm text-on-surface-variant mt-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-secondary-container" style="font-variation-settings: 'FILL' 1;">star</span>
                            {{ number_format($kendaraan->rating, 1) }}
                        </div>
                        <div class="font-headline-sm text-headline-sm font-bold text-primary mt-3">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }} <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">/ hari</span></div>
                        
                        <!-- Arrow Button -->
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center bg-slate-100 text-primary rounded-full group-hover:bg-primary group-hover:text-white transition-colors shadow-sm">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <div class="flex flex-col gap-1 mb-4">
                    <label class="font-label-sm text-label-sm text-on-surface">Pilih Kendaraan yang Pernah Disewa</label>
                    <select name="kendaraan_id" class="rounded-lg border-slate-200 bg-surface focus:border-primary focus:ring focus:ring-primary/20 transition-all text-body-md font-body-md p-3" required>
                        @auth
                            @php
                                $rentedVehicles = \App\Models\Pemesanan::where('user_id', auth()->id())
                                    ->where('status', 'Selesai')
                                    ->with('kendaraan')
                                    ->get()
                                    ->pluck('kendaraan')
                                    ->unique('id');
                            @endphp
                            @forelse($rentedVehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->nama_kendaraan }}</option>
                            @empty
                                <option value="" disabled selected>Belum ada riwayat sewa</option>
                            @endforelse
                        @else
                            <option value="" disabled selected>Silakan login terlebih dahulu</option>
                        @endauth
                    </select>
                </div>
                
                <div class="flex flex-col gap-1 mb-4">
                    <label class="font-label-sm text-label-sm text-on-surface">Rating Kepuasan</label>
                    <div class="flex gap-2 text-slate-300" x-data="{ rating: 5, hoverRating: 0 }">
                        <input type="hidden" name="rating" x-model="rating">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" 
                                @click="rating = {{ $i }}" 
                                @mouseenter="hoverRating = {{ $i }}" 
                                @mouseleave="hoverRating = 0"
                                class="focus:outline-none transition-all"
                                :class="({{ $i }} <= (hoverRating || rating)) ? 'text-secondary-container' : 'text-slate-300'">
                                <span class="material-symbols-outlined text-4xl" :style="({{ $i }} <= (hoverRating || rating)) ? 'font-variation-settings: \'FILL\' 1;' : 'font-variation-settings: \'FILL\' 0;'">star</span>
                            </button>
                        @endfor
                    </div>
                </div>
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
            @if($umpanBalik->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @foreach($umpanBalik->take(3) as $feedback)
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <div class="flex gap-1 text-secondary-container mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' {{ $i <= $feedback->rating ? '1' : '0' }};">star</span>
                        @endfor
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 italic line-clamp-4">"{{ $feedback->komentar }}"</p>
                    <div class="font-label-md text-label-md text-primary">{{ $feedback->user->name ?? 'Anonim' }}</div>
                    <div class="text-xs text-slate-400 mt-1">{{ $feedback->kendaraan->nama_kendaraan ?? '' }}</div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-on-surface-variant font-body-md text-body-md py-8">Belum ada ulasan dari pelanggan.</p>
            @endif
        </div>
    </section>
</x-app-layout>
