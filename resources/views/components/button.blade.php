@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, danger, ghost
    'size' => 'md', // sm, md, lg
    'href' => null,
])

@php
$baseClasses = 'cursor-pointer inline-flex transition-background duration-200 items-center justify-center font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed border';

$variants = [
    'primary' => 'bg-button-primary hover:saturate-150 text-button-primary-text focus:ring-accent shadow-brand  border-transparent hover:border-default',
    'secondary' => 'bg-button-secondary hover:bg-button-secondary/90 text-primary focus:ring-accent shadow-sm  border-default hover:border-primary/50',
    'danger' => 'bg-button-danger hover:bg-button-danger/90 text-white focus:ring-accent shadow-sm',
    'ghost' => 'bg-transparent hover:bg-card-hover text-primary focus:ring-accent',
    'outline' => 'border-2 border-button-outline hover:bg-button-outline/90 text-button-outline hover:text-white focus:ring-accent',
];

$sizes = [
    'sm' => 'px-3 py-1.5 text-sm rounded-md',
    'md' => 'px-4 py-2 text-base rounded-lg',
    'lg' => 'px-6 py-3 text-lg rounded-lg',
];

$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

