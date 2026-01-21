@props([
    'collapsible' => 'offcanvas',
    'side' => 'left',
    'variant' => 'sidebar',
])

<div
    data-slot="sidebar"
    {{ $attributes->merge(['class' => 'group/sidebar-wrapper flex min-h-svh w-full has-[[data-variant=inset]]:bg-sidebar']) }}
    style="--sidebar-width: 16rem; --sidebar-width-icon: 3rem;"
>
    <!-- Desktop Sidebar -->
    <div
        class="hidden md:flex flex-col gap-2 bg-sidebar text-sidebar-foreground w-[--sidebar-width] border-r border-sidebar-border transition-[width] duration-200 ease-linear group-data-[side=right]/sidebar-wrapper:border-l group-data-[side=right]/sidebar-wrapper:border-r-0"
    >
        <div class="flex flex-col h-full w-full">
            {{ $slot }}
        </div>
    </div>

    <!-- Mobile Sidebar (Simple Overlay) -->
    <div x-show="openMobile" class="fixed inset-0 z-50 bg-black/80 md:hidden" @click="setOpenMobile(false)"></div>
    <div 
        x-show="openMobile"
        class="fixed inset-y-0 left-0 z-50 w-[--sidebar-width] border-r bg-sidebar p-4 transition-transform md:hidden"
    >
         {{ $slot }}
    </div>
</div>
