<div {{ $attributes->merge(['class' => 'flex h-[450px] shrink-0 items-center justify-center rounded-md border border-dashed border-border']) }}>
    <div class="mx-auto flex max-w-[420px] flex-col items-center justify-center text-center">
        {{ $slot }}
    </div>
</div>
