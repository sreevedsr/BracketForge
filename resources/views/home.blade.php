<x-app-layout>

    {{-- HERO --}}
    <section
        class="relative min-h-[85vh] flex items-center justify-center overflow-hidden"
        style="background-image: url('{{ asset('images/landing/banner.jpg') }}'); background-size: cover; background-position: center;"
    >
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 max-w-4xl px-6 text-center text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight">
                Run Tournaments.<br class="hidden sm:block">
                Like the Pros.
            </h1>

            <p class="mt-6 text-base sm:text-lg text-white/80">
                From local leagues to knockout finals — create, manage,
                and showcase tournaments with confidence.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a
                    href="{{ route('tournaments.index') }}"
                    class="px-8 py-4 bg-primary text-primary-foreground
                           rounded-xl text-lg font-semibold shadow-xl
                           hover:opacity-90 transition"
                >
                    Browse Tournaments
                </a>

                @auth
                    <a
                        href="{{ route('tournaments.create') }}"
                        class="px-8 py-4 bg-white/10 backdrop-blur
                               border border-white/20 rounded-xl
                               text-lg font-semibold hover:bg-white/20 transition"
                    >
                        Create Tournament
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- FEATURE STRIP --}}
    <section class="bg-background py-20">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="text-center">
                <div class="text-4xl mb-4">🏆</div>
                <h3 class="text-xl font-semibold mb-2">
                    Competitive Formats
                </h3>
                <p class="text-muted-foreground">
                    League, knockout, round-robin, or hybrid formats built for real competition.
                </p>
            </div>

            <div class="text-center">
                <div class="text-4xl mb-4">📊</div>
                <h3 class="text-xl font-semibold mb-2">
                    Live Standings & Results
                </h3>
                <p class="text-muted-foreground">
                    Clean tables, clear brackets, and results that speak for themselves.
                </p>
            </div>

            <div class="text-center">
                <div class="text-4xl mb-4">🔒</div>
                <h3 class="text-xl font-semibold mb-2">
                    Controlled Access
                </h3>
                <p class="text-muted-foreground">
                    Invite-only tournaments or public showcases — you decide who sees what.
                </p>
            </div>

        </div>
    </section>

    {{-- VISUAL BREAK --}}
    <section
        class="relative h-[60vh]"
        style="background-image: url('{{ asset('images/landing/banner2.jpg') }}'); background-size: cover; background-position: center;"
    >
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-center text-white px-6">
            <h2 class="text-3xl sm:text-4xl font-bold">
                Every Match Matters
            </h2>
            <p class="mt-3 text-white/80">
                Designed for tournaments that deserve to be remembered.
            </p>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="bg-muted py-20">
        <div class="max-w-3xl mx-auto text-center px-6">
            <h2 class="text-3xl sm:text-4xl font-bold">
                Explore What’s Live
            </h2>

            <p class="mt-4 text-muted-foreground">
                Discover ongoing tournaments, results, and standings —
                no account required.
            </p>

            <a
                href="{{ route('tournaments.index') }}"
                class="inline-block mt-8 px-10 py-4 bg-primary text-primary-foreground
                       rounded-xl text-lg font-semibold shadow-lg hover:opacity-90 transition"
            >
                Browse Tournaments
            </a>
        </div>
    </section>

</x-app-layout>
