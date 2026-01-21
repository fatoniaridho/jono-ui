# Quick Start Guide

## Installation

```bash
composer require jono/ui
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
<x-hehe::card.compact title="User Info" icon="user">
    <x-hehe::card.info-row label="Name" value="John Doe" />
    <x-hehe::card.info-row label="Email" value="john@example.com" />
</x-hehe::card.compact>
```

## Complete Example

### Livewire Component

```php
<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public bool $showAddModal = false;
    public bool $editMode = false;
    public $form = [
        'name' => '',
        'email' => '',
        'active' => 1,
    ];

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->form = $user->toArray();
        $this->editMode = true;
        $this->showAddModal = true;
    }

    public function save()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.email' => 'required|email|unique:users,email,' . ($this->editMode ? $this->form['id'] : ''),
            'form.active' => 'required|boolean',
        ]);

        if ($this->editMode) {
            User::find($this->form['id'])->update($this->form);
        } else {
            User::create($this->form);
        }

        $this->showAddModal = false;
        $this->reset('form', 'editMode');
    }

    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::all(),
        ]);
    }
}
```

### View

```blade
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Users</h1>
        <x-hehe::button wire:click="$set('showAddModal', true)" icon="plus">
            Add User
        </x-hehe::button>
    </div>

    <x-hehe::table.compact :headers="['Name', 'Email', 'Status', 'Actions']">
        @foreach($users as $user)
            <x-hehe::table.row>
                <td class="px-2 py-1.5">{{ $user->name }}</td>
                <td class="px-2 py-1.5">{{ $user->email }}</td>
                <td class="px-2 py-1.5">
                    <span class="px-2 py-1 text-xs rounded-full {{ $user->active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $user->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-2 py-1.5">
                    <x-hehe::button size="sm" wire:click="edit({{ $user->id }})">
                        Edit
                    </x-hehe::button>
                </td>
            </x-hehe::table.row>
        @endforeach
    </x-hehe::table.compact>

    <x-hehe::modal 
        title="{{ $editMode ? 'Edit User' : 'Add User' }}" 
        modalProperty="showAddModal"
        maxWidth="md">
        
        <form wire:submit="save">
            <div class="space-y-4">
                <x-hehe::form.input 
                    label="Name"
                    wire:model="form.name"
                    required
                    error="{{ $errors->first('form.name') }}" />
                
                <x-hehe::form.input 
                    label="Email"
                    type="email"
                    wire:model="form.email"
                    required
                    error="{{ $errors->first('form.email') }}" />
                
                <x-hehe::form.select 
                    label="Status"
                    wire:model="form.active"
                    required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </x-hehe::form.select>
            </div>
        </form>
        
        <x-slot:footer>
            <x-hehe::button wire:click="save" variant="primary">
                {{ $editMode ? 'Update' : 'Create' }}
            </x-hehe::button>
            <x-hehe::button variant="white" wire:click="$set('showAddModal', false)">
                Cancel
            </x-hehe::button>
        </x-slot:footer>
    </x-hehe::modal>
</div>
```

## Next Steps

- Read the full README.md for detailed documentation
- Check CHANGELOG.md for version history
- Customize components as needed
- Contribute new components
