@props([
    'active' => false,
    'href' => '#',
])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-accent text-sm font-medium text-primary transition-colors duration-200'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-muted hover:text-accent hover:border-accent transition-colors duration-200';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

