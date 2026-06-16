@extends('layouts.admin')

@section('title', 'AutoRide Admin - Detail Ulasan')

@section('content')
<main class="flex-grow p-margin-mobile md:p-margin-desktop bg-background md:pl-72 w-full pt-stack-lg md:pt-margin-desktop overflow-y-auto">
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
                        <a class="hover:text-primary transition-colors" href="{{ route('admin.dashboard.umpan-balik') }}">Umpan Balik Terbaru</a>
                    </div>
                </li>
                <li class="">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined mx-1 text-sm" data-icon="chevron_right">chevron_right</span>
                        <span class="text-primary font-medium">Detail Ulasan</span>
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

    <!-- Feedback List (Background) -->
    <div class="bg-surface rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <ul class="divide-y divide-slate-200">
            <li class="p-stack-md hover:bg-slate-50 transition-colors">
                <div class="flex items-start gap-stack-md">
                    <img alt="User avatar" class="w-12 h-12 rounded-full object-cover flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJhjInkJ2FH8UhJiDm2xgJW_ZHomBRRPdPoeCa_koZ23wNFq2Ean6Wujnvd4kYCEOU1zPvG09CUDliuWSVRRkcAK4u9O-pGgQi05kCfy_Cadm-c-EgBJ1jqap2bbGvzfk5mNBqGNI6ti4gBZDITe14GYLB3PsFmUb81utsW6fQihPRcPu8N2zrQnANbPcM2_fE05ncLH84z4U9aKyjmq3qf6-QC87ape6nq5nS0ZcpOnZ7cwF2GT2lpt8VQv54s0d0OpymSzMJp-M"/>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-1">
                            <div>
                                <h3 class="font-label-md text-label-md text-on-background">Siti Rahmawati</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">2 Hari yang lalu</p>
                            </div>
                            <div class="flex text-secondary-container">
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mt-stack-sm">
                            "Sangat puas dengan layanan AutoRide. Mobil Innova Reborn yang saya sewa dalam kondisi prima, bersih, dan wangi. Sopirnya juga sangat ramah dan hafal jalanan kota Bandung. Proses booking lewat aplikasi sangat mudah dan cepat. Pasti akan pakai AutoRide lagi untuk perjalanan dinas berikutnya."
                        </p>
                        <div class="mt-stack-sm flex gap-stack-sm">
                            <span class="px-2 py-1 bg-surface-container-high text-primary font-label-sm text-label-sm rounded-full">Sewa Mobil</span>
                            <span class="px-2 py-1 bg-slate-100 text-on-surface-variant font-label-sm text-label-sm rounded-full">Innova Reborn</span>
                        </div>
                    </div>
                </div>
            </li>
            <li class="p-stack-md hover:bg-slate-50 transition-colors">
                <div class="flex items-start gap-stack-md">
                    <img alt="User avatar" class="w-12 h-12 rounded-full object-cover flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBW0zE7BCWvM6dcBLL1ybIDWsasf6MOlhZG3jpYoaOCyZmKJNuoabKJb36ktVyJoC88CoWmi2As_E916WNd3UPhUQ0TGGxtdRc1W_42GGMptm0mwngqQy2mmw4kDjozoLYRV4TQfStc-8ylokVdvFko5gVrhhYobxc0b-ZLV-P4amS69dfkaWj2_lcJ73EuNqG6EgKmh3Jz1jQ29zUs9tyQXOr0EHXi4DuC-yZkrT3_589fWLMshp-QGxGJT0J6BHTNhi-mEw6yDLI"/>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-1">
                            <div>
                                <h3 class="font-label-md text-label-md text-on-background">Budi Santoso</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">5 Hari yang lalu</p>
                            </div>
                            <div class="flex text-secondary-container">
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" data-weight="fill" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-outline-variant">star</span>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mt-stack-sm">
                            "Secara keseluruhan pengalaman sewa motor memuaskan. Motor NMAX nya enak dipakai untuk keliling kota. Hanya saja saat serah terima agak sedikit telat sekitar 15 menit dari jadwal. Tapi CS nya responsif saat dihubungi. Terima kasih."
                        </p>
                        <div class="mt-stack-sm flex gap-stack-sm">
                            <span class="px-2 py-1 bg-secondary-fixed text-secondary font-label-sm text-label-sm rounded-full">Sewa Motor</span>
                            <span class="px-2 py-1 bg-slate-100 text-on-surface-variant font-label-sm text-label-sm rounded-full">Yamaha NMAX</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</main>

<!-- Modal Overlay -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm">
    <div class="bg-surface w-full max-w-lg rounded-xl shadow-sm overflow-hidden relative">
        <a href="{{ route('admin.dashboard.umpan-balik') }}" class="absolute top-4 right-4 text-on-surface-variant hover:text-primary transition-colors block">
            <span class="material-symbols-outlined">close</span>
        </a>
        <div class="p-margin-desktop">
            <div class="flex items-center gap-3 mb-stack-lg">
                <img alt="User avatar" class="w-12 h-12 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJhjInkJ2FH8UhJiDm2xgJW_ZHomBRRPdPoeCa_koZ23wNFq2Ean6Wujnvd4kYCEOU1zPvG09CUDliuWSVRRkcAK4u9O-pGgQi05kCfy_Cadm-c-EgBJ1jqap2bbGvzfk5mNBqGNI6ti4gBZDITe14GYLB3PsFmUb81utsW6fQihPRcPu8N2zrQnANbPcM2_fE05ncLH84z4U9aKyjmq3qf6-QC87ape6nq5nS0ZcpOnZ7cwF2GT2lpt8VQv54s0d0OpymSzMJp-M"/>
                <div>
                    <h3 class="font-label-md text-label-md text-on-background">Siti Rahmawati</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">2 Hari yang lalu</p>
                </div>
            </div>
            <div class="flex text-secondary-container mb-2">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-background mb-2">Pengalaman Sewa Innova Reborn</h4>
            <p class="font-body-md text-body-md text-on-surface mb-stack-lg">
                "Sangat puas dengan layanan AutoRide. Mobil Innova Reborn yang saya sewa dalam kondisi prima, bersih, dan wangi. Sopirnya juga sangat ramah dan hafal jalanan kota Bandung. Proses booking lewat aplikasi sangat mudah dan cepat. Pasti akan pakai AutoRide lagi untuk perjalanan dinas berikutnya."
            </p>
            <div class="flex items-center gap-2 mb-stack-lg">
                <span class="px-3 py-1 bg-surface-container-high text-primary font-label-sm text-label-sm rounded-full">Unit: Toyota Innova Reborn</span>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.dashboard.umpan-balik') }}" class="px-6 py-2 bg-primary text-white font-label-md rounded-lg hover:bg-primary-container transition-colors inline-block">Tutup</a>
            </div>
        </div>
    </div>
</div>
@endsection
