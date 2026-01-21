<div 
    @mouseover="openMenu()"
    @click="toggle()"
    :class="{ 'bg-accent text-accent-foreground': open }"
    {{ $attributes->merge(['class' => 'flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground']) }}
>
    {{ $slot }}
    <x-dynamic-component :component="'flux::icon.chevron-right'" class="ml-auto h-4 w-4" />
</div>
