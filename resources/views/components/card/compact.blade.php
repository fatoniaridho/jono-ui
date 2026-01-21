@props([
    'title' => null,
    'icon' => null,
    'padding' => 'p-5',
])

<div {{ $attributes->merge(['class' => 'bg-white/80 backdrop-blur-sm rounded-lg border border-black/5 shadow-lg mb-12 ' . $padding]) }}>
    @if($title)
        <div class="border-b border-zinc-200 pb-3 mb-3">
            <h3 class="text-[13px] font-semibold text-zinc-900 flex items-center gap-2">
                @if($icon)
                    <flux:icon.{{ $icon }} class="size-4 text-zinc-500" />
                @endif
                {{ $title }}
            </h3>
        </div>
    @endif
    
    {{ $slot }}
</div>
