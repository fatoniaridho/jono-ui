@props(['value'])

<button
    type="button"
    @click="toggle('{{ $value }}')"
    :data-state="value === '{{ $value }}' ? 'on' : 'off'"
    :class="{ 'bg-accent text-accent-foreground': value === '{{ $value }}', 'hover:bg-muted hover:text-muted-foreground': value !== '{{ $value }}' }"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-9 px-3']) }}
>
    {{ $slot }}
</button>
