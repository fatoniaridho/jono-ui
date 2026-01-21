# Jono UI

Reusable UI component library for Laravel & Livewire.

## Features

- Plug & Play
- Livewire Ready
- Modern Design
- Alpine.js Powered
- Semantic Theming
- Modular

## Quickstart

### 1. Installation

```bash
composer require jono/ui
```

### 2. Configure Tailwind

Update tailwind.config.js:

```javascript
import jonoPreset from './vendor/jono/ui/tailwind.preset.js'

export default {
    presets: [jonoPreset],
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/jono/ui/resources/views/**/*.blade.php',
    ],
}
```

### 3. Import Theme

Add to CSS file:

```css
@import '../../vendor/jono/ui/resources/css/jono-ui-theme.css';

@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Changelog

### v2.0.0

- New Semantic Theming System
- New Components: Sidebar, Tabs, Menubar, Avatar, Badge, Spinner, Toaster, Toggle Group
- Automatic Dark Mode support
- Enhanced Button & Input styling

## Components Usage

### Sidebar Layout

```blade
<x-hehe::sidebar.provider>
    <x-hehe::sidebar>
        <x-hehe::sidebar.header>Logo</x-hehe::sidebar.header>
        <x-hehe::sidebar.content>
            <x-hehe::sidebar.menu>
                <x-hehe::sidebar.menu-item>
                    <x-hehe::sidebar.menu-button>Dashboard</x-hehe::sidebar.menu-button>
                </x-hehe::sidebar.menu-item>
            </x-hehe::sidebar.menu>
        </x-hehe::sidebar.content>
    </x-hehe::sidebar>
    <x-hehe::sidebar.inset>
        Main Content
    </x-hehe::sidebar.inset>
</x-hehe::sidebar.provider>
```

### Button

```blade
<x-hehe::button variant="primary">Save</x-hehe::button>
<x-hehe::button variant="secondary">Cancel</x-hehe::button>
<x-hehe::button variant="destructive">Delete</x-hehe::button>
<x-hehe::button variant="outline">View</x-hehe::button>
<x-hehe::button loading>Process</x-hehe::button>
```

### Input

```blade
<x-hehe::form.input label="Email" wire:model="email">
    <x-slot:prepend>@</x-slot:prepend>
</x-hehe::form.input>
```

### Modal

```blade
<x-hehe::modal title="Confirm" modalProperty="showModal">
    Are you sure?
    <x-slot:footer>
        <x-hehe::button wire:click="confirm">Yes</x-hehe::button>
    </x-slot:footer>
</x-hehe::modal>
```

### Dropdown

```blade
<x-hehe::menubar>
    <x-hehe::menubar.menu>
        <x-hehe::menubar.trigger>File</x-hehe::menubar.trigger>
        <x-hehe::menubar.content>
            <x-hehe::menubar.item>New</x-hehe::menubar.item>
            <x-hehe::menubar.separator />
            <x-hehe::menubar.item>Exit</x-hehe::menubar.item>
        </x-hehe::menubar.content>
    </x-hehe::menubar.menu>
</x-hehe::menubar>
```

### Toaster

```blade
<x-hehe::toaster />
```

```javascript
toast('Success', { description: 'Data saved.' })
```

## Customizing Theme

Override CSS variables:

```css
:root {
    --primary: 221.2 83.2% 53.3%;
    --primary-foreground: 210 40% 98%;
    --radius: 0.5rem;
}
```

## License

MIT License
