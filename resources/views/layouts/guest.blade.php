<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AutoRide') }}</title>

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        <style>
            /* Base typography defaults for forms */
            input::placeholder {
                color: #757682; /* outline color */
            }
            
            /* Subtle background pattern for high-end feel without images */
            .bg-pattern {
                background-image: radial-gradient(#E2E8F0 1px, transparent 1px);
                background-size: 24px 24px;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            .material-symbols-outlined.fill {
                font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            /* Custom styles for input focus glow */
            .input-glow:focus, .input-glow:focus-within {
                box-shadow: 0 0 0 2px rgba(0, 35, 111, 0.2);
                border-color: #00236f; /* primary color */
                outline: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body {{ $attributes->merge(['class' => 'font-sans text-on-surface antialiased bg-background relative overflow-hidden min-h-screen']) }}>
        {{ $slot }}
    </body>
</html>
