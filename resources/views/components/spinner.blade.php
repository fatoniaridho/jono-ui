@props([
    'size' => 'md',
    'class' => '',
])

@php
    $sizes = [
        'sm' => 'h-4 w-4',
        'md' => 'h-6 w-6',
        'lg' => 'h-8 w-8',
        'xl' => 'h-12 w-12',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<svg 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 24 24" 
    fill="none" 
    stroke="currentColor" 
    stroke-width="2" 
    stroke-linecap="round" 
    stroke-linejoin="round" 
    {{ $attributes->merge(['class' => 'animate-spin ' . $sizeClass . ' ' . $class]) }}
>
    <path d="M21 12a9 9 0 1 1-6.219-8.56" />
</svg>
