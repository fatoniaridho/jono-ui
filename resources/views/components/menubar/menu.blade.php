@props(['value' => null])

@php
    $id = $value ?? uniqid('menu-');
@endphp

<div 
    x-data="{ 
        id: '{{ $id }}',
        get isOpen() { return activeMenu === this.id },
        toggle() { 
            if (activeMenu === this.id) {
                clearActive()
            } else {
                setActive(this.id) 
            }
        },
        open() { setActive(this.id) },
        close() { if(activeMenu === this.id) clearActive() }
    }"
    class="relative"
    @keydown.escape.window="close()"
    @click.outside="close()"
>
    {{ $slot }}
</div>
