@props(['active' => false])

@php
    $classes = $active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary
       text-sm font-medium leading-5 text-foreground
       transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent
       text-sm font-medium leading-5 text-muted-foreground
       hover:text-foreground hover:border-border
       transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
