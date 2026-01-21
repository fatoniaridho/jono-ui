@props([
    'collapsible' => 'offcanvas', // 'offcanvas' | 'icon' | 'none'
    'side' => 'left',
    'variant' => 'sidebar', // 'sidebar' | 'floating' | 'inset'
])

<div 
    x-data="{
        state: 'expanded',
        open: true,
        openMobile: false,
        setOpen(value) { this.open = value; this.state = value ? 'expanded' : 'collapsed'; },
        setOpenMobile(value) { this.openMobile = value; },
        toggleSidebar() { this.open = !this.open; this.state = this.open ? 'expanded' : 'collapsed'; }
    }"
    style="--sidebar-width: 16rem; --sidebar-width-icon: 3rem;"
    class="group/sidebar-wrapper flex min-h-svh w-full has-[[data-variant=inset]]:bg-sidebar"
>
    {{ $slot }}
</div>
