<a
    {{ $attributes->merge([
        'class' =>
            'block w-full px-4 py-2 text-start text-sm
             text-muted-foreground
             hover:bg-muted hover:text-foreground
             focus:outline-none focus:bg-muted
             transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</a>
