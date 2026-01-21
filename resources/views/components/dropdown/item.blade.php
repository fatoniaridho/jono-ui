@props([
    'href' => null,
    'active' => false,
])

@php
    $classes = $active
        ? 'block w-full text-left px-4 py-2 text-sm text-zinc-900 bg-zinc-50'
        : 'block w-full text-left px-4 py-2 text-sm text-zinc-700 hover:bg-zinc-50 transition-colors';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}>
        {{ $slot }}
    </button>
@endif
