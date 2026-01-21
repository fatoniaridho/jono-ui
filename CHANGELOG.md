# Changelog

All notable changes to jono-ui will be documented in this file.

## [2.0.0] - 2026-01-21

### Major Features
- **Semantic Theming**: Introduced `jono-ui-theme.css` and `tailwind.preset.js`.
- **Light/Dark Mode**: Automatic support via CSS variables.

### New Layout Components
- `Sidebar`: Complete responsive sidebar system.
- `Menubar`: Desktop navigation menu.
- `Tabs`: Accessible tab interface.

### New UI Components
- `Toaster` (Sonner-like): Global notifications.
- `Avatar`: Profile image with fallback.
- `Badge`: Status tags.
- `Spinner`: Loading indicators.
- `Toggle Group`: Button selection group.
- `Item` & `Empty`: Utility components.

### Updates
- **Breaking**: All components now rely on CSS variables (primary, sidebar, etc) instead of hardcoded colors.
- `Input`: Added prepend/append slots.
- `Button`: Visual updates to match new theme.

### Migration Guide
- Ensure you follow the new `QUICKSTART.md` to setup Tailwind Preset.
- If overriding colors, use CSS variables in `:root` instead of modifying blade files.

## [1.1.1] - 2026-01-21

### Changed
- Renamed package to `jono/ui` for Packagist compatibility
- Updated installation instructions
- Retained `x-hehe` prefix for backward compatibility and preference

## [1.1.0] - 2026-01-21

### Added
- Dropdown component with pure Alpine.js for optimal performance
- Dropdown item component for menu items
- Alert component with 4 types and dismissible option
- Performance guide documentation (PERFORMANCE.md)
- Loading state support in button component

### Enhanced
- Button component with disabled state styling
- Button component with loading prop
- Improved documentation with wire:loading examples
- Added production deployment checklist

### Performance
- Documented Alpine.js vs Livewire usage patterns
- Added computed properties best practices
- Query optimization guidelines
- Caching strategies for static data

### Security
- Documented locked properties pattern
- Authorization best practices
- Server-side validation guidelines
- Race condition prevention patterns

## [1.0.0] - 2026-01-21

### Initial Release
- Button component with multiple variants (primary, secondary, black, white, danger)
- Modal component with Livewire entangle support
- Card components (compact, info-row)
- Table components (compact, row)
- Form components (input, select, textarea)
- Full Tailwind CSS styling
- Alpine.js animations
- Comprehensive documentation
- Plug & Play installation
- Livewire 3 ready
- Responsive design
- Customizable via props
- Attribute merging support

