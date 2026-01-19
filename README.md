# Filament SelectIcon Plugin

A custom Filament form component that provides a beautiful, grid-based icon picker with a built-in search functionality and custom tooltips.

![SelectIcon Preview](https://github.com/aytackayin/SelectIcon-Plugin/blob/main/preview.png)

## Features

- 🚀 **Grid Layout**: Displays icons in a clean, responsive grid.
- 🔍 **Searchable**: Built-in search functionality to quickly find icons.
- 🎨 **Custom Tooltips**: Modern, rounded, and shadowed tooltips that appear on hover.
- 🌓 **Dark Mode Support**: Fully compatible with Filament's light and dark themes.
- ⚙️ **Configurable**: Easily customize the list of available icons via a config file.
- 📦 **No External Dependencies**: Self-contained CSS and Alpine.js logic.

## Installation

You can install the package via composer:

```bash
composer require aytackayin/filament-select-icon
```

### Configuration
By default, the plugin automatically discovers all **Outlined Heroicons** provided by Filament. No configuration is required.

However, if you want to limit the icons or add custom ones, you can publish the config file:

```bash
php artisan vendor:publish --tag="filament-select-icon-config"
```

This is the contents of the published config file:

```php
<?php

return [
    'icons' => [
        // 'Label' => 'heroicon-name',
        // If left empty, all Outlined Heroicons are discovered automatically.
    ]
];
```

## Usage

Simply use the `SelectIcon` component in your Filament form schema:

```php
use AytacKayin\FilamentSelectIcon\Forms\Components\SelectIcon;

public function form(Form $form): Form
{
    return $form
        ->schema([
            SelectIcon::make('icon')
                ->label('Select an Icon'),
        ]);
}
```

## Customization

### Tooltip Width
You can adjust the tooltip width or behavior in the `select-icon.blade.php` file within the `<style>` block:

```css
.select-icon-tooltip {
    width: 100px !important; /* Fixed width */
    white-space: normal !important; /* Allow wrapping */
}
```

## Credits

Developed by [Aytaç Kayın](https://github.com/aytackayin/).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
