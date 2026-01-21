@props([
    'label' => null,
    'error' => null,
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'placeholder' => 'Pilih...',
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
        <select
            {{ $attributes->merge([
                'class' => $disabled 
                    ? 'flex h-10 w-full items-center justify-between rounded-md border border-input bg-muted px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50'
                    : 'flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 appearance-none'
            ])->except(['label', 'error', 'hint', 'required', 'placeholder']) }}
            @if($disabled) disabled @endif
        >
            <option value="" disabled selected hidden>{{ $placeholder }}</option>
            {{ $slot }}
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted-foreground">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-50"><path d="m6 9 6 6 6-6"/></svg>
        </div>
    </div>
    
    @if($hint)
        <p class="text-[10px] text-zinc-400">{{ $hint }}</p>
    @endif
    
    @if($error)
        <span class="text-xs text-red-500">{{ $error }}</span>
    @endif
</div>
