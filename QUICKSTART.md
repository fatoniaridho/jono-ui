# Quick Start Guide

## Installation

```bash
composer require jono/ui
```

## Setup (Crucial for v2.0+)

Since v2.0, Jono UI uses a Semantic Theming system. You must configure Tailwind to use the provided preset.

### 1. Configure Tailwind

Update `tailwind.config.js`:

```javascript
import jonoPreset from './vendor/jono/ui/tailwind.preset.js'

export default {
    presets: [jonoPreset],
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/jono/ui/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

### 2. Import CSS Theme

Add this to your `app.css`:

```css
@import '../../vendor/jono/ui/resources/css/jono-ui-theme.css';

@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Basic Usage

### Button

```blade
<x-hehe::button variant="primary">Click Me</x-hehe::button>
```

### Modal with Livewire

```php
public bool $showModal = false;
```

```blade
<x-hehe::button wire:click="$set('showModal', true)">
    Open Modal
</x-hehe::button>

<x-hehe::modal title="My Modal" modalProperty="showModal">
    Content here
</x-hehe::modal>
```

### Form

```blade
<form wire:submit="save">
    <x-hehe::form.input 
        label="Name"
        wire:model="name"
        required />
    
    <x-hehe::form.select 
        label="Status"
        wire:model="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </x-hehe::form.select>
    
    <x-hehe::button type="submit">Save</x-hehe::button>
</form>
```

### Table

```blade
<x-hehe::table.compact :headers="['Name', 'Email', 'Action']">
    @foreach($users as $user)
        <x-hehe::table.row>
            <td class="px-2 py-1.5">{{ $user->name }}</td>
            <td class="px-2 py-1.5">{{ $user->email }}</td>
            <td class="px-2 py-1.5">
                <x-hehe::button size="sm">Edit</x-hehe::button>
            </td>
        </x-hehe::table.row>
    @endforeach
</x-hehe::table.compact>
```

### Card

```blade
<x-hehe::card.compact title="User Info">
    <x-hehe::card.info-row label="Name" value="John Doe" />
    <x-hehe::card.info-row label="Email" value="john@example.com" />
</x-hehe::card.compact>
```
