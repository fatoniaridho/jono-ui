@props(['disabled' => false, 'inset' => false])

<div 
    {{ $attributes->merge([
        'class' => 'relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent hover:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 ' . 
        ($inset ? 'pl-8' : '') . ' ' .
        ($disabled ? 'opacity-50 pointer-events-none' : '')
    ]) }}
>
    {{ $slot }}
</div>
