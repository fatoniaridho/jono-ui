@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'type' => 'button',
    'href' => null,
    'loading' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold transition-all focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $variantClasses = [
        'primary' => 'bg-[#164B4D] text-white shadow-sm hover:bg-[#123d3f] focus:ring-[#164B4D] disabled:opacity-50 disabled:cursor-not-allowed',
        'secondary' => 'bg-[#FDCF01] text-zinc-900 shadow-sm hover:bg-[#e4ba01] focus:ring-[#FDCF01] disabled:opacity-50 disabled:cursor-not-allowed',
        'black' => 'bg-zinc-900 text-white shadow-sm hover:bg-zinc-800 focus:ring-zinc-900 disabled:opacity-50 disabled:cursor-not-allowed',
        'white' => 'border border-zinc-300 bg-white text-zinc-700 shadow-sm hover:bg-zinc-50 focus:ring-zinc-500 disabled:opacity-50 disabled:cursor-not-allowed',
        'danger' => 'bg-red-600 text-white shadow-sm hover:bg-red-500 focus:ring-red-600 disabled:opacity-50 disabled:cursor-not-allowed',
    ];
    
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-xs rounded-lg',
        'md' => 'px-4 py-2 text-sm rounded-lg',
        'lg' => 'px-6 py-3 text-base rounded-lg',
        'icon' => 'p-2 rounded-lg',
    ];
    
    $iconSizes = [
        'sm' => 'size-3',
        'md' => 'size-4',
        'lg' => 'size-5',
        'icon' => 'size-5',
    ];
    
    $classes = $baseClasses . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <x-dynamic-component :component="'flux::icon.'.$icon" :class="$iconSizes[$size]" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $iconPosition === 'right')
            <x-dynamic-component :component="'flux::icon.'.$icon" :class="$iconSizes[$size]" />
        @endif
    </a>
@else
    <button 
        type="{{ $type }}" 
        {{ $attributes->merge(['class' => $classes]) }}
        @if($loading) disabled @endif
    >
        @if($icon && $iconPosition === 'left')
            <x-dynamic-component :component="'flux::icon.'.$icon" :class="$iconSizes[$size]" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $iconPosition === 'right')
            <x-dynamic-component :component="'flux::icon.'.$icon" :class="$iconSizes[$size]" />
        @endif
    </button>
@endif
