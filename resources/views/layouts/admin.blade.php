<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Velocity Admin' }}</title>
    
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Config for Slicing -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "primary": "#00236f",
                      "tertiary-container": "#6e2c00",
                      "surface-tint": "#4059aa",
                      "tertiary-fixed-dim": "#ffb691",
                      "on-primary-container": "#90a8ff",
                      "surface": "#FFFFFF",
                      "surface-container-lowest": "#ffffff",
                      "on-secondary-fixed": "#341100",
                      "inverse-surface": "#213145",
                      "on-secondary-fixed-variant": "#783200",
                      "on-tertiary-fixed": "#341100",
                      "on-tertiary": "#ffffff",
                      "background": "#F8FAFC",
                      "slate-200": "#E2E8F0",
                      "surface-bright": "#f8f9ff",
                      "tertiary-fixed": "#ffdbcb",
                      "outline-variant": "#c5c5d3",
                      "surface-container": "#e5eeff",
                      "primary-fixed-dim": "#b6c4ff",
                      "error": "#EF4444",
                      "secondary": "#9d4300",
                      "on-secondary-container": "#5c2400",
                      "secondary-fixed-dim": "#ffb690",
                      "inverse-on-surface": "#eaf1ff",
                      "on-background": "#0b1c30",
                      "on-error": "#ffffff",
                      "surface-container-high": "#dce9ff",
                      "on-surface": "#0b1c30",
                      "on-surface-variant": "#444651",
                      "surface-dim": "#cbdbf5",
                      "outline": "#757682",
                      "primary-fixed": "#dce1ff",
                      "secondary-fixed": "#ffdbca",
                      "secondary-container": "#fd761a",
                      "on-primary": "#ffffff",
                      "tertiary": "#4b1c00",
                      "success": "#10B981",
                      "on-tertiary-fixed-variant": "#773205",
                      "on-tertiary-container": "#f39461",
                      "navy-light": "#3B82F6",
                      "slate-100": "#F1F5F9",
                      "on-primary-fixed": "#00164e",
                      "on-primary-fixed-variant": "#264191",
                      "inverse-primary": "#b6c4ff",
                      "surface-variant": "#d3e4fe",
                      "on-error-container": "#93000a",
                      "surface-container-highest": "#d3e4fe",
                      "on-secondary": "#ffffff",
                      "slate-50": "#F8FAFC",
                      "error-container": "#ffdad6",
                      "primary-container": "#1e3a8a",
                      "surface-container-low": "#eff4ff"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "stack-sm": "0.5rem",
                      "margin-desktop": "2.5rem",
                      "container-max": "1280px",
                      "gutter": "1.5rem",
                      "section-gap": "5rem",
                      "margin-mobile": "1rem",
                      "stack-lg": "2rem",
                      "stack-md": "1rem"
              },
              "fontFamily": {
                      "headline-xl": ["Montserrat"],
                      "body-sm": ["Inter"],
                      "headline-lg": ["Montserrat"],
                      "label-sm": ["Inter"],
                      "headline-md": ["Montserrat"],
                      "headline-lg-mobile": ["Montserrat"],
                      "label-md": ["Inter"],
                      "headline-sm": ["Montserrat"],
                      "body-lg": ["Inter"],
                      "body-md": ["Inter"]
              },
              "fontSize": {
                      "headline-xl": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                      "headline-lg": ["32px", {"lineHeight": "1.25", "fontWeight": "700"}],
                      "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                      "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                      "headline-lg-mobile": ["28px", {"lineHeight": "1.2", "fontWeight": "700"}],
                      "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                      "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                      "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                      "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}]
              }
            }
          }
        }
    </script>
</head>
<body class="bg-background text-on-background font-body-md text-body-md antialiased flex min-h-screen">
    
    <!-- SideNavBar Component -->
    <nav class="hidden md:flex bg-[#1E3A8A] text-white font-label-md text-label-md docked left-0 h-full w-64 border-r border-white/10 flat no shadows fixed flex flex-col p-stack-md top-0" style="opacity: 1;">
        <div class="mb-stack-lg px-2">
            <div class="font-headline-sm text-headline-sm font-bold text-white">AutoRide Admin</div>
            <div class="text-label-sm text-slate-200">Velocity Drive System</div>
        </div>
        
        <ul class="space-y-1 flex-grow">
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span> Dashboard
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="directions_car">directions_car</span> Armada
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.keamanan.*') ? 'bg-white/10 text-white font-bold' : 'text-slate-200 hover:bg-white/10 hover:text-white' }} rounded-lg transition-all" href="{{ route('admin.keamanan.index') }}">
                    <span class="material-symbols-outlined" data-icon="security">security</span> Keamanan
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="info">info</span> Tentang
                </a>
            </li>
        </ul>
        
        <div class="mt-auto pt-stack-md border-t border-white/10">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-200 hover:bg-white/10 hover:text-white rounded-lg transition-all" href="#">
                <span class="material-symbols-outlined" data-icon="help">help</span> Support
            </a>
            <button class="w-full mt-4 flex items-center justify-center gap-2 px-4 py-2 border border-white/20 text-white rounded-lg hover:bg-white/10 transition-colors">
                <span class="material-symbols-outlined">logout</span> Logout
            </button>
        </div>
    </nav>
    
    <!-- Main Content Wrapper -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">
        <!-- Page Canvas -->
        <main class="flex-1 p-margin-desktop bg-background">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
