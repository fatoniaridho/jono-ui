@props([
    'headers' => [],
    'compact' => true,
])

<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full text-[13px] border-collapse']) }}>
        @if(!empty($headers))
            <thead>
                <tr class="border-b border-zinc-300 bg-zinc-50">
                    @foreach($headers as $header)
                        <th class="text-left {{ $compact ? 'px-2 py-1.5' : 'px-4 py-3' }} font-semibold text-zinc-700">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
