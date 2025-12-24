@if (session('success') || session('error') || $errors->any())
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-3 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="fixed top-4 right-4 z-50 space-y-3 max-w-sm w-full"
    >
        {{-- Success --}}
        @if (session('success'))
            <div
                class="bg-card text-card-foreground border border-border rounded-xl shadow-xl p-4 flex items-start gap-3"
            >
                <div class="flex h-6 w-6 items-center justify-center rounded-full bg-primary/10 text-primary">
                    ✓
                </div>

                <div class="flex-1 text-sm leading-relaxed">
                    {{ session('success') }}
                </div>

                <button
                    @click="show = false"
                    class="text-muted-foreground hover:text-foreground transition"
                >
                    ✕
                </button>
            </div>
        @endif

        {{-- Error --}}
        @if (session('error'))
            <div
                class="bg-card text-card-foreground border border-destructive rounded-xl shadow-xl p-4 flex items-start gap-3"
            >
                <div class="flex h-6 w-6 items-center justify-center rounded-full bg-destructive/10 text-destructive">
                    !
                </div>

                <div class="flex-1 text-sm leading-relaxed">
                    {{ session('error') }}
                </div>

                <button
                    @click="show = false"
                    class="text-muted-foreground hover:text-foreground transition"
                >
                    ✕
                </button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div
                class="bg-card text-card-foreground border border-destructive rounded-xl shadow-xl p-4"
            >
                <p class="font-semibold text-sm mb-2">
                    Something went wrong
                </p>

                <ul class="list-disc list-inside text-sm text-muted-foreground space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button
                    @click="show = false"
                    class="mt-3 inline-flex items-center text-sm font-medium text-primary hover:underline"
                >
                    Dismiss
                </button>
            </div>
        @endif
    </div>
@endif
