<button
  data-sidebar="trigger"
  @click="toggleSidebar()"
  {{ $attributes->merge(['class' => 'h-7 w-7 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground rounded-md p-1']) }}
>
  <x-dynamic-component :component="'flux::icon.bars-3-bottom-left'" class="size-4" />
  <span class="sr-only">Toggle Sidebar</span>
</button>
