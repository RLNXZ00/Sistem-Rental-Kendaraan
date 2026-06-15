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
                        @forelse(auth()->user()->notifications as $notification)
                        <div class="p-4 {{ is_null($notification->read_at) ? 'bg-primary/5' : 'bg-surface-bright' }} rounded-xl border border-slate-100 hover:border-primary-container transition-colors">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-{{ $notification->data['color'] ?? 'primary' }}/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-{{ $notification->data['color'] ?? 'primary' }}">{{ $notification->data['icon'] ?? 'info' }}</span>
                                </div>
                                <div class="flex flex-col flex-1">
                                    <div class="flex justify-between items-start gap-2">
                                        <span class="font-label-md text-label-md text-{{ $notification->data['color'] ?? 'primary-container' }} leading-tight">{{ $notification->data['title'] ?? 'Notifikasi' }}</span>
                                        <span class="text-[10px] text-on-surface-variant flex-shrink-0">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $notification->data['message'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-8 text-center text-on-surface-variant">
                            Belum ada notifikasi.
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Bookings Teaser -->
                <div class="mt-gutter bg-surface rounded-2xl p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200" x-data="{ showAllTransactions: false }">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-headline-sm text-headline-sm text-primary">Riwayat Transaksi Terakhir</h3>
                    </div>
                    
                    @php
                        $recentTransactions = auth()->user()->pemesanans()->latest()->take(2)->get();
                        $allTransactions = auth()->user()->pemesanans()->latest()->get();
                    @endphp

                    <div class="space-y-4">
                        @forelse($recentTransactions as $pesanan)
                        <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-50 bg-surface-bright hover:border-primary-container transition-colors">
                            <div class="w-16 h-12 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                <img alt="{{ $pesanan->kendaraan->nama }}" src="{{ $pesanan->kendaraan->foto_url ?? 'https://placehold.co/150x150/e2e8f0/475569?text=AutoRide' }}" class="w-full h-full object-cover"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-label-md text-on-surface truncate">{{ $pesanan->kendaraan->merek }} {{ $pesanan->kendaraan->nama }}</h4>
                                <p class="text-body-sm text-on-surface-variant">{{ \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y') }}</p>
                            </div>
                            <div class="text-right flex flex-col justify-center items-end">
                                <span class="block font-bold text-primary">Rp {{ number_format($pesanan->total_biaya, 0, ',', '.') }}</span>
                                <span class="text-[10px] font-bold uppercase {{ $pesanan->status === 'Selesai' ? 'text-success' : ($pesanan->status === 'Dibatalkan' ? 'text-on-surface-variant' : 'text-secondary-container') }}">{{ $pesanan->status }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="p-6 text-center text-on-surface-variant">
                            Belum ada transaksi.
                        </div>
                        @endforelse
                    </div>

                    @if($allTransactions->count() > 2)
                    <div class="mt-6 pt-4 border-t border-slate-100 flex justify-center">
                        <button @click="showAllTransactions = true" class="text-label-md text-primary hover:underline flex items-center gap-2">
                            Expand Daftar Transaksi <span class="material-symbols-outlined text-[18px]">expand_more</span>
                        </button>
                    </div>
                    @endif

                    <!-- Modal All Transactions -->
                    <div x-show="showAllTransactions" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                        <div @click.away="showAllTransactions = false" class="bg-surface p-6 rounded-2xl w-full max-w-2xl shadow-xl max-h-[80vh] flex flex-col">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-headline-sm text-primary">Semua Riwayat Transaksi</h3>
                                <button @click="showAllTransactions = false" class="text-on-surface-variant hover:text-error transition-colors">
                                    <span class="material-symbols-outlined">close</span>
                                </button>
                            </div>
                            <div class="overflow-y-auto pr-2 space-y-4">
                                @foreach($allTransactions as $pesanan)
                                <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-50 bg-surface-bright hover:border-primary-container transition-colors">
                                    <div class="w-16 h-12 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                        <img alt="{{ $pesanan->kendaraan->nama }}" src="{{ $pesanan->kendaraan->foto_url ?? 'https://placehold.co/150x150/e2e8f0/475569?text=AutoRide' }}" class="w-full h-full object-cover"/>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-label-md text-on-surface truncate">{{ $pesanan->kendaraan->merek }} {{ $pesanan->kendaraan->nama }}</h4>
                                        <p class="text-body-sm text-on-surface-variant">{{ \Carbon\Carbon::parse($pesanan->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d M Y') }}</p>
                                    </div>
                                    <div class="text-right flex flex-col justify-center items-end">
                                        <span class="block font-bold text-primary">Rp {{ number_format($pesanan->total_biaya, 0, ',', '.') }}</span>
                                        <span class="text-[10px] font-bold uppercase {{ $pesanan->status === 'Selesai' ? 'text-success' : ($pesanan->status === 'Dibatalkan' ? 'text-on-surface-variant' : 'text-secondary-container') }}">{{ $pesanan->status }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
