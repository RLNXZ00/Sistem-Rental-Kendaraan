<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'AutoRide Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#dce1ff",
                        "tertiary-fixed": "#ffdbcb",
                        "secondary": "#9d4300",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#6e2c00",
                        "primary": "#00236f",
                        "surface-variant": "#d3e4fe",
                        "slate-100": "#F1F5F9",
                        "primary-container": "#1e3a8a",
                        "secondary-fixed": "#ffdbca",
                        "secondary-container": "#fd761a",
                        "outline": "#757682",
                        "surface-container-lowest": "#ffffff",
                        "on-error-container": "#93000a",
                        "error": "#EF4444",
                        "on-primary": "#ffffff",
                        "surface-tint": "#4059aa",
                        "on-tertiary-fixed": "#341100",
                        "navy-light": "#3B82F6",
                        "tertiary-fixed-dim": "#ffb691",
                        "primary-fixed-dim": "#b6c4ff",
                        "error-container": "#ffdad6",
                        "surface": "#FFFFFF",
                        "inverse-on-surface": "#eaf1ff",
                        "on-secondary-container": "#5c2400",
                        "inverse-primary": "#b6c4ff",
                        "on-secondary-fixed-variant": "#783200",
                        "slate-200": "#E2E8F0",
                        "surface-dim": "#cbdbf5",
                        "surface-container-high": "#dce9ff",
                        "slate-50": "#F8FAFC",
                        "surface-container": "#e5eeff",
                        "on-background": "#0b1c30",
                        "inverse-surface": "#213145",
                        "on-surface-variant": "#444651",
                        "success": "#10B981",
                        "on-error": "#ffffff",
                        "tertiary": "#4b1c00",
                        "surface-container-highest": "#d3e4fe",
                        "surface-bright": "#f8f9ff",
                        "on-primary-container": "#90a8ff",
                        "on-primary-fixed-variant": "#264191",
                        "secondary-fixed-dim": "#ffb690",
                        "surface-container-low": "#eff4ff",
                        "on-secondary": "#ffffff",
                        "on-tertiary-fixed-variant": "#773205",
                        "background": "#F8FAFC",
                        "on-surface": "#0b1c30",
                        "outline-variant": "#c5c5d3",
                        "on-tertiary-container": "#f39461",
                        "on-secondary-fixed": "#341100",
                        "on-primary-fixed": "#00164e"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "2.5rem",
                        "stack-lg": "2rem",
                        "stack-md": "1rem",
                        "section-gap": "5rem",
                        "margin-mobile": "1rem",
                        "gutter": "1.5rem",
                        "stack-sm": "0.5rem",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "body-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-xl": ["Montserrat"],
                        "body-md": ["Inter"],
                        "headline-sm": ["Montserrat"],
                        "headline-md": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "body-sm": ["14px", { "lineHeight": "1.5", "fontWeight": "400" }],
                        "label-md": ["14px", { "lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "headline-xl": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-md": ["16px", { "lineHeight": "1.5", "fontWeight": "400" }],
                        "headline-sm": ["20px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "headline-md": ["24px", { "lineHeight": "1.3", "fontWeight": "600" }],
                        "headline-lg": ["32px", { "lineHeight": "1.25", "fontWeight": "700" }],
                        "headline-lg-mobile": ["28px", { "lineHeight": "1.2", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-sm": ["12px", { "lineHeight": "1", "fontWeight": "500" }]
                    }
                },
            },
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
          font-variation-settings:
          'FILL' 0,
          'wght' 400,
          'GRAD' 0,
          'opsz' 24
        }
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex antialiased relative">
    <!-- SideNavBar -->
    <nav class="hidden md:flex bg-[#1E3A8A] text-white font-label-md text-label-md docked left-0 h-full w-64 border-r border-white/10 flat no shadows fixed flex flex-col p-stack-md top-0 z-50">
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
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="security">security</span>
                    Keamanan
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="info">info</span>
                    Tentang
                </a>
            </li>
        </ul>
        <div class="mt-auto pt-stack-md border-t border-white/10">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                <span class="material-symbols-outlined" data-icon="help">help</span>
                Support
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-white/20 text-white rounded-lg hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="md:ml-64 min-h-screen relative w-full">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
