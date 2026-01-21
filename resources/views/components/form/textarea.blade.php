@props([
    'label' => null,
    'error' => null,
    'hint' => null,
    'required' => false,
    'disabled' => false,
])

<div class="space-y-2">
    @if($label)
        <label {{ $attributes->only('for') }} class="block text-xs font-medium text-zinc-500 uppercase tracking-wider">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <textarea
        {{ $attributes->merge([
            'class' => $disabled 
                ? 'flex min-h-[80px] w-full rounded-md border border-input bg-muted px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50'
                : 'flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
            'rows' => 3
        ])->except(['label', 'error', 'hint', 'required']) }}
        @if($disabled) disabled @endif
    >{{ $slot }}</textarea>
    
    @if($hint)
        <p class="text-[10px] text-zinc-400">{{ $hint }}</p>
    @endif
    
    @if($error)
        <span class="text-xs text-red-500">{{ $error }}</span>
    @endif
</div>
