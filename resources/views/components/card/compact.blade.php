@props([
    'title' => null,
    'icon' => null,
    'padding' => 'p-5',
])

<div {{ $attributes->merge(['class' => 'rounded-lg border border-border bg-card text-card-foreground shadow-sm ' . $padding]) }}>
    @if($title)
        <div class="flex flex-col space-y-1.5 pb-4 mb-4 border-b border-border">
            <h3 class="font-semibold leading-none tracking-tight flex items-center gap-2">
                @if($icon)
                    <flux:icon.{{ $icon }} class="size-4 text-muted-foreground" />
                @endif
                {{ $title }}
            </h3>
        </div>
    @endif
    
    {{ $slot }}
</div>
