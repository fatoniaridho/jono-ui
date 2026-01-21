<div class="p-4">
    <h3 class="text-sm font-semibold mb-2">Radio Group Demo</h3>
    <div x-data="{ value: 'benoit' }">
        <div class="flex flex-col gap-1">
            <x-hehe::menubar.radio-item value="andy" :model="'value'" @click="value = 'andy'">Andy</x-hehe::menubar.radio-item>
            <x-hehe::menubar.radio-item value="benoit" :model="'value'" @click="value = 'benoit'">Benoit</x-hehe::menubar.radio-item>
            <x-hehe::menubar.radio-item value="luis" :model="'value'" @click="value = 'luis'">Luis</x-hehe::menubar.radio-item>
        </div>
        <p class="mt-2 text-xs text-muted-foreground">Selected: <span x-text="value"></span></p>
    </div>
</div>
