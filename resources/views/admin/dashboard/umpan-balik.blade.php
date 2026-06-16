@extends('layouts.admin')

@section('title', 'AutoRide Admin - Umpan Balik Terbaru')

@section('content')
<div class="w-full pb-section-gap">
    <!-- Breadcrumb & Header -->
    <div class="mb-stack-lg">
        <nav aria-label="Breadcrumb" class="flex text-on-surface-variant font-body-sm mb-stack-sm">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a class="inline-flex items-center hover:text-primary transition-colors" href="{{ route('admin.dashboard.index') }}">
                        Dashboard
                    </a>
                </li>
                <li class="">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined mx-1 text-sm" data-icon="chevron_right">chevron_right</span>
                        <span class="text-primary font-medium">Umpan Balik Terbaru</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-stack-md">
            <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background">Umpan Balik Terbaru</h2>
            <div class="flex items-center gap-stack-sm w-full md:w-auto">
                <div class="relative w-full md:w-64">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 transform -translate-y-1/2 text-outline" data-icon="search">search</span>
                    <input class="w-full pl-10 pr-4 py-2 bg-surface border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-body-sm text-on-surface" placeholder="Cari umpan balik..." type="text"/>
                </div>
                <button class="p-2 bg-surface border border-slate-200 rounded-lg text-on-surface-variant hover:bg-slate-50 transition-colors">
                    <span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Feedback List -->
    <div class="bg-surface rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <ul class="divide-y divide-slate-200">
            @forelse($semuaUmpanBalik as $feedback)
            <li class="p-stack-md hover:bg-slate-50 transition-colors">
                <div class="flex items-start gap-stack-md">
                    @php
                        $initials = collect(explode(' ', $feedback->user->name))->map(fn($n) => substr($n, 0, 1))->take(2)->join('');
                    @endphp
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex-shrink-0 flex items-center justify-center text-primary font-bold text-lg">{{ strtoupper($initials) }}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-1">
                            <div>
                                <h3 class="font-label-md text-label-md text-on-background">{{ $feedback->user->name }}</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $feedback->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex text-secondary-container">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $feedback->rating)
                                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    @else
                                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">star</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mt-stack-sm">
                            "{{ $feedback->komentar }}"
                        </p>
                        <div class="mt-stack-sm flex gap-stack-sm">
                            <span class="px-2 py-1 {{ $feedback->kendaraan->kategori == 'Mobil' ? 'bg-surface-container-high text-primary' : 'bg-secondary-fixed text-secondary' }} font-label-sm text-label-sm rounded-full">Sewa {{ $feedback->kendaraan->kategori }}: {{ $feedback->kendaraan->nama }}</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100 flex justify-end">
                            <a href="{{ route('admin.dashboard.detail-ulasan', $feedback->id) }}" class="text-primary hover:text-primary-container font-label-md text-sm transition-colors">Lihat Detail Ulasan</a>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <li class="p-stack-md text-center text-outline">Belum ada umpan balik yang diberikan.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
