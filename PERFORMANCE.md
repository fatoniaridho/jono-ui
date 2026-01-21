# Performance & Security Guide

Production-ready patterns for Laravel Livewire applications using Hehe UI.

## Performance Optimization

### UI State Management

Use Alpine.js for UI-only state to prevent unnecessary server requests.

```blade
<div x-data="{ open: false }">
    <x-hehe::button @click="open = !open">Toggle</x-hehe::button>
</div>
```

Use Livewire only when server data is required.

```php
public bool $showModal = false;

public function openModal($id)
{
    $this->loadData($id);
    $this->showModal = true;
}
```

### Form Input Optimization

```blade
<x-hehe::form.input wire:model.defer="name" />
<x-hehe::form.input wire:model.blur="email" />
<x-hehe::form.input wire:model.live.debounce.300ms="search" />
```

### Computed Properties

```php
use Livewire\Attributes\Computed;

#[Computed]
public function students()
{
    return Student::with('major')->paginate(10);
}
```

### Loading States

```blade
<x-hehe::button 
    wire:click="save"
    wire:loading.attr="disabled">
    <span wire:loading.remove>Save</span>
    <span wire:loading>Saving...</span>
</x-hehe::button>
```

## Security

### Locked Properties

```php
use Livewire\Attributes\Locked;

#[Locked]
public $userId;

#[Locked]
public $totalAmount;
```

### Authorization

```php
public function delete($id)
{
    $student = Student::findOrFail($id);
    $this->authorize('delete', $student);
    $student->delete();
}
```

### Server-Side Validation

```php
public function save()
{
    $validated = $this->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
    ]);
    
    Student::create($validated);
}
```

## Data Integrity

### Pessimistic Locking

```php
use Illuminate\Support\Facades\DB;

public function verifyPayment($id)
{
    DB::transaction(function () use ($id) {
        $payment = Payment::lockForUpdate()->findOrFail($id);
        
        if ($payment->verified) {
            throw new \Exception('Already verified');
        }
        
        $payment->update(['verified' => true]);
    });
}
```

### Race Condition Prevention

```blade
<x-hehe::button 
    wire:click="processPayment"
    wire:loading.attr="disabled"
    wire:loading.class="opacity-50">
    Process Payment
</x-hehe::button>
```

## Query Optimization

### Eager Loading

```php
#[Computed]
public function students()
{
    return Student::with(['major', 'courses'])->paginate(10);
}
```

### Caching

```php
use Illuminate\Support\Facades\Cache;

#[Computed]
public function majors()
{
    return Cache::remember('majors', 3600, function () {
        return Major::orderBy('name')->get();
    });
}
```

### Select Specific Columns

```php
#[Computed]
public function students()
{
    return Student::select(['id', 'name', 'nim'])
        ->with(['major:id,name'])
        ->paginate(10);
}
```

## Production Checklist

- Use Alpine.js for UI state
- Implement computed properties for queries
- Add eager loading for all relations
- Cache static reference data
- Lock sensitive properties
- Authorize every action
- Use database transactions for critical operations
- Add loading states to all buttons
- Validate all inputs server-side
- Use wire:model.defer for forms
- Implement debounce for search inputs
