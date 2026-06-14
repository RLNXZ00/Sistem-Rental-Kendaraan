<nav x-data="{ open: false }" class="bg-primary dark:bg-primary sticky top-0 w-full shadow-md z-40">
    <div class="flex justify-between items-center h-16 px-margin-desktop max-w-container-max mx-auto">
        <!-- Logo -->
        <a class="text-headline-md font-headline-md font-bold text-on-primary dark:text-on-primary flex items-center gap-2" href="{{ route('beranda') }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">directions_car</span>
            AutoRide
        </a>
        
        <!-- Desktop Nav Links -->
        <ul class="hidden md:flex gap-gutter items-center font-body-md text-body-md">
            <li><a class="text-on-primary {{ request()->routeIs('beranda') ? 'border-b-2 border-secondary-container pb-1' : 'opacity-80' }} hover:text-secondary-container transition-colors duration-200" href="{{ route('beranda') }}">Beranda</a></li>
            <li><a class="text-on-primary {{ request()->routeIs('kendaraan.*') ? 'border-b-2 border-secondary-container pb-1' : 'opacity-80' }} hover:text-secondary-container transition-colors duration-200" href="{{ route('kendaraan.index') }}">Daftar Kendaraan</a></li>
            <li><a class="text-on-primary {{ request()->routeIs('pemesanan.*') ? 'border-b-2 border-secondary-container pb-1' : 'opacity-80' }} hover:text-secondary-container transition-colors duration-200" href="{{ route('pemesanan.riwayat') }}">Pemesanan</a></li>
            <li><a class="text-on-primary {{ request()->routeIs('tentang-kami') ? 'border-b-2 border-secondary-container pb-1' : 'opacity-80' }} hover:text-secondary-container transition-colors duration-200" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
        </ul>

        <!-- Right Side: Notification & Auth -->
        <div class="hidden md:flex items-center gap-stack-md font-body-md text-body-md">
            @auth
                <!-- Notification Dropdown Panel -->
                <div x-data="{ notifOpen: false, hasNewNotif: localStorage.getItem('notifRead') !== 'true' }" class="relative cursor-pointer group" @click.away="notifOpen = false">
                    <button @click="notifOpen = !notifOpen; hasNewNotif = false; localStorage.setItem('notifRead', 'true')" class="relative focus:outline-none flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-primary/80 hover:text-secondary-container transition-colors duration-200">notifications</span>
                        <span x-show="hasNewNotif" class="absolute -top-1 -right-1 w-3 h-3 bg-error rounded-full border-2 border-primary"></span>
                    </button>
                    
                    <div x-show="notifOpen" x-transition style="display: none;" class="absolute right-0 mt-2 w-80 bg-surface rounded-[20px] shadow-lg border border-slate-200 overflow-hidden z-50">
                        <div class="p-4 border-b border-slate-100">
                            <h3 class="font-headline-sm text-headline-sm text-primary-container font-bold">Notifikasi</h3>
                        </div>
                        <div class="flex flex-col">
                            <div class="p-4 hover:bg-slate-50 transition-colors border-b border-slate-100">
                                <div class="flex gap-3">
                                    <span class="material-symbols-outlined text-success">check_circle</span>
                                    <div class="flex flex-col text-left">
                                        <span class="font-label-md text-label-md text-primary-container">Selamat Datang</span>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Anda telah berhasil masuk ke sistem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-slate-50 text-center">
                            <a class="text-label-sm text-primary hover:underline" href="#">Lihat Semua Notifikasi</a>
                        </div>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-on-primary bg-primary hover:text-secondary-container focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a class="text-on-primary/80 hover:text-secondary-container transition-colors duration-200" href="{{ route('login') }}">Login</a>
                <a class="bg-secondary-container text-on-primary px-4 py-2 rounded-lg scale-95 active:scale-90 transition-transform font-label-md text-label-md" href="{{ route('register') }}">Register</a>
            @endauth
        </div>

        <!-- Hamburger -->
        <button @click="open = !open" class="md:hidden text-on-primary">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden bg-primary pb-4">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" class="text-on-primary hover:bg-primary-container">
                Beranda
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kendaraan.index')" :active="request()->routeIs('kendaraan.*')" class="text-on-primary hover:bg-primary-container">
                Daftar Kendaraan
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pemesanan.riwayat')" :active="request()->routeIs('pemesanan.*')" class="text-on-primary hover:bg-primary-container">
                Pemesanan
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tentang-kami')" :active="request()->routeIs('tentang-kami')" class="text-on-primary hover:bg-primary-container">
                Tentang Kami
            </x-responsive-nav-link>
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-primary-container">
            <div class="px-4">
                <div class="font-medium text-base text-on-primary">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-on-primary/80">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-on-primary hover:bg-primary-container">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-on-primary hover:bg-primary-container">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 pb-1 border-t border-primary-container">
            <div class="px-4 flex flex-col gap-2">
                <a href="{{ route('login') }}" class="text-on-primary text-center py-2">Login</a>
                <a href="{{ route('register') }}" class="bg-secondary-container text-on-primary px-4 py-2 rounded-lg text-center font-label-md">Register</a>
            </div>
        </div>
        @endauth
    </div>
</nav>
