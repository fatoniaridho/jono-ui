<div 
    x-data="{ 
        activeMenu: null,
        setActive(id) {
            this.activeMenu = id;
        },
        clearActive() {
            this.activeMenu = null;
        }
    }"
    {{ $attributes->merge(['class' => 'flex h-10 items-center space-x-1 rounded-md border border-border bg-background p-1']) }}
>
    {{ $slot }}
</div>
