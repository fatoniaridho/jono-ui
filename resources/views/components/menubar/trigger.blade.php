<button 
    @click="toggle()"
    @mouseover="if(activeMenu !== null) open()"
    :class="{ 'bg-accent text-accent-foreground': isOpen }"
    {{ $attributes->merge(['class' => 'flex cursor-default select-none items-center rounded-sm px-3 py-1.5 text-sm font-medium outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground']) }}
>
    {{ $slot }}
</button>
