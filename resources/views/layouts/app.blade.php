<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AutoRide') }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
        
        <!-- Material Symbols -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
        </style>
    </head>
    <body class="bg-background text-on-background font-body-md antialiased min-h-screen flex flex-col">
        @include('layouts.navigation')

        <!-- Flash Messages -->
        @if (session('success') || session('error'))
            <div class="fixed top-24 right-4 z-50 flex flex-col gap-2 max-w-sm w-full">
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition.duration.500ms
                         class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-lg flex items-start gap-3">
                        <span class="material-symbols-outlined text-emerald-500 mt-0.5" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <div class="flex-grow">
                            <h4 class="font-headline-sm text-sm text-emerald-800 font-bold">Berhasil!</h4>
                            <p class="font-body-sm text-sm text-emerald-700 mt-1">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-emerald-500 hover:text-emerald-700 transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                @endif
                
                @if (session('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition.duration.500ms
                         class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-lg flex items-start gap-3">
                        <span class="material-symbols-outlined text-red-500 mt-0.5" style="font-variation-settings: 'FILL' 1;">error</span>
                        <div class="flex-grow">
                            <h4 class="font-headline-sm text-sm text-red-800 font-bold">Terjadi Kesalahan!</h4>
                            <p class="font-body-sm text-sm text-red-700 mt-1">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-500 hover:text-red-700 transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                @endif
            </div>
        @endif

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-primary dark:bg-primary-container w-full rounded-t-lg mt-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter px-margin-desktop py-section-gap max-w-container-max mx-auto">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-on-primary">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">directions_car</span>
                        <span class="text-headline-sm font-headline-sm font-bold">AutoRide</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-primary/70">Penyedia layanan rental kendaraan profesional dan terpercaya untuk segala kebutuhan mobilitas Anda.</p>
                </div>
                <div class="flex flex-col gap-4">
                    <h4 class="font-label-md text-label-md text-on-primary font-bold">Sosial</h4>
                    <ul class="flex flex-col gap-2 font-body-sm text-body-sm">
                        <li><a href="#" class="text-on-primary/70 hover:text-secondary-container transition-colors flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">photo_camera</span> Instagram</a></li>
                        <li><a href="#" class="text-on-primary/70 hover:text-secondary-container transition-colors flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">facebook</span> Facebook</a></li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4">
                    <h4 class="font-label-md text-label-md text-on-primary font-bold">Bantuan</h4>
                    <ul class="flex flex-col gap-2 font-body-sm text-body-sm">
                        <li><a href="#" class="text-on-primary/70 hover:text-secondary-container transition-colors flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">chat</span> WhatsApp</a></li>
                        <li><a href="#" class="text-on-primary/70 hover:text-secondary-container transition-colors flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">mail</span> Email</a></li>
                    </ul>
                </div>
                <div class="md:col-span-3 border-t border-on-primary/20 pt-6 mt-6 text-center">
                    <p class="font-body-sm text-body-sm text-on-primary/70">&copy; 2024 AutoRide Rental. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
