<?php

namespace AytacKayin\FilamentSelectIcon;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSelectIconServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-select-icon')
            ->hasConfigFile('select-icon')
            ->hasViews();
    }
}
