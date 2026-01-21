@props([
    'type' => 'single', // 'single' | 'multiple'
    'defaultValue' => null,
])

<div 
    x-data="{ 
        value: '{{ $defaultValue }}',
        toggle(val) {
           this.value = val;
        }
    }"
    {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }}
>
    {{ $slot }}
</div>
