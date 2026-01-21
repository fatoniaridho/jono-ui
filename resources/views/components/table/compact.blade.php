@props([
    'headers' => [],
    'compact' => true,
])

<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full text-[13px] border-collapse']) }}>
        @if(!empty($headers))
            <thead>
                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                    @foreach($headers as $header)
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground {{ $compact ? 'py-2' : 'py-4' }}">
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
