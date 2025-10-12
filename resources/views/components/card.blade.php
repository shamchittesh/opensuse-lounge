@props([
    'title' => null,
    'padding' => true,
])

<div class="bg-card backdrop-blur-sm rounded-xl border border-default overflow-hidden">
    @if($title)
        <div class="px-6 py-4 border-b border-default">
            <h3 class="text-lg font-semibold text-primary">{{ $title }}</h3>
        </div>
    @endif
    
    <div {{ $attributes->merge(['class' => $padding ? 'p-6' : '']) }}>
        {{ $slot }}
    </div>
</div>

