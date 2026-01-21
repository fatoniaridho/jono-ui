<div 
    x-data="{ 
        open: false,
        toggle() { this.open = !this.open },
        openMenu() { this.open = true },
        closeMenu() { this.open = false }
    }"
    class="relative"
    @mouseleave="closeMenu()"
>
    {{ $slot }}
</div>
