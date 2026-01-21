@props([
    'type' => 'info',
    'dismissible' => false,
])

@php
    $typeClasses = [
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'error' => 'bg-red-50 border-red-200 text-red-800',
    ];
    
    $classes = 'rounded-lg border p-4 ' . $typeClasses[$type];
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
