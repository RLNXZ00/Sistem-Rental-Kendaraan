<x-app-layout>
    <!-- Main Content -->
    <div class="flex-grow max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            
            <!-- Left Sidebar (Filters & Top Rated) -->
            <aside class="lg:col-span-3 flex flex-col gap-stack-lg">
                <!-- Filter Section -->
                <div class="bg-surface rounded-xl p-stack-md border border-slate-200 shadow-sm flex flex-col gap-stack-md">
                    <h2 class="font-headline-sm text-headline-sm text-primary">Kategori</h2>
                    <form action="{{ route('kendaraan.index') }}" method="GET" id="filterForm">
                        <input type="hidden" name="tipe" id="tipeInput" value="{{ $tipe }}">
                        <div class="flex gap-stack-sm">
                            <button type="button" onclick="document.getElementById('tipeInput').value='Mobil'; document.getElementById('filterForm').submit();" class="flex-1 rounded-full border border-primary py-2 font-label-md text-label-md text-center transition-colors {{ $tipe === 'Mobil' ? 'bg-primary text-on-primary' : 'text-primary hover:bg-primary hover:text-on-primary' }}">Mobil</button>
                            <button type="button" onclick="document.getElementById('tipeInput').value='Motor'; document.getElementById('filterForm').submit();" class="flex-1 rounded-full border border-primary py-2 font-label-md text-label-md text-center transition-colors {{ $tipe === 'Motor' ? 'bg-primary text-on-primary' : 'text-primary hover:bg-primary hover:text-on-primary' }}">Motor</button>
                        </div>
                        
                        <div class="border-t border-slate-200 pt-stack-md mt-stack-sm flex flex-col gap-stack-sm">
                            @if($tipe === 'Mobil')
                                <h3 class="font-label-md text-label-md text-on-surface-variant">Kapasitas Penumpang (Seats)</h3>
                                <div class="flex flex-wrap gap-stack-sm">
                                    @foreach([2, 4, 6, 7] as $seat)
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="checkbox" name="seats[]" value="{{ $seat }}" class="rounded border-slate-300 text-primary focus:ring-primary h-4 w-4" onchange="document.getElementById('filterForm').submit();" {{ (is_array(request('seats')) && in_array($seat, request('seats'))) ? 'checked' : '' }}>
                                        <span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">{{ $seat }} Seats</span>
                                    </label>
                                    @endforeach
                                </div>
                            @elseif($tipe === 'Motor')
                                <h3 class="font-label-md text-label-md text-on-surface-variant">Kapasitas Mesin (CC)</h3>
                                <div class="flex flex-wrap gap-stack-sm">
                                    @foreach([125, 150, 250] as $cc)
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="checkbox" name="cc[]" value="{{ $cc }}" class="rounded border-slate-300 text-primary focus:ring-primary h-4 w-4" onchange="document.getElementById('filterForm').submit();" {{ (is_array(request('cc')) && in_array($cc, request('cc'))) ? 'checked' : '' }}>
                                        <span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">{{ $cc }} CC</span>
                                    </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Rating Sidebar -->
                <div class="bg-surface rounded-xl p-stack-md border border-slate-200 shadow-sm flex flex-col gap-stack-md" x-data="{ limit: 5 }">
                    <h2 class="font-headline-sm text-headline-sm text-primary">Rating Tertinggi</h2>
                    <div class="flex flex-col gap-stack-sm">
                        @foreach($topRated as $index => $top)
                        <a href="{{ route('kendaraan.show', $top->id) }}" x-show="{{ $index }} < limit" x-transition class="flex items-center gap-stack-sm p-2 hover:bg-slate-50 rounded-lg cursor-pointer transition-colors">
                            <div class="w-12 h-12 rounded-lg bg-slate-200 overflow-hidden flex-shrink-0">
                                <img src="{{ $top->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAc3-_XnM82PvN0CmdsdoMoS85Y3gBULHn82FilfGgKQcRALpkEPLm4ODVC13gW31c0nFjY0rBxJDs3sf-cD5dNEYFVu1ex-U6uAwV1DoDsqvKunosBp36bw1cfjhea5Si8J7ZbHk5HwUGWDkzHBR7pLJPxWL56s4RPcTaQhiuKQF3WIeVBkOFkyEeLV11eIPGdRVFKhg-NWKKnF92S70ltDNqOYaYBp8y0nkqyImcRCrF0Fk19pVNcCU0ERG9pqzdHmTrXDwB8LGY' }}" alt="{{ $top->nama_kendaraan }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col flex-grow">
                                <span class="font-label-md text-label-md text-on-surface truncate">{{ $top->nama_kendaraan }}</span>
                                <div class="flex items-center text-secondary-container">
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; font-size: 14px;">star</span>
                                    <span class="font-label-sm text-label-sm ml-1 text-on-surface-variant">{{ number_format($top->rating, 1) }}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @if($topRated->count() > 5)
                        <button @click="limit += 5" x-show="limit < {{ $topRated->count() }}" class="text-primary font-label-md text-label-md mt-2 hover:text-secondary-container transition-colors text-center w-full">Muat Lebih Banyak</button>
                    @endif
                </div>
            </aside>

            <!-- Catalog Grid -->
            <main class="lg:col-span-9 flex flex-col gap-stack-lg">
                <div class="flex justify-between items-end border-b border-slate-200 pb-stack-sm">
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary">Katalog Kendaraan</h1>
                    <span class="font-body-sm text-body-sm text-on-surface-variant hidden sm:block">Menampilkan {{ $kendaraans->count() }} kendaraan</span>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
                    @forelse($kendaraans as $kendaraan)
                    <div class="bg-surface rounded-xl border border-slate-200 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-[0_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 flex flex-col overflow-hidden group">
                        <div class="aspect-video w-full bg-slate-100 relative overflow-hidden">
                            <img src="{{ $kendaraan->gambar_utama ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuBDcvLSYJJkALKIQ-cJMOtZzxuInVk4XJt-7G7zVXIjmxE-ePUvbsVd-4LNvPc4P1T4RTvlcK_BkWQZJW6ZbOiOxrfcJpQz7KDrueO-VjkhZwvHqu34OWK45MoW5lAckYYlpxlFo2x8vQMG0JTm738erimGl8jeiYNCr8QxiJ_DzUDGkK5HhjimpFENmQots5iqBaqUS4JQYVpTXUk6kxaTP1BLR8-dOB9bxxhsyxyGCavinQUxEzSfgumbRKapGFRo7pXkIHP9TPo' }}" alt="{{ $kendaraan->nama_kendaraan }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-2 left-2 bg-inverse-on-surface text-primary font-label-sm text-label-sm px-2 py-1 rounded-full shadow-sm">{{ $kendaraan->tipe }}</div>
                        </div>
                        <div class="p-stack-md flex flex-col flex-grow gap-stack-sm">
                            <div class="flex justify-between items-start">
                                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $kendaraan->nama_kendaraan }}</h3>
                                <div class="flex items-center text-secondary-container bg-secondary-fixed/30 px-2 py-0.5 rounded-full">
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; font-size: 16px;">star</span>
                                    <span class="font-label-sm text-label-sm ml-1 text-on-surface">{{ number_format($kendaraan->rating, 1) }}</span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-y-2 mt-auto">
                                @if($kendaraan->tipe === 'Mobil' && isset($kendaraan->spesifikasi['seats']))
                                    <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">airline_seat_recline_normal</span> {{ $kendaraan->spesifikasi['seats'] }} Seats</span>
                                @elseif($kendaraan->tipe === 'Motor' && isset($kendaraan->spesifikasi['cc']))
                                    <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">two_wheeler</span> {{ $kendaraan->spesifikasi['cc'] }} CC</span>
                                @endif
                                
                                <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">settings_input_component</span> {{ $kendaraan->spesifikasi['transmisi'] ?? 'Otomatis' }}</span>
                                <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">local_gas_station</span> {{ $kendaraan->spesifikasi['bahan_bakar'] ?? 'Bensin' }}</span>
                                
                                @if($kendaraan->tipe === 'Mobil')
                                    <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">luggage</span> {{ $kendaraan->spesifikasi['bagasi'] ?? 'Standard' }}</span>
                                @elseif($kendaraan->tipe === 'Motor')
                                    <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined" style="font-size: 16px;">sports_motorsports</span> {{ $kendaraan->spesifikasi['bagasi'] ?? '1 Helm' }}</span>
                                @endif
                            </div>
                            
                            <div class="flex items-end justify-between mt-2">
                                <div class="flex flex-col">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant">Mulai dari</span>
                                    <span class="font-headline-md text-headline-md text-primary">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/hari</span></span>
                                </div>
                            </div>
                            
                            <a href="{{ route('kendaraan.show', $kendaraan->id) }}" class="mt-stack-sm w-full bg-secondary-container text-on-primary font-label-md text-label-md py-3 rounded-lg hover:-translate-y-1 shadow-sm hover:shadow-md transition-all duration-200 text-center inline-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center text-on-surface-variant">
                        <p>Tidak ada kendaraan yang ditemukan sesuai filter.</p>
                    </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
