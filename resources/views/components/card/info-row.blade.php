@props([
    'label' => '',
    'value' => '',
    'labelWidth' => 'w-32',
])

<div {{ $attributes->merge(['class' => 'flex py-1 mb-2 text-[13px]']) }}>
    <div class="{{ $labelWidth }} font-semibold text-zinc-700">{{ $label }}</div>
    <div class="flex-1 text-zinc-900 border-b border-zinc-200 pb-1">{{ $value }}</div>
</div>
