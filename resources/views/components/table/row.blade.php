@props([
    'compact' => true,
])

<tr {{ $attributes->merge(['class' => 'border-b border-zinc-200 hover:bg-zinc-50 transition-colors']) }}>
    {{ $slot }}
</tr>
