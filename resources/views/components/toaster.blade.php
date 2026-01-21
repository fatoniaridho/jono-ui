@props([
    'position' => 'bottom-right', // top-left, top-center, top-right, bottom-left, bottom-center, bottom-right
    'expand' => false,
])

<div 
    x-data="toaster"
    x-on:toast.window="add($event.detail)"
    class="fixed z-[100] flex flex-col gap-2 w-full max-w-[356px] p-4 pointer-events-none sm:p-6 {{ $position === 'top-center' || $position === 'bottom-center' ? 'left-1/2 -translate-x-1/2' : '' }} {{ str_contains($position, 'top') ? 'top-0' : 'bottom-0' }} {{ str_contains($position, 'left') ? 'left-0' : (str_contains($position, 'right') ? 'right-0' : '') }}"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 scale-100"
            x-transition:leave="transform ease-in duration-200 transition"
            x-transition:leave-start="translate-y-0 opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95 {{ str_contains($position, 'bottom') ? 'translate-y-2' : '-translate-y-2' }}"
            class="pointer-events-auto relative flex w-full items-center gap-4 overflow-hidden rounded-lg border border-border bg-background p-4 shadow-lg ring-1 ring-black/5"
            :class="{
                'bg-red-50 dark:bg-red-900/10 border-red-200 dark:border-red-900': toast.type === 'error',
                'bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-900': toast.type === 'success',
                'bg-yellow-50 dark:bg-yellow-900/10 border-yellow-200 dark:border-yellow-900': toast.type === 'warning',
                'bg-blue-50 dark:bg-blue-900/10 border-blue-200 dark:border-blue-900': toast.type === 'info'
            }"
        >
            <!-- Icons -->
            <div x-show="toast.type !== 'default'" class="shrink-0">
                <template x-if="toast.type === 'success'">
                     <x-dynamic-component :component="'flux::icon.check-circle'" class="size-5 text-green-600 dark:text-green-500" />
                </template>
                <template x-if="toast.type === 'error'">
                     <x-dynamic-component :component="'flux::icon.x-circle'" class="size-5 text-destructive" />
                </template>
                 <template x-if="toast.type === 'warning'">
                     <x-dynamic-component :component="'flux::icon.exclamation-triangle'" class="size-5 text-yellow-600 dark:text-yellow-500" />
                </template>
                <template x-if="toast.type === 'info'">
                     <x-dynamic-component :component="'flux::icon.information-circle'" class="size-5 text-blue-600 dark:text-blue-500" />
                </template>
                 <template x-if="toast.type === 'loading'">
                     <x-hehe::spinner class="size-5 text-muted-foreground" />
                </template>
            </div>

            <div class="flex-1 space-y-1">
                <p class="text-sm font-semibold text-foreground" x-text="toast.message"></p>
                <p x-show="toast.description" class="text-xs text-muted-foreground" x-text="toast.description"></p>
            </div>

            <!-- Action -->
            <template x-if="toast.action">
                <button 
                    @click="toast.action.onClick"
                    class="inline-flex h-8 items-center justify-center rounded-md border border-input bg-transparent px-3 text-xs font-medium shadow-sm transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
                    x-text="toast.action.label"
                ></button>
            </template>
            
            <!-- Close Button -->
            <button @click="remove(toast.id)" class="absolute right-2 top-2 rounded-md p-1 opacity-0 transition-opacity hover:text-foreground focus:opacity-100 focus:outline-none focus:ring-1 group-hover:opacity-100">
                <x-dynamic-component :component="'flux::icon.x-mark'" class="size-4" />
            </button>
        </div>
    </template>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('toaster', () => ({
        toasts: [],
        add(toast) {
            const id = Date.now();
            const newToast = {
                id,
                type: 'default', // default, success, error, warning, info, loading
                message: toast.message || toast,
                description: toast.description || null,
                duration: toast.duration || 4000,
                action: toast.action || null,
                ...toast
            };
            
            this.toasts.push(newToast);

            if (newToast.duration !== Infinity) {
                setTimeout(() => {
                    this.remove(id);
                }, newToast.duration);
            }
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }));
    
    // Global helper
    window.toast = (message, options = {}) => {
        window.dispatchEvent(new CustomEvent('toast', {
            detail: { message, ...options }
        }));
    };
    
    window.toast.success = (message, options = {}) => window.toast(message, { type: 'success', ...options });
    window.toast.error = (message, options = {}) => window.toast(message, { type: 'error', ...options });
    window.toast.warning = (message, options = {}) => window.toast(message, { type: 'warning', ...options });
    window.toast.info = (message, options = {}) => window.toast(message, { type: 'info', ...options });
    window.toast.loading = (message, options = {}) => window.toast(message, { type: 'loading', duration: Infinity, ...options });
});
</script>
