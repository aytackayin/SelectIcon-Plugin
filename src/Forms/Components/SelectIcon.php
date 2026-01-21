<?php

namespace AytacKayin\FilamentSelectIcon\Forms\Components;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Concerns\HasOptions;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class SelectIcon extends Field
{
    use HasOptions;

    protected string $view = 'filament-select-icon::filament.forms.components.select-icon';

    protected array $extraInputAttributes = [];

    public function extraInputAttributes(array $attributes): static
    {
        $this->extraInputAttributes = array_merge($this->extraInputAttributes, $attributes);

        return $this;
    }

    public function getExtraInputAttributes(): array
    {
        return $this->extraInputAttributes;
    }


    protected function setUp(): void
    {
        parent::setUp();

        $this->options(fn() => $this->getIconOptions());
    }

    protected function getIconOptions(): array
    {
        $icons = config('select-icon.icons', []);

        if (empty($icons) && class_exists(Heroicon::class)) {
            foreach (Heroicon::cases() as $case) {
                // We prefer Outlined icons for pickers by default
                if (str_starts_with($case->value, 'o-')) {
                    $label = Str::headline(str_replace('Outlined', '', $case->name));
                    $icons[$label] = $case->value;
                }
            }
        }

        ksort($icons);

        $mapped = [];
        foreach ($icons as $label => $icon) {
            $value = is_object($icon) ? $icon->value : $icon;

            if (!str_starts_with($value, 'heroicon-')) {
                $value = 'heroicon-' . $value;
            }

            // Verify icon exists to avoid errors
            try {
                $mapped[$value] = "<div style='display: flex; align-items: center; gap: 8px; white-space: nowrap;'> <div style='width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;'>" . svg($value)->style('width: 20px; height: 20px;')->toHtml() . "</div> <span style='line-height: 1;'>{$label}</span></div>";
            } catch (\Exception $e) {
                continue;
            }
        }

        return $mapped;
    }
}

