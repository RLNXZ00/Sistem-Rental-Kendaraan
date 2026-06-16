@extends('layouts.admin')

@section('title', 'AutoRide Admin Dashboard Overview')

@section('content')
<div class="max-w-container-max mx-auto space-y-12 pb-section-gap">
        <div class="flex justify-between items-end mb-stack-lg">
            <div>
                <h1 class="font-headline-lg text-headline-lg text-primary">Dashboard Overview</h1>
                <p class="text-body-md text-on-surface-variant mt-1">Monitor key metrics and recent activity across the AutoRide fleet.</p>
            </div>
            <button class="hidden md:flex bg-secondary-container text-on-tertiary px-6 py-2 rounded-lg font-label-md text-label-md hover:bg-secondary transition-all hover:-translate-y-1 shadow-sm hover:shadow-md items-center gap-2">
                <span class="material-symbols-outlined text-sm">download</span>
                Generate Report
            </button>
        </div>

        <!-- Section 1: Statistics Cards -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <div class="bg-surface rounded-xl p-stack-lg border border-slate-200 shadow-sm card-hover transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-label-md font-label-md text-on-surface-variant mb-2">Total Pengguna</p>
                        <h2 class="font-headline-lg text-headline-lg text-on-background">{{ number_format($totalPengguna) }}</h2>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary-container">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-success text-body-sm font-body-sm">
                    <span class="material-symbols-outlined text-[16px]">trending_up</span>
                    <span class="">+12% from last month</span>
                </div>
            </div>
            <div class="bg-surface rounded-xl p-stack-lg border border-slate-200 shadow-sm card-hover transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-label-md font-label-md text-on-surface-variant mb-2">Total Pemesanan</p>
                        <h2 class="font-headline-lg text-headline-lg text-on-background">{{ number_format($totalPemesanan) }}</h2>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-secondary-container/10 flex items-center justify-center text-secondary-container">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">car_rental</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-success text-body-sm font-body-sm">
                    <span class="material-symbols-outlined text-[16px]">trending_up</span>
                    <span class="">+8% from last month</span>
                </div>
            </div>
            <div class="bg-surface rounded-xl p-stack-lg border border-slate-200 shadow-sm card-hover transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-label-md font-label-md text-on-surface-variant mb-2">Jumlah Umpan Balik</p>
                        <h2 class="font-headline-lg text-headline-lg text-on-background">{{ number_format($jumlahUmpanBalik) }}</h2>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary-container">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">forum</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-1 text-on-surface-variant text-body-sm font-body-sm">
                    <span class="material-symbols-outlined text-[16px]">horizontal_rule</span>
                    <span class="">Stable vs last month</span>
                </div>
            </div>
        </section>

        <!-- Section 2: Armada Terbaru -->
        <section>
            <div class="flex justify-between items-center mb-stack-md">
                <h3 class="font-headline-md text-headline-md text-primary">Armada Terbaru</h3>
                <a class="text-secondary font-label-md text-label-md hover:underline flex items-center gap-1" href="{{ url('/admin/armada') }}">View All <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @forelse($armadaTerbaru as $kendaraan)
                <!-- Vehicle Card -->
                <div class="bg-surface rounded-xl border border-slate-200 overflow-hidden shadow-sm card-hover transition-all duration-300 flex flex-col">
                    <div class="h-48 bg-slate-100 relative group overflow-hidden">
                        <img alt="{{ $kendaraan->nama_kendaraan }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset($kendaraan->gambar_utama) }}"/>
                        <div class="absolute top-3 left-3 bg-surface-container-high text-primary-container px-3 py-1 rounded-full font-label-sm text-label-sm font-bold shadow-sm backdrop-blur-sm bg-white/80">{{ $kendaraan->tipe }}</div>
                    </div>
                    <div class="p-stack-md flex-grow flex flex-col">
                        <h4 class="font-headline-sm text-headline-sm text-on-background mb-1">{{ $kendaraan->nama_kendaraan }}</h4>
                        <p class="text-body-sm font-body-sm text-on-surface-variant mb-4">
                            {{ $kendaraan->spesifikasi['seats'] ?? '-' }} Seats • {{ $kendaraan->spesifikasi['transmisi'] ?? '-' }} • {{ $kendaraan->spesifikasi['bahan_bakar'] ?? '-' }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <div>
                                <span class="font-headline-sm text-headline-sm text-primary">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}</span>
                                <span class="text-label-sm font-label-sm text-outline">/day</span>
                            </div>
                            <a href="{{ url('/admin/armada') }}" class="text-primary font-label-md text-label-md border border-primary px-4 py-2 rounded-lg hover:bg-primary-container/5 transition-colors">Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-8 text-on-surface-variant">
                    Belum ada armada kendaraan.
                </div>
                @endforelse
            </div>
        </section>

        <!-- Section 3: Feedback & Statistics -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
            <!-- Top 5 Feedback -->
            <div class="bg-surface rounded-xl p-stack-lg border border-slate-200 shadow-sm">
                <h3 class="font-headline-md text-headline-md text-primary mb-4">Umpan Balik Terbaru</h3>
                <div class="space-y-4">
                    @forelse($umpanBalikTerbaru as $feedback)
                    <div class="flex items-start gap-3 pb-4 border-b border-slate-100">
                        @php
                            $initials = collect(explode(' ', $feedback->user->name))->map(fn($n) => substr($n, 0, 1))->take(2)->join('');
                        @endphp
                        <div class="w-10 h-10 rounded-full bg-slate-100 flex-shrink-0 flex items-center justify-center text-primary font-bold">{{ strtoupper($initials) }}</div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-label-md text-label-md text-on-background">{{ $feedback->user->name }}</span>
                                <span class="text-label-sm text-outline">• {{ $feedback->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-body-sm text-on-surface-variant">"{{ $feedback->komentar }}"</p>
                            <div class="flex text-[#F97316] text-sm mt-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $feedback->rating)
                                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    @else
                                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">star</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-outline py-4">Belum ada umpan balik.</div>
                    @endforelse
                </div>
                <a href="{{ route('admin.dashboard.umpan-balik') }}" class="w-full mt-4 py-2 block text-center text-primary font-label-md hover:bg-slate-50 rounded-lg transition-colors">Lihat Semua Umpan Balik</a>
            </div>

            <!-- Status Statistics -->
            <div class="space-y-gutter">
                <a href="{{ route('admin.dashboard.pesanan-aktif') }}" class="block">
                    <div class="bg-surface rounded-xl p-stack-md border border-slate-200 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider mb-1">Kendaraan Sedang Dipesan</p>
                            <div class="flex items-baseline gap-2">
                                <h3 class="font-headline-lg text-headline-lg text-[#1E3A8A]">{{ $sedangDipesanCount }}</h3>
                                <span class="text-body-sm text-on-surface-variant">unit aktif</span>
                            </div>
                            <div class="mt-2 text-label-sm text-on-surface-variant">
                                <span class="font-medium">Termasuk:</span> @dimas.p, @sarah_w, @kevin99...
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-[#1E3A8A]/10 flex items-center justify-center text-[#1E3A8A]">
                            <span class="material-symbols-outlined">directions_car</span>
                        </div>
                    </div>
                </a>
                
                <div class="bg-surface rounded-xl p-stack-md border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-label-sm text-outline uppercase tracking-wider mb-1">Telah Dipesan (Menunggu)</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="font-headline-lg text-headline-lg text-[#F97316]">{{ $menungguCount }}</h3>
                            <span class="text-body-sm text-on-surface-variant">menunggu pickup</span>
                        </div>
                        <div class="mt-2 text-label-sm text-on-surface-variant">
                            <span class="font-medium">Termasuk:</span> @anton_k, @lina.m, @joko_s...
                        </div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-[#F97316]/10 flex items-center justify-center text-[#F97316]">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                </div>

                <div class="bg-surface rounded-xl p-stack-md border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-label-sm text-outline uppercase tracking-wider mb-1">Belum Dikembalikan</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="font-headline-lg text-headline-lg text-error">{{ $belumDikembalikanCount }}</h3>
                            <span class="text-body-sm text-on-surface-variant">melewati batas waktu</span>
                        </div>
                        <div class="mt-2 text-label-sm text-on-surface-variant">
                            <span class="font-medium">Perhatian:</span> @rudy_hartono (2 hari), @siska.p (1 hari)...
                        </div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-error/10 flex items-center justify-center text-error">
                        <span class="material-symbols-outlined">warning</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Active Orders & Returns -->
        <section>
            <div class="flex justify-between items-center mb-stack-md">
                <h3 class="font-headline-md text-headline-md text-primary">Pengguna yang Sedang Memesan</h3>
                <form action="{{ route('admin.dashboard.index') }}" method="GET" class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input name="search" value="{{ request('search') }}" class="pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-body-sm focus:outline-none focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent" placeholder="Cari pesanan..." type="text"/>
                </form>
            </div>
            <div class="bg-surface rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-label-sm text-on-surface-variant">
                                <th class="py-3 px-4 font-medium">ID Pesanan</th>
                                <th class="py-3 px-4 font-medium">Pengguna</th>
                                <th class="py-3 px-4 font-medium">Kendaraan</th>
                                <th class="py-3 px-4 font-medium">Waktu Kembali</th>
                                <th class="py-3 px-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-sm">
                            @forelse($pesananAktif as $pesanan)
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">#AR-{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center text-xs font-bold">
                                            {{ strtoupper(substr($pesanan->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-on-background">{{ $pesanan->user->name }}</div>
                                            <div class="text-xs text-outline">{{ $pesanan->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">{{ $pesanan->kendaraan->nama_kendaraan ?? 'Kendaraan Dihapus' }}</td>
                                <td class="py-3 px-4 {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->isPast() ? 'text-error font-medium' : 'text-on-background' }}">
                                    {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('M d, H:i') }}
                                    @if(\Carbon\Carbon::parse($pesanan->tanggal_selesai)->isPast())
                                        (Terlambat)
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <form action="{{ route('admin.dashboard.pesanan.tandai-dikembalikan', $pesanan->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menandai pesanan ini sebagai dikembalikan?')" class="{{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->isPast() ? 'bg-[#F97316] hover:bg-secondary' : 'bg-[#1E3A8A] hover:bg-primary-container' }} text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">
                                            Tandai Dikembalikan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-6 px-4 text-center text-on-surface-variant">Tidak ada pesanan aktif saat ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 flex justify-between items-center text-body-sm text-on-surface-variant">
                    <span class="">Menampilkan {{ $pesananAktif->count() }} dari {{ $sedangDipesanCount + $menungguCount }} pesanan aktif</span>
                    <a href="{{ route('admin.dashboard.pesanan-aktif') }}" class="text-primary hover:underline font-medium">Lihat Semua Pesanan</a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
