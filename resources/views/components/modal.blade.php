@props(['show' => false, 'title' => 'Title', 'maxWidth' => '2xl', 'modalProperty' => 'showModal'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
        '6xl' => 'sm:max-w-6xl',
        '7xl' => 'sm:max-w-7xl',
    ][$maxWidth];
@endphp

<div x-data="{ open: @entangle($modalProperty) }" 
     x-show="open" 
     x-cloak 
     style="display: none;"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" 
     role="dialog" 
     aria-modal="true">
    
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-zinc-900/75 backdrop-blur-sm" 
         aria-hidden="true"
         @click="open = false"></div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative w-full {{ $maxWidth }} transform overflow-hidden rounded-xl bg-white text-left shadow-xl flex flex-col max-h-[90vh]">
        
        <div class="p-6 border-b border-zinc-200 flex justify-between items-center bg-zinc-50 shrink-0">
            <h3 class="text-lg font-bold text-zinc-900 flex items-center gap-2">
                {{ $title }}
            </h3>
            <button type="button"
                class="rounded-md bg-transparent text-zinc-400 hover:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                @click="open = false">
                <span class="sr-only">Close</span>
                <x-dynamic-component :component="'flux::icon.x-mark'" class="size-6" />
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-6 custom-scrollbar">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="p-6 border-t border-zinc-200 bg-zinc-50 flex justify-end gap-3 shrink-0">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
