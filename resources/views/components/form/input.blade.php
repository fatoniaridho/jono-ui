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
    
    <input 
        {{ $attributes->merge([
            'class' => $disabled 
                ? 'w-full rounded-lg border border-zinc-300 bg-zinc-50 px-3 py-2 text-sm text-zinc-500 cursor-not-allowed outline-none'
                : 'w-full rounded-lg border border-zinc-300 ring-1 ring-zinc-200 bg-white px-3 py-2 text-sm outline-none focus:border-zinc-500 focus:ring-1 focus:ring-zinc-500 transition-shadow'
        ])->except(['label', 'error', 'hint', 'required']) }}
        @if($disabled) disabled @endif
    >
    
    @if($hint)
        <p class="text-[10px] text-zinc-400">{{ $hint }}</p>
    @endif
    
    @if($error)
        <span class="text-xs text-red-500">{{ $error }}</span>
    @endif
</div>
