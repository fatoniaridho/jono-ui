# Hehe UI

Reusable UI component library untuk Laravel & Livewire.

## Features

- Plug & Play - Install dan langsung pakai
- Livewire Ready - Full support untuk Livewire 3
- Beautiful Design - Modern, clean, dan responsive
- Alpine.js Powered - Smooth animations dan interactions
- Modular - Pakai component yang Anda butuhkan saja

## Installation

### Via Composer (From GitHub)

```bash
composer require jono/ui
```

### Local Development

Jika Anda sedang develop package ini:

1. Clone atau copy package ke folder terpisah
2. Tambahkan ke `composer.json` project Laravel Anda:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../jono-ui"
        }
    ],
    "require": {
        "jono/ui": "@dev"
    }
}
```

3. Run composer update:

```bash
composer update jono/ui
```

### Publish Assets (Optional)

Jika Anda ingin customize views:

```bash
php artisan vendor:publish --tag=hehe-views
```

## Components

### Button

Customizable button component dengan multiple variants dan sizes.

```blade
<x-hehe::button variant="primary">
    Save Changes
</x-hehe::button>

<x-hehe::button variant="secondary" icon="plus" iconPosition="left">
    Add New
</x-hehe::button>

<x-hehe::button href="/dashboard" variant="white">
    Go to Dashboard
</x-hehe::button>

<x-hehe::button size="sm">Small</x-hehe::button>
<x-hehe::button size="md">Medium</x-hehe::button>
<x-hehe::button size="lg">Large</x-hehe::button>

<x-hehe::button 
    wire:click="save" 
    wire:loading.attr="disabled"
    variant="primary">
    <span wire:loading.remove>Save</span>
    <span wire:loading>Saving...</span>
</x-hehe::button>
```

Props:
- `variant` - Button style: primary, secondary, black, white, danger (default: 'primary')
- `size` - Button size: sm, md, lg, icon (default: 'md')
- `icon` - Flux icon name (optional)
- `iconPosition` - Icon position: left, right (default: 'left')
- `type` - Button type: button, submit, reset (default: 'button')
- `href` - If provided, renders as link instead of button
- `loading` - Disable button when loading (default: false)


### Modal

Modal component dengan Livewire entangle support dan smooth animations.

```blade
<x-hehe::modal 
    title="Edit Data Mahasiswa" 
    modalProperty="showEditModal"
    maxWidth="2xl">
    
    <div class="space-y-4">
        <x-hehe::form.input 
            label="Nama"
            wire:model="nama" />
        
        <x-hehe::form.input 
            label="NIM"
            wire:model="nim" />
    </div>
    
    <x-slot:footer>
        <x-hehe::button wire:click="save" variant="primary">
            Save Changes
        </x-hehe::button>
        <x-hehe::button variant="white" wire:click="$set('showEditModal', false)">
            Cancel
        </x-hehe::button>
    </x-slot:footer>
</x-hehe::modal>
```

Props:
- `title` - Modal title (default: 'Title')
- `modalProperty` - Livewire property untuk toggle modal (default: 'showModal')
- `maxWidth` - Modal width: sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl (default: '2xl')
- `footer` - Optional footer slot

Livewire Pattern:
```php
public bool $showEditModal = false;

public function edit($id)
{
    $this->showEditModal = true;
}
```

### Card Compact

Compact card component dengan optional title dan icon.

```blade
<x-hehe::card.compact title="Biodata Mahasiswa" icon="user">
    <x-hehe::card.info-row label="NIM" value="123456789" />
    <x-hehe::card.info-row label="Nama" value="John Doe" />
    <x-hehe::card.info-row label="Jurusan" value="Teknik Informatika" />
</x-hehe::card.compact>

<x-hehe::card.compact>
    Your content here
</x-hehe::card.compact>
```

Props:
- `title` - Card title (optional)
- `icon` - Flux icon name (optional)
- `padding` - Custom padding class (default: 'p-5')

### Card Info Row

Component untuk menampilkan label-value pairs dengan alignment yang rapi.

```blade
<x-hehe::card.info-row 
    label="NIM" 
    value="123456789" 
    labelWidth="w-32" />

