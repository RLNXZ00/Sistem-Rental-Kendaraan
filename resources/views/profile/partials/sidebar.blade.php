<!-- Sidebar: Account Settings & Activity -->
<aside class="lg:col-span-4 space-y-stack-md">
    <!-- Activity Summary -->
    <div class="bg-surface rounded-2xl p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
        <h3 class="font-headline-sm text-headline-sm text-primary mb-4">Ringkasan Aktivitas</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-surface-container-low p-4 rounded-xl text-center">
                <span class="material-symbols-outlined text-secondary-container mb-1" data-icon="directions_car">directions_car</span>
                <div class="text-headline-sm text-on-surface">{{ auth()->user()->pemesanans()->count() ?? 0 }}</div>
                <div class="text-label-sm text-on-surface-variant">Total Sewa</div>
            </div>
            <div class="bg-surface-container-low p-4 rounded-xl text-center">
                <span class="material-symbols-outlined text-secondary-container mb-1" data-icon="verified_user">verified_user</span>
                <div class="text-headline-sm text-on-surface">Gold</div>
                <div class="text-label-sm text-on-surface-variant">Status Loyalitas</div>
            </div>
        </div>
        <div class="mt-6 pt-6 border-t border-slate-100">
            <div class="flex items-center justify-between text-body-sm mb-2">
                <span class="text-on-surface-variant">Progress Reward Berikutnya</span>
                <span class="text-primary font-bold">80%</span>
            </div>
            <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                <div class="bg-secondary-container h-full w-[80%]" style="transition: width 1s ease-in-out;"></div>
            </div>
        </div>
    </div>
    <!-- Account Settings -->
    <div class="bg-surface rounded-2xl p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
        <h3 class="font-headline-sm text-headline-sm text-primary mb-4">Pengaturan Akun</h3>
        <div class="space-y-4">
            <a href="{{ route('profile.edit') }}" class="w-full flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-colors group {{ request()->routeIs('profile.edit') ? 'bg-surface-container-low' : '' }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-on-surface-variant group-hover:text-primary' }}" data-icon="person">person</span>
                    <span class="text-body-md text-on-surface">Profil Pengguna</span>
                </div>
                <span class="material-symbols-outlined {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-on-surface-variant' }} text-[20px]" data-icon="chevron_right">chevron_right</span>
            </a>
            <a href="#" class="w-full flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary" data-icon="lock">lock</span>
                    <span class="text-body-md text-on-surface">Ganti Kata Sandi</span>
                </div>
                <span class="material-symbols-outlined text-on-surface-variant text-[20px]" data-icon="chevron_right">chevron_right</span>
            </a>
            <a href="{{ route('profile.notifikasi') }}" class="w-full flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-colors group {{ request()->routeIs('profile.notifikasi') ? 'bg-surface-container-low' : '' }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined {{ request()->routeIs('profile.notifikasi') ? 'text-primary' : 'text-on-surface-variant group-hover:text-primary' }}" data-icon="notifications_active">notifications_active</span>
                    <span class="text-body-md text-on-surface">Preferensi Notifikasi</span>
                </div>
                <span class="material-symbols-outlined {{ request()->routeIs('profile.notifikasi') ? 'text-primary' : 'text-on-surface-variant' }} text-[20px]" data-icon="chevron_right">chevron_right</span>
            </a>
            <a href="{{ route('profile.bahasa') }}" class="w-full flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-colors group {{ request()->routeIs('profile.bahasa') ? 'bg-surface-container-low' : '' }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined {{ request()->routeIs('profile.bahasa') ? 'text-primary' : 'text-on-surface-variant group-hover:text-primary' }}" data-icon="language">language</span>
                    <span class="text-body-md text-on-surface">Bahasa & Wilayah</span>
                </div>
                <span class="material-symbols-outlined {{ request()->routeIs('profile.bahasa') ? 'text-primary' : 'text-on-surface-variant' }} text-[20px]" data-icon="chevron_right">chevron_right</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-between p-3 rounded-xl hover:bg-error/10 transition-colors group">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-error" data-icon="logout">logout</span>
                        <span class="text-body-md text-error font-medium">Keluar Sesi</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</aside>
