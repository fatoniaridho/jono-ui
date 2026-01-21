@props([
    'type' => 'info',
    'dismissible' => false,
])

@php
    $typeClasses = [
        'info' => 'bg-secondary/20 text-secondary-foreground border-secondary/20 [&>svg]:text-secondary-foreground',
        'success' => 'bg-green-50 text-green-900 border-green-200 dark:bg-green-900/10 dark:text-green-300 dark:border-green-900', // Keep specific green for success usually
        'warning' => 'bg-yellow-50 text-yellow-900 border-yellow-200 dark:bg-yellow-900/10 dark:text-yellow-300 dark:border-yellow-900',
        'error' => 'bg-destructive/15 text-destructive border-destructive/50 dark:border-destructive [&>svg]:text-destructive',
    ];
    
    $classes = 'relative w-full rounded-lg border px-4 py-3 text-sm flex gap-3 items-start ' . $typeClasses[$type];
@endphp

<div 
    {{ $attributes->merge(['class' => $classes]) }}
    @if($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition
    @endif
>
    <div class="flex items-start justify-between gap-3">
        <div class="flex-1 text-sm">
            {{ $slot }}
        </div>
        
        @if($dismissible)
            <button 
                type="button"
                @click="show = false"
                class="flex-shrink-0 text-current opacity-50 hover:opacity-100 transition-opacity"
            >
                <x-dynamic-component component="flux::icon.x-mark" class="size-4" />
            </button>
        @endif
    </div>
</div>
