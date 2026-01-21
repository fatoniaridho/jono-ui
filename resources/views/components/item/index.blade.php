@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'bg-background hover:bg-accent hover:text-accent-foreground',
        'muted' => 'bg-muted text-muted-foreground',
    ];
    
    $classes = 'relative flex w-full items-center gap-4 rounded-lg border border-border p-4 transition-colors ' . ($variants[$variant] ?? $variants['default']);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
