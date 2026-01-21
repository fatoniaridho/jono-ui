@props(['value'])

<button
    @click="changeTab('{{ $value }}')"
    :data-state="selected === '{{ $value }}' ? 'active' : 'inactive'"
    :class="{ 'bg-background text-foreground shadow': selected === '{{ $value }}' }"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50']) }}
>
    {{ $slot }}
</button>
