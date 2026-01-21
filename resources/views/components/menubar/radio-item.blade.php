@props(['value', 'model', 'disabled' => false])

<div 
    {{ $attributes->merge([
        'class' => 'relative flex cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent hover:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 ' . 
        ($disabled ? 'opacity-50 pointer-events-none' : '')
    ]) }}
    @if(isset($value) && isset($model) && $value === $model) data-checked="true" @endif
>
    <!-- Radio Dot Wrapper -->
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        @if(isset($value) && isset($model) && $value === $model)
            <div class="h-2 w-2 rounded-full bg-current"></div>
        @endif
    </span>
    
    {{ $slot }}
</div>
