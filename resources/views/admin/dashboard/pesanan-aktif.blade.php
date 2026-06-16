@extends('layouts.admin')

@section('title', 'AutoRide Admin - Active Orders')

@section('content')
<div class="w-full pb-section-gap">
    <!-- Breadcrumbs & Header -->
    <div class="mb-stack-lg flex flex-col gap-4 md:flex-row md:items-center justify-between">
        <div>
            <nav class="flex text-body-sm font-body-sm text-on-surface-variant mb-2">
                <ol class="flex items-center space-x-2">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li><span class="material-symbols-outlined text-sm">chevron_right</span></li>
                    <li class="text-on-background font-medium">Pengguna Sedang Memesan</li>
                </ol>
            </nav>
            <div class="flex items-center gap-3">
                <a class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-on-background hover:bg-slate-200 transition-colors" href="{{ route('admin.dashboard.index') }}">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary">Active Orders</h1>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 border border-slate-200 rounded-lg text-body-sm font-label-md text-on-background hover:bg-slate-50 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">filter_list</span> Filter
            </button>
            <button class="px-4 py-2 bg-primary text-on-primary rounded-lg text-body-sm font-label-md hover:bg-primary-container transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">download</span> Export
            </button>
        </div>
    </div>

    <!-- Filters / Tabs -->
    <div class="bg-surface rounded-xl border border-slate-200 p-2 mb-stack-md flex flex-wrap gap-2 shadow-sm">
        <button class="px-4 py-2 bg-primary-container text-on-primary rounded-lg text-body-sm font-label-md transition-colors">All Active (42)</button>
        <button class="px-4 py-2 text-on-surface-variant hover:bg-slate-100 rounded-lg text-body-sm font-label-md transition-colors">Today (12)</button>
        <button class="px-4 py-2 text-error hover:bg-error-container rounded-lg text-body-sm font-label-md transition-colors flex items-center gap-1">
            Overdue (3)
        </button>
        <button class="px-4 py-2 text-on-surface-variant hover:bg-slate-100 rounded-lg text-body-sm font-label-md transition-colors">Tomorrow (18)</button>
    </div>

    <!-- Data Table -->
    <div class="bg-surface rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                        <th class="p-4 py-3 font-semibold">Order ID</th>
                        <th class="p-4 py-3 font-semibold">User</th>
                        <th class="p-4 py-3 font-semibold">Vehicle</th>
                        <th class="p-4 py-3 font-semibold">Return Time</th>
                        <th class="p-4 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-body-sm font-body-sm divide-y divide-slate-100">
                    @forelse($pesanans as $pesanan)
                    <tr class="hover:bg-slate-50 transition-colors group cursor-pointer">
                        <td class="p-4 font-medium text-primary">#AR-{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full overflow-hidden bg-slate-200 shrink-0 flex items-center justify-center text-primary font-bold bg-primary-fixed">
                                    {{ strtoupper(substr($pesanan->user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-on-background group-hover:text-primary transition-colors">{{ $pesanan->user->name }}</div>
                                    <div class="text-xs text-on-surface-variant">{{ $pesanan->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded-full {{ strtolower($pesanan->kendaraan->kategori) == 'motor' ? 'bg-tertiary-fixed text-on-tertiary-fixed' : 'bg-surface-container-high text-primary' }} text-xs font-semibold uppercase tracking-wide">{{ $pesanan->kendaraan->kategori }}</span>
                                <span class="font-medium">{{ $pesanan->kendaraan->nama_kendaraan }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-2 {{ $pesanan->status === 'Denda Terlambat' ? 'text-error' : 'text-secondary' }} font-medium">
                                <span class="material-symbols-outlined text-sm">{{ $pesanan->status === 'Denda Terlambat' ? 'error' : 'schedule' }}</span>
                                {{ $pesanan->status }}
                            </div>
                            <div class="text-xs text-on-surface-variant mt-0.5">{{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('M d, H:i') }}</div>
                        </td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.pesanan.kembalikan', $pesanan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 {{ $pesanan->status === 'Denda Terlambat' ? 'bg-secondary-container' : 'bg-primary' }} text-on-primary text-xs font-label-md rounded-md hover:opacity-90 transition-colors shadow-sm hover:shadow">
                                    Mark Returned
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-on-surface-variant">Tidak ada pesanan aktif saat ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant">
            <div class="">Showing 1 to 10 of 42 entries</div>
            <div class="flex gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-300 bg-surface hover:bg-slate-100 disabled:opacity-50" disabled="">
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-primary text-on-primary font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-300 bg-surface hover:bg-slate-100 font-medium text-on-background">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-300 bg-surface hover:bg-slate-100 font-medium text-on-background">3</button>
                <span class="w-8 h-8 flex items-center justify-center">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-300 bg-surface hover:bg-slate-100">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
