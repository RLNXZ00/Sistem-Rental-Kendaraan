<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name', 'Velocity Drive') }} - Admin</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .icon-fill {
            font-variation-settings: 'FILL' 1;
        }
    </style>
    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-on-background font-body-md min-h-screen">
    <!-- SideNavBar -->
    <nav
        class="hidden md:flex bg-[#1E3A8A] text-white font-label-md text-label-md docked left-0 h-full w-64 border-r border-white/10 flat no shadows fixed flex-col p-stack-md top-0">
        <div class="mb-stack-lg px-2">
            <div class="font-headline-sm text-headline-sm font-bold text-white">AutoRide Admin</div>
            <div class="text-label-sm text-slate-200">Velocity Drive System</div>
        </div>
        <ul class="space-y-1 flex-grow">
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white font-bold' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="directions_car">directions_car</span>
                    Armada
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="security">security</span>
                    Keamanan
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all {{ request()->routeIs('admin.tentang') ? 'bg-white/10 text-white font-bold' : '' }}"
                    href="{{ route('admin.tentang') }}">
                    <span class="material-symbols-outlined" data-icon="info">info</span>
                    Tentang
                </a>
            </li>
        </ul>
        <div class="mt-auto pt-stack-md border-t border-white/10">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined" data-icon="help">help</span>
                Support
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full mt-4">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-white/20 text-white rounded-lg hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </button>
            </form>
        </div>
    </nav>
    <!-- TopAppBar Container -->
    <div class="ml-64 flex flex-col min-h-screen">
        <!-- Main Content -->
        {{ $slot }}
    </div>
</body>

</html>