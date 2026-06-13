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
