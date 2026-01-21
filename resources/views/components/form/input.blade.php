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
    
    <div class="relative">
        @if(isset($prepend))
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-muted-foreground pointer-events-none">
                {{ $prepend }}
            </div>
        @endif

        <input 
            {{ $attributes->merge([
                'class' => ($disabled 
                    ? 'flex h-10 w-full rounded-md border border-input bg-muted px-3 py-2 text-sm ring-offset-background cursor-not-allowed opacity-50'
                    : 'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50') 
                    . (isset($prepend) ? ' pl-10' : '') 
                    . (isset($append) ? ' pr-10' : '')
            ])->except(['label', 'error', 'hint', 'required']) }}
            @if($disabled) disabled @endif
        >

        @if(isset($append))
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-muted-foreground pointer-events-none">
                {{ $append }}
            </div>
        @endif
    </div>
    
    @if($hint)
        <p class="text-[10px] text-zinc-400">{{ $hint }}</p>
    @endif
    
    @if($error)
        <span class="text-xs text-red-500">{{ $error }}</span>
    @endif
</div>
