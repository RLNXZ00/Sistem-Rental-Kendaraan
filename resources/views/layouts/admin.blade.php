<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'AutoRide Admin Dashboard')</title>
    
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Config for Slicing -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed-dim": "#ffb690",
                        "primary-fixed": "#dce1ff",
                        "error-container": "#ffdad6",
                        "surface-dim": "#cbdbf5",
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-container": "#5c2400",
                        "surface-tint": "#4059aa",
                        "surface-variant": "#d3e4fe",
                        "on-primary": "#ffffff",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#213145",
                        "slate-50": "#F8FAFC",
                        "on-tertiary-fixed-variant": "#773205",
                        "tertiary-fixed-dim": "#ffb691",
                        "inverse-primary": "#b6c4ff",
                        "success": "#10B981",
                        "on-surface": "#0b1c30",
                        "tertiary-fixed": "#ffdbcb",
                        "on-secondary": "#ffffff",
                        "on-tertiary-fixed": "#341100",
                        "surface-container-highest": "#d3e4fe",
                        "error": "#EF4444",
                        "primary": "#00236f",
                        "on-background": "#0b1c30",
                        "background": "#F8FAFC",
                        "tertiary": "#4b1c00",
                        "outline": "#757682",
                        "primary-container": "#1e3a8a",
                        "on-secondary-fixed": "#341100",
                        "slate-100": "#F1F5F9",
                        "navy-light": "#3B82F6",
                        "on-surface-variant": "#444651",
                        "surface-container-high": "#dce9ff",
                        "slate-200": "#E2E8F0",
                        "tertiary-container": "#6e2c00",
                        "secondary-fixed": "#ffdbca",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-container": "#e5eeff",
                        "surface-container-low": "#eff4ff",
                        "surface-bright": "#f8f9ff",
                        "primary-fixed-dim": "#b6c4ff",
                        "on-secondary-fixed-variant": "#783200",
                        "secondary": "#9d4300",
                        "on-tertiary-container": "#f39461",
                        "on-tertiary": "#ffffff",
                        "surface": "#FFFFFF",
                        "outline-variant": "#c5c5d3",
                        "on-primary-container": "#90a8ff",
                        "on-primary-fixed": "#00164e",
                        "on-primary-fixed-variant": "#264191",
                        "secondary-container": "#fd761a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px",
                        "card": "20px"
                    },
                    "spacing": {
                        "stack-lg": "2rem",
                        "margin-desktop": "2.5rem",
                        "container-max": "1280px",
                        "stack-sm": "0.5rem",
                        "gutter": "1.5rem",
                        "stack-md": "1rem",
                        "section-gap": "5rem",
                        "margin-mobile": "1rem"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-sm": ["Montserrat"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-xl": ["Montserrat"],
                        "headline-md": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"]
                    },
                    "fontSize": {
                        "body-md": ["16px", { "lineHeight": "1.5", "fontWeight": "400" }],
                        "label-md": ["14px", { "lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "headline-sm": ["20px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-sm": ["12px", { "lineHeight": "1", "fontWeight": "500" }],
                        "body-sm": ["14px", { "lineHeight": "1.5", "fontWeight": "400" }],
                        "headline-xl": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["24px", { "lineHeight": "1.3", "fontWeight": "600" }],
                        "headline-lg": ["32px", { "lineHeight": "1.25", "fontWeight": "700" }],
                        "headline-lg-mobile": ["28px", { "lineHeight": "1.2", "fontWeight": "700" }]
                    }
                }
            }
        }
    </script>
    <style>
        .vehicle-card { transition: all 0.3s ease; }
        .vehicle-card:hover { transform: translateY(-4px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .icon-fill {
            font-variation-settings: 'FILL' 1;
        }
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex antialiased relative">
    <!-- SideNavBar -->
    <nav class="hidden md:flex bg-[#1E3A8A] text-white font-label-md text-label-md fixed left-0 top-0 h-full w-64 border-r border-white/10 flex-col p-stack-md z-50">
        <div class="mb-stack-lg px-2">
            <div class="font-headline-sm text-headline-sm font-bold text-white">AutoRide Admin</div>
            <div class="text-label-sm text-slate-200">Velocity Drive System</div>
        </div>
        
        <ul class="space-y-1 flex-grow">
            <li>
                <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard.*') || request()->is('admin/dashboard') ? 'bg-white/10 text-white font-bold' : 'text-slate-200 hover:bg-white/10 hover:text-white' }} rounded-lg transition-all" href="{{ route('admin.dashboard.index') }}">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.armada.*') || request()->is('admin/armada') ? 'bg-white/10 text-white font-bold' : 'text-slate-200 hover:bg-white/10 hover:text-white' }} rounded-lg transition-all" href="{{ url('/admin/armada') }}">
                    <span class="material-symbols-outlined" data-icon="directions_car">directions_car</span>
                    Armada
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.keamanan.*') ? 'bg-white/10 text-white font-bold' : 'text-slate-200 hover:bg-white/10 hover:text-white' }} rounded-lg transition-all" href="{{ route('admin.keamanan.index') ?? '#' }}">
                    <span class="material-symbols-outlined" data-icon="security">security</span>
                    Keamanan
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.tentang') ? 'bg-white/10 text-white font-bold' : 'text-slate-200 hover:bg-white/10 hover:text-white' }} rounded-lg transition-all"
                    href="{{ route('admin.tentang') }}">
                    <span class="material-symbols-outlined" data-icon="info">info</span>
                    Tentang
                </a>
            </li>
        </ul>
        <div class="mt-auto pt-stack-md border-t border-white/10">

            <form method="POST" action="{{ route('logout') }}" class="w-full mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-white/20 text-white rounded-lg hover:text-error hover:border-error transition-colors bg-transparent">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen relative w-full bg-background">
        <!-- Global Header -->
        <header class="bg-surface border-b border-slate-200 px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-end sticky top-0 z-40 shadow-sm">
            <div class="flex items-center gap-6">
                <span class="font-label-md text-label-md font-bold text-on-surface">Administrator</span>
                
                <!-- Profile Avatar -->
                <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=00236f&color=fff" alt="Admin Profile" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <!-- Page Canvas -->
        <main class="flex-1 p-margin-mobile md:p-margin-desktop overflow-y-auto">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
