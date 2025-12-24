<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BracketForge') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Dark mode init (runs before paint) -->
    <script>
        (() => {
            const theme = localStorage.getItem('theme');
            if (
                theme === 'dark' ||
                (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)
            ) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-background text-foreground">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

        {{-- LEFT: Brand (Desktop only) --}}
        <div
            class="hidden lg:flex flex-col justify-center px-20
           bg-gradient-to-br from-primary/80 via-secondary/70 to-primary/60
           text-white">

            <div class="space-y-6 max-w-md">

                <span class="text-xs tracking-widest uppercase opacity-80">
                    {{ $brand ?? config('app.name') }}
                </span>

                <h1 class="text-4xl font-semibold leading-tight tracking-tight">
                    {{ $title ?? 'Welcome to BracketForge' }}
                </h1>

                <p class="text-sm leading-relaxed text-white/80">
                    {{ $description ?? 'Create and manage tournaments with clarity and control.' }}
                </p>

                <div class="h-0.5 w-12 bg-white/40 rounded-full"></div>
            </div>
        </div>


        {{-- RIGHT: Auth Area --}}
        <div class="flex flex-col justify-center px-6 py-10 bg-background">

            {{-- Mobile Brand Header --}}
            <div class="lg:hidden text-center mb-8 space-y-2">
                <h1 class="text-2xl font-semibold tracking-tight">
                    {{ config('app.name') }}
                </h1>
                <p class="text-sm text-muted-foreground">
                    Secure access to your account
                </p>
            </div>

            {{-- Dark Mode Toggle --}}
            <div class="absolute top-4 right-4">
                <button type="button" aria-label="Toggle dark mode" onclick="toggleTheme()"
                    class="rounded-full border border-border bg-card p-2 text-muted-foreground
                           hover:text-foreground transition">
                    <span id="theme-icon">🌙</span>
                </button>
            </div>

            <div class="mx-auto w-full max-w-md">

                {{-- Logo --}}
                <div class="hidden lg:flex justify-center mb-6">
                    <a href="/">
                        <x-application-logo class="h-14 w-14 text-muted-foreground" />
                    </a>
                </div>

                {{-- Auth Card --}}
                <div
                    class="bg-card text-card-foreground
                           rounded-2xl shadow-xl border border-border
                           px-6 py-8">

                    {{ $slot }}

                </div>
            </div>
        </div>

    </div>

    {{-- Dark Mode Toggle Script --}}
    <script>
        function toggleTheme() {
            const root = document.documentElement;
            const isDark = root.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateThemeIcon();
        }

        function updateThemeIcon() {
            const icon = document.getElementById('theme-icon');
            const isDark = document.documentElement.classList.contains('dark');
            icon.textContent = isDark ? '☀️' : '🌙';
        }

        updateThemeIcon();
    </script>
</body>

</html>
