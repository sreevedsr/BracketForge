import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                // Base
                background: 'hsl(var(--background))',
                foreground: 'hsl(var(--foreground))',

                // Surfaces
                card: 'hsl(var(--card))',
                'card-foreground': 'hsl(var(--card-foreground))',

                popover: 'hsl(var(--popover))',
                'popover-foreground': 'hsl(var(--popover-foreground))',

                // Primary action
                primary: 'hsl(var(--primary))',
                'primary-foreground': 'hsl(var(--primary-foreground))',

                // Secondary / subtle
                secondary: 'hsl(var(--secondary))',
                'secondary-foreground': 'hsl(var(--secondary-foreground))',

                muted: 'hsl(var(--muted))',
                'muted-foreground': 'hsl(var(--muted-foreground))',

                // Status
                destructive: 'hsl(var(--destructive))',
                'destructive-foreground': 'hsl(var(--destructive-foreground))',

                // Borders & inputs
                border: 'hsl(var(--border))',
                input: 'hsl(var(--input))',
                ring: 'hsl(var(--ring))',
            },
        },
    },

    plugins: [forms],
}
