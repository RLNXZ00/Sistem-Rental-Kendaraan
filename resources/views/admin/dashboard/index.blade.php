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
                        <h2 class="font-headline-lg text-headline-lg text-on-background">24,592</h2>
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
                        <h2 class="font-headline-lg text-headline-lg text-on-background">1,204</h2>
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
                        <h2 class="font-headline-lg text-headline-lg text-on-background">{{ number_format($totalUmpanBalik) }}</h2>
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
                <a class="text-secondary font-label-md text-label-md hover:underline flex items-center gap-1" href="#">View All <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <!-- Vehicle 1 -->
                <div class="bg-surface rounded-xl border border-slate-200 overflow-hidden shadow-sm card-hover transition-all duration-300 flex flex-col">
                    <div class="h-48 bg-slate-100 relative group overflow-hidden">
                        <img alt="Toyota Avanza Veloz 2024" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvrVLuFe7JOMQuv1ot3eJkjrbacgtpQ9b3ffQZkVfgcCq3ObmVibLw3bYlaJJg625UmwAASIdtbmdCYQ1Kmzb20cKgJO3CFuI_hcCI02M698W97OfmHutNY4aV8Jt8kR3ZchGlojmI5ylI2kYlsFvFP77kFJob7tEkfWpLk0VotRvXK87XD9eTwImq1BsrNiogonC2zAiD4QtlCPlrlaXi-rnzw9VBv44Vonreal4lmTRJ5LjA3TcQ01jIFTWRgUhTo-cMVWO63OI"/>
                        <div class="absolute top-3 left-3 bg-surface-container-high text-primary-container px-3 py-1 rounded-full font-label-sm text-label-sm font-bold shadow-sm backdrop-blur-sm bg-white/80">Mobil</div>
                    </div>
                    <div class="p-stack-md flex-grow flex flex-col">
                        <h4 class="font-headline-sm text-headline-sm text-on-background mb-1">Toyota Avanza Veloz 2024</h4>
                        <p class="text-body-sm font-body-sm text-on-surface-variant mb-4">7 Seats • Automatic • Petrol</p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <div>
                                <span class="font-headline-sm text-headline-sm text-primary">Rp 450k</span>
                                <span class="text-label-sm font-label-sm text-outline">/day</span>
                            </div>
                            <button class="text-primary font-label-md text-label-md border border-primary px-4 py-2 rounded-lg hover:bg-primary-container/5 transition-colors">Details</button>
                        </div>
                    </div>
                </div>
                <!-- Vehicle 2 -->
                <div class="bg-surface rounded-xl border border-slate-200 overflow-hidden shadow-sm card-hover transition-all duration-300 flex flex-col">
                    <div class="h-48 bg-slate-100 relative group overflow-hidden">
                        <img alt="Honda HR-V" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCM4ZlBgy56rgvjSE-UbXRbPxccBTetjdZf5lwiu-8vlc_UWqggjDAt4W_wBCiz-wrrd_X5FxxAim0YGsNZytWN-bRFA26bN05hIYLM9Vb-_CSPHSjMFEBckIv7P7LG4nBCgsqLiDMvmhOAOxBn3GNIPxkmV1KGL02XWcjuyNyePmQ7iw2mIJuRtMGFx1ajkyuoNGJU_EFMj8ueyL2P9u7QxTQz7JHOQs76LL0wpR0a8jX4xRqAdeaaGZCBB2t-hJ2vhG-B2X5RFYk"/>
                        <div class="absolute top-3 left-3 bg-surface-container-high text-primary-container px-3 py-1 rounded-full font-label-sm text-label-sm font-bold shadow-sm backdrop-blur-sm bg-white/80">Mobil</div>
                    </div>
                    <div class="p-stack-md flex-grow flex flex-col">
                        <h4 class="font-headline-sm text-headline-sm text-on-background mb-1">Honda HR-V</h4>
                        <p class="text-body-sm font-body-sm text-on-surface-variant mb-4">5 Seats • Automatic • Petrol</p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <div>
                                <span class="font-headline-sm text-headline-sm text-primary">Rp 600k</span>
                                <span class="text-label-sm font-label-sm text-outline">/day</span>
                            </div>
                            <button class="text-primary font-label-md text-label-md border border-primary px-4 py-2 rounded-lg hover:bg-primary-container/5 transition-colors">Details</button>
                        </div>
                    </div>
                </div>
                <!-- Vehicle 3 -->
                <div class="bg-surface rounded-xl border border-slate-200 overflow-hidden shadow-sm card-hover transition-all duration-300 flex flex-col">
                    <div class="h-48 bg-slate-100 relative group overflow-hidden">
                        <img alt="Mitsubishi Xpander" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWYpnyTHAFFscMiS45dZiwO5PcWZ81WUlDnNBcnw5QwYA9LTSLvCN4cPYSkNgjs1SdK8xgo_2d_NjJzk5A7pL_7lJ7fEsrMQ4sg94HVy-pMMmHRhSUtNIx6ULxh4FwBum2COPGahCnhobcKNRjOo3GMIjmGZ6u3Q3jGSR4vIUiJTHlEmHvOJLK_G4pna0IjF-eDQrnytOfAgosKPXcJKL2JsyV6zuK_6R_ODiMQlH34thGDZ3XnhmyS30Nq2IW8oA4yOf5cUNlmF0"/>
                        <div class="absolute top-3 left-3 bg-surface-container-high text-primary-container px-3 py-1 rounded-full font-label-sm text-label-sm font-bold shadow-sm backdrop-blur-sm bg-white/80">Mobil</div>
                    </div>
                    <div class="p-stack-md flex-grow flex flex-col">
                        <h4 class="font-headline-sm text-headline-sm text-on-background mb-1">Mitsubishi Xpander</h4>
                        <p class="text-body-sm font-body-sm text-on-surface-variant mb-4">7 Seats • Manual • Petrol</p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <div>
                                <span class="font-headline-sm text-headline-sm text-primary">Rp 480k</span>
                                <span class="text-label-sm font-label-sm text-outline">/day</span>
                            </div>
                            <button class="text-primary font-label-md text-label-md border border-primary px-4 py-2 rounded-lg hover:bg-primary-container/5 transition-colors">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Feedback & Statistics -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
            <!-- Top 5 Feedback -->
            <div class="bg-surface rounded-xl p-stack-lg border border-slate-200 shadow-sm">
                <h3 class="font-headline-md text-headline-md text-primary mb-4">Umpan Balik Terbaru</h3>
                <div class="space-y-4">
                    @forelse($latestUmpanBalik as $feedback)
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
                                <h3 class="font-headline-lg text-headline-lg text-[#1E3A8A]">42</h3>
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
                            <h3 class="font-headline-lg text-headline-lg text-[#F97316]">15</h3>
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
                            <h3 class="font-headline-lg text-headline-lg text-error">8</h3>
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
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input class="pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-body-sm focus:outline-none focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent" placeholder="Cari pesanan..." type="text"/>
                </div>
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
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">#AR-8821</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center text-xs font-bold">DP</div>
                                        <div>
                                            <div class="font-medium text-on-background">Dimas Pratama</div>
                                            <div class="text-xs text-outline">@dimas.p</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">Toyota Avanza Veloz</td>
                                <td class="py-3 px-4 text-on-background">Hari ini, 14:00</td>
                                <td class="py-3 px-4 text-right">
                                    <button class="bg-[#1E3A8A] hover:bg-primary-container text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">Tandai Dikembalikan</button>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">#AR-8819</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center text-xs font-bold">SW</div>
                                        <div>
                                            <div class="font-medium text-on-background">Sarah Wijaya</div>
                                            <div class="text-xs text-outline">@sarah_w</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">Honda HR-V</td>
                                <td class="py-3 px-4 text-on-background">Hari ini, 16:30</td>
                                <td class="py-3 px-4 text-right">
                                    <button class="bg-[#1E3A8A] hover:bg-primary-container text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">Tandai Dikembalikan</button>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">#AR-8815</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center text-xs font-bold">RH</div>
                                        <div>
                                            <div class="font-medium text-error">Rudy Hartono</div>
                                            <div class="text-xs text-error/80">@rudy_hartono</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">Mitsubishi Xpander</td>
                                <td class="py-3 px-4 text-error font-medium">Kemarin, 12:00 (Terlambat)</td>
                                <td class="py-3 px-4 text-right">
                                    <button class="bg-[#F97316] hover:bg-secondary text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">Tandai Dikembalikan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 flex justify-between items-center text-body-sm text-on-surface-variant">
                    <span class="">Menampilkan 1-3 dari 42 pesanan aktif</span>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 border border-slate-200 rounded hover:bg-slate-50 disabled:opacity-50" disabled="">Sebelumnya</button>
                        <button class="px-3 py-1 border border-slate-200 rounded hover:bg-slate-50">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
