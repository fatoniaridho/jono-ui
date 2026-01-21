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
        {{ $attributes->merge(['class' => 'absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md border border-border bg-popover p-1 text-popover-foreground shadow-md outline-none data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2']) }}
    >
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>
