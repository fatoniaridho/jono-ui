@props(['checked' => false, 'disabled' => false])

<div 
    {{ $attributes->merge([
        'class' => 'relative flex cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent hover:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 ' . 
        ($disabled ? 'opacity-50 pointer-events-none' : '')
    ]) }}
>
    <!-- Check Icon Wrapper -->
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        @if($checked)
            <x-dynamic-component :component="'flux::icon.check'" class="size-4" />
        @endif
    </span>
    
    {{ $slot }}
</div>