<x-hehe::card.info-row 
    label="Email" 
    value="student@example.com" />
```

Props:
- `label` - Label text
- `value` - Value text
- `labelWidth` - Width class untuk label (default: 'w-32')

### Table Compact

Compact table dengan dynamic headers dan responsive design.

```blade
<x-hehe::table.compact :headers="['No', 'Nama', 'NIM', 'Jurusan', 'Aksi']">
    @foreach($mahasiswa as $index => $mhs)
        <x-hehe::table.row>
            <td class="px-2 py-1.5">{{ $index + 1 }}</td>
            <td class="px-2 py-1.5">{{ $mhs->nama }}</td>
            <td class="px-2 py-1.5">{{ $mhs->nim }}</td>
            <td class="px-2 py-1.5">{{ $mhs->jurusan }}</td>
            <td class="px-2 py-1.5">
                <x-hehe::button size="sm" wire:click="edit({{ $mhs->id }})">
                    Edit
                </x-hehe::button>
            </td>
        </x-hehe::table.row>
    @endforeach
</x-hehe::table.compact>
```

Props:
- `headers` - Array of header labels (optional)
- `compact` - Use compact spacing (default: true)

### Table Row

Table row dengan hover effect.

```blade
<x-hehe::table.row>
    <td class="px-2 py-1.5">Cell 1</td>
    <td class="px-2 py-1.5">Cell 2</td>
    <td class="px-2 py-1.5">Cell 3</td>
</x-hehe::table.row>
```

### Form Input

Input field dengan label, error, dan hint support.

```blade
<x-hehe::form.input 
    label="Email Address"
    type="email"
    name="email"
    placeholder="your@email.com"
    required
    hint="We'll never share your email"
    error="{{ $errors->first('email') }}"
    wire:model="email" />

<x-hehe::form.input 
    label="Name"
    wire:model="name" />
```

Props:
- `label` - Input label (optional)
- `error` - Error message (optional)
- `hint` - Hint text (optional)
- `required` - Show required asterisk (default: false)
- `disabled` - Disable input (default: false)

### Form Select

Select dropdown dengan label, error, dan hint support.

```blade
<x-hehe::form.select 
    label="Status"
    name="status"
    required
    wire:model="status">
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
</x-hehe::form.select>
```

Props:
- `label` - Select label (optional)
- `error` - Error message (optional)
- `hint` - Hint text (optional)
- `required` - Show required asterisk (default: false)
- `disabled` - Disable select (default: false)
- `placeholder` - Placeholder text (default: 'Pilih...')

### Form Textarea

Textarea dengan label, error, dan hint support.

```blade
<x-hehe::form.textarea 
    label="Description"
    name="description"
    rows="5"
    placeholder="Enter description..."
    hint="Maximum 500 characters"
    wire:model="description" />
```

Props:
- `label` - Textarea label (optional)
- `error` - Error message (optional)
- `hint` - Hint text (optional)
- `required` - Show required asterisk (default: false)
- `disabled` - Disable textarea (default: false)

### Dropdown

Pure Alpine.js dropdown component untuk optimal performance.

```blade
<x-hehe::dropdown>
    <x-slot:trigger>
        <x-hehe::button variant="white">
            Options
        </x-hehe::button>
    </x-slot:trigger>
    
    <x-hehe::dropdown.item href="/profile">Profile</x-hehe::dropdown.item>
    <x-hehe::dropdown.item href="/settings">Settings</x-hehe::dropdown.item>
    <x-hehe::dropdown.item wire:click="logout">Logout</x-hehe::dropdown.item>
</x-hehe::dropdown>
```

Props:
- `open` - Initial open state (default: false)

### Alert

Alert component dengan dismissible option.

```blade
<x-hehe::alert type="success">
    Data berhasil disimpan!
</x-hehe::alert>

