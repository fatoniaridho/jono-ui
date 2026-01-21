@props(['defaultValue'])

<div 
    x-data="{ 
        selected: '{{ $defaultValue }}',
        changeTab(value) {
            this.selected = value;
        }
    }"
    {{ $attributes->merge(['class' => 'w-full']) }}
>
    {{ $slot }}
</div>
