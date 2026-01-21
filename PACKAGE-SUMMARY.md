# Jono UI - Package Summary

## Package Statistics

- **Package Name**: `jono/ui`
- **Version**: 2.0.0
- **Prefix**: `x-hehe::`
- **License**: MIT
- **Dependencies**: 
  - `laravel/framework`: ^10.0 | ^11.0
  - `livewire/livewire`: ^3.0
  - `tailwindcss`: ^3.0

## Components Breakdown

### 1. Layout System (New)
- `Sidebar`: Professional dashboard layout with collapsible menu & mobile support.
- `Menubar`: Desktop navigation menu (dropdowns).
- `Tabs`: Accessible tabbed content.
- `Item`: Generic list item wrapper.

### 2. Form Components
- `Input`: Enhanced text input with prepend/append slots.
- `Select`: Native select with custom styling.
- `Textarea`: Multi-line input.
- `Toggle Group`: Button group selection.
- `Checkbox`: (Implicit support via Tailwind).

### 3. Data Display
- `Card`: Flexible card container.
- `Table`: Responsive table with generic rows.
- `Avatar`: User profile image handling.
- `Badge`: Status tags with multiple variants.
- `Empty`: Empty state placeholders.

### 4. Feedback & Overlay
- `Toaster`: Global toast notification system (Sonner style).
- `Alert`: Contextual alert boxes.
- `Spinner`: Loading indicators.
- `Modal`: Dialog/Popup system with Livewire bindings.
- `Dropdown`: Menu overlays.

## Design System (v2.0)

### Semantic Theming
Jono UI no longer uses hardcoded colors. All components rely on CSS Variables allowing for instant re-theming and Dark Mode support.

- `bg-background` / `text-foreground`
- `bg-primary` / `text-primary-foreground`
- `bg-card` / `text-card-foreground`
- `border-input` / `ring-ring`

### Styling Engine
- **Tailwind Preset**: Contains all generic styling definitions.
- **CSS Theme**: Defines the actual color values (HSL) for Light and Dark modes.
- **Micro-interactions**: Alpine.js powers all interactions (open/close, toggle, ripple).

## Documentation Files

- **README.md**: Landing page.
- **QUICKSTART.md**: Installation & Setup guide.
- **CHANGELOG.md**: Version history.
- **PERFORMANCE.md**: Optimization guide.
- **PACKAGE-SUMMARY.md**: (This file) Overview.