<x-hehe::alert type="error" dismissible>
    Terjadi kesalahan saat memproses data.
</x-hehe::alert>

<x-hehe::alert type="warning">
    Perhatian: Data akan dihapus permanen.
</x-hehe::alert>

<x-hehe::alert type="info">
    Informasi penting untuk pengguna.
</x-hehe::alert>
```

Props:
- `type` - Alert type: info, success, warning, error (default: 'info')
- `dismissible` - Show close button (default: false)


## Styling

Components ini menggunakan Tailwind CSS dan Zinc color palette. Pastikan project Anda sudah setup Tailwind CSS.

### Required Dependencies

- Alpine.js - Untuk interactivity
- Livewire 3 - Untuk reactive components
- Tailwind CSS - Untuk styling
- Flux UI (optional) - Untuk icons dan additional components

### Brand Colors

Button component menggunakan brand colors:
- Primary: #164B4D (Teal/Green)
- Secondary: #FDCF01 (Yellow/Gold)

Anda bisa customize colors dengan override classes:

```blade
<x-hehe::button class="!bg-blue-600 !hover:bg-blue-700">
    Custom Color
</x-hehe::button>
```

## Development

### Structure

```
hehe-ui/
├── src/
│   └── HeheUIServiceProvider.php
├── resources/
│   ├── views/
│   │   └── components/
│   │       ├── button.blade.php
│   │       ├── modal.blade.php
│   │       ├── card/
│   │       │   ├── compact.blade.php
│   │       │   └── info-row.blade.php
│   │       ├── table/
│   │           ├── compact.blade.php
│   │           └── row.blade.php
│   │       └── form/
│   │           ├── input.blade.php
│   │           ├── select.blade.php
│   │           └── textarea.blade.php
│   └── css/
├── composer.json
├── README.md
└── LICENSE
```

### Adding New Components

1. Buat file Blade di `resources/views/components/`
2. Component otomatis tersedia dengan prefix `x-hehe::`
3. Update README dengan dokumentasi

## Usage Tips

### Livewire Modal Pattern

```php
public bool $showModal = false;
public $selectedId;

public function openModal($id = null)
{
    $this->selectedId = $id;
    $this->showModal = true;
}

public function closeModal()
{
    $this->showModal = false;
    $this->reset(['selectedId']);
}
```

```blade
<x-hehe::button wire:click="openModal">
    Open Modal
</x-hehe::button>

<x-hehe::modal title="My Modal" modalProperty="showModal">
    Content here
    
    <x-slot:footer>
        <x-hehe::button wire:click="save">Save</x-hehe::button>
        <x-hehe::button variant="white" wire:click="closeModal">Cancel</x-hehe::button>
    </x-slot:footer>
</x-hehe::modal>
```

### Custom Styling

Semua components support attribute merging:

```blade
<x-hehe::card.compact class="!bg-blue-50 !border-blue-200">
    Custom styled card
</x-hehe::card.compact>

<x-hehe::button class="w-full">
    Full width button
</x-hehe::button>
```

### Form Validation with Livewire

```blade
<x-hehe::form.input 
    label="Email"
    type="email"
    wire:model="email"
    error="{{ $errors->first('email') }}" />

<x-hehe::form.select 
    label="Role"
    wire:model="role"
    error="{{ $errors->first('role') }}">
    <option value="admin">Admin</option>
    <option value="user">User</option>
</x-hehe::form.select>
```

## License

MIT License - feel free to use in your projects.

## Performance & Security

For production deployments, see [PERFORMANCE.md](PERFORMANCE.md) for:

- Performance optimization patterns
- Security best practices
- Data integrity guidelines
- Query optimization techniques
- Production deployment checklist

## Contributing

Contributions are welcome. Feel free to submit a PR.

## Roadmap

- Button components (done)
- Modal components (done)
- Card components (done)
- Table components (done)
- Form input components (done)
- Dropdown components (done)
- Alert components (done)
- Badge components
- Pagination components
- Tabs components
- Accordion components


