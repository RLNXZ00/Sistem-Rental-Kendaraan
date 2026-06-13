import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
                body: ['Inter', ...defaultTheme.fontFamily.sans],
                label: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "surface": "#ffffff",
                "on-surface": "#0b1c30",
                "on-surface-variant": "#43474e",
                "outline": "#73777f",
                "outline-variant": "#c3c6cf",
                "primary": "#00236f",
                "primary-container": "#1e3a8a",
                "on-primary": "#ffffff",
                "secondary-container": "#fd761a",
                "on-secondary": "#ffffff",
                "error": "#EF4444",
                "success": "#10B981"
            }
        },
    },

    plugins: [forms],
};
