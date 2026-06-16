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
        <a href="{{ route('admin.dashboard.pesanan-aktif', ['filter' => 'all']) }}" class="px-4 py-2 {{ $statusFilter == 'all' ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant hover:bg-slate-100' }} rounded-lg text-body-sm font-label-md transition-colors">All Active ({{ $counts['all'] }})</a>
        <a href="{{ route('admin.dashboard.pesanan-aktif', ['filter' => 'today']) }}" class="px-4 py-2 {{ $statusFilter == 'today' ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant hover:bg-slate-100' }} rounded-lg text-body-sm font-label-md transition-colors">Today ({{ $counts['today'] }})</a>
        <a href="{{ route('admin.dashboard.pesanan-aktif', ['filter' => 'overdue']) }}" class="px-4 py-2 {{ $statusFilter == 'overdue' ? 'bg-error text-white' : 'text-error hover:bg-error-container' }} rounded-lg text-body-sm font-label-md transition-colors flex items-center gap-1">
            Overdue ({{ $counts['overdue'] }})
        </a>
        <a href="{{ route('admin.dashboard.pesanan-aktif', ['filter' => 'tomorrow']) }}" class="px-4 py-2 {{ $statusFilter == 'tomorrow' ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant hover:bg-slate-100' }} rounded-lg text-body-sm font-label-md transition-colors">Tomorrow ({{ $counts['tomorrow'] }})</a>
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
                    @forelse($pemesanans as $pesanan)
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
                                <span class="px-2 py-0.5 rounded-full bg-surface-container-high text-primary text-xs font-semibold uppercase tracking-wide">{{ $pesanan->kendaraan->jenis_kendaraan ?? 'Kendaraan' }}</span>
                                <span class="font-medium">{{ $pesanan->kendaraan->nama_kendaraan ?? 'Terhapus' }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            @if(\Carbon\Carbon::parse($pesanan->tanggal_selesai)->isPast())
                            <div class="flex items-center gap-2 text-error font-medium">
                                <span class="material-symbols-outlined text-sm">error</span>
                                Overdue
                            </div>
                            @elseif(\Carbon\Carbon::parse($pesanan->tanggal_selesai)->isToday())
                            <div class="flex items-center gap-2 text-secondary font-medium">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                Today
                            </div>
                            @else
                            <div class="flex items-center gap-2 text-on-background font-medium">
                                <span class="material-symbols-outlined text-sm text-on-surface-variant">calendar_today</span>
                                Upcoming
                            </div>
                            @endif
                            <div class="text-xs text-on-surface-variant mt-0.5">{{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('M d, H:i') }}</div>
                        </td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.dashboard.pesanan.tandai-dikembalikan', $pesanan->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" onclick="return confirm('Tandai pesanan ini sebagai dikembalikan?')" class="px-3 py-1.5 {{ \Carbon\Carbon::parse($pesanan->tanggal_selesai)->isPast() ? 'bg-secondary-container hover:bg-secondary' : 'bg-primary hover:bg-primary-container' }} text-on-primary text-xs font-label-md rounded-md transition-colors shadow-sm hover:shadow">
                                    Mark Returned
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-on-surface-variant">
                            Tidak ada data pesanan yang sesuai filter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4 border-t border-slate-200 bg-slate-50">
            {{ $pemesanans->appends(['filter' => $statusFilter])->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
