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
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50';
    
    // Semantic mappings matching tailwind.preset.js
    $variantClasses = [
        'primary' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
        'outline' => 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'danger' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
        'link' => 'text-primary underline-offset-4 hover:underline',
        
        // Backward compatibility
        'white' => 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground', // Maps to outline
        'black' => 'bg-slate-950 text-white shadow hover:bg-slate-950/90 dark:bg-slate-50 dark:text-slate-900 dark:hover:bg-slate-50/90',
    ];
    
    $sizeClasses = [
        'sm' => 'h-8 px-3 text-xs rounded-md',
        'md' => 'h-9 px-4 py-2 text-sm rounded-md',
        'lg' => 'h-10 px-8 text-base rounded-md',
        'icon' => 'h-9 w-9 p-0',
    ];
    
    $iconSizes = [
        'sm' => 'size-3.5',
        'md' => 'size-4',
        'lg' => 'size-5',
        'icon' => 'size-4',
    ];
    
    $classes = $baseClasses . ' ' . ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . $sizeClasses[$size];
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
