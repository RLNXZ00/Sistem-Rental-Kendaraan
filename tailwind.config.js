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
            colors: {
                "inverse-surface": "#213145",
                "surface-dim": "#cbdbf5",
                "slate-100": "#F1F5F9",
                "on-error-container": "#93000a",
                "on-secondary": "#ffffff",
                "on-tertiary-fixed": "#341100",
                "on-secondary-fixed-variant": "#783200",
                "secondary-fixed": "#ffdbca",
                "tertiary-fixed-dim": "#ffb691",
                "secondary-container": "#fd761a",
                "on-secondary-fixed": "#341100",
                "inverse-primary": "#b6c4ff",
                "primary-container": "#1e3a8a",
                "primary": "#00236f",
                "on-background": "#0b1c30",
                "secondary-fixed-dim": "#ffb690",
                "slate-200": "#E2E8F0",
                "tertiary": "#4b1c00",
                "on-primary": "#ffffff",
                "success": "#10B981",
                "error": "#EF4444",
                "inverse-on-surface": "#eaf1ff",
                "outline": "#757682",
                "primary-fixed-dim": "#b6c4ff",
                "surface-container": "#e5eeff",
                "on-primary-container": "#90a8ff",
                "primary-fixed": "#dce1ff",
                "slate-50": "#F8FAFC",
                "on-surface-variant": "#444651",
                "surface-tint": "#4059aa",
                "on-tertiary-fixed-variant": "#773205",
                "surface": "#FFFFFF",
                "tertiary-fixed": "#ffdbcb",
                "surface-container-lowest": "#ffffff",
                "on-error": "#ffffff",
                "on-tertiary-container": "#f39461",
                "on-primary-fixed": "#00164e",
                "tertiary-container": "#6e2c00",
                "on-surface": "#0b1c30",
                "surface-bright": "#f8f9ff",
                "on-secondary-container": "#5c2400",
                "surface-container-high": "#dce9ff",
                "surface-container-highest": "#d3e4fe",
                "surface-container-low": "#eff4ff",
                "error-container": "#ffdad6",
                "secondary": "#9d4300",
                "on-primary-fixed-variant": "#264191",
                "outline-variant": "#c5c5d3",
                "navy-light": "#3B82F6",
                "surface-variant": "#d3e4fe",
                "on-tertiary": "#ffffff",
                "background": "#F8FAFC"
            },
            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px",
                "card": "20px"
            },
            spacing: {
                "stack-sm": "0.5rem",
                "stack-md": "1rem",
                "stack-lg": "2rem",
                "margin-mobile": "1rem",
                "section-gap": "5rem",
                "gutter": "1.5rem",
                "margin-desktop": "2.5rem",
                "container-max": "1280px"
            },
            fontFamily: {
                "body-lg": ["Inter", ...defaultTheme.fontFamily.sans],
                "label-md": ["Inter", ...defaultTheme.fontFamily.sans],
                "headline-lg": ["Montserrat", ...defaultTheme.fontFamily.sans],
                "label-sm": ["Inter", ...defaultTheme.fontFamily.sans],
                "headline-xl": ["Montserrat", ...defaultTheme.fontFamily.sans],
                "headline-lg-mobile": ["Montserrat", ...defaultTheme.fontFamily.sans],
                "headline-sm": ["Montserrat", ...defaultTheme.fontFamily.sans],
                "body-md": ["Inter", ...defaultTheme.fontFamily.sans],
                "body-sm": ["Inter", ...defaultTheme.fontFamily.sans],
                "headline-md": ["Montserrat", ...defaultTheme.fontFamily.sans],
                "sans": ["Inter", ...defaultTheme.fontFamily.sans]
            },
            fontSize: {
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                "headline-lg": ["32px", {"lineHeight": "1.25", "fontWeight": "700"}],
                "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                "headline-xl": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "headline-lg-mobile": ["28px", {"lineHeight": "1.2", "fontWeight": "700"}],
                "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}]
            }
        },
    },

    plugins: [forms],
};
