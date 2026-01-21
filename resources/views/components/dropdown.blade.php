@props([
    'open' => false,
])

<div 
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    x-on:keydown.escape.window="open = false"
    class="relative inline-block text-left"
>
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div 
        x-show="open"
        x-on:click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        x-cloak
        style="display: none;"
        {{ $attributes->merge(['class' => 'absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none']) }}
    >
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>
