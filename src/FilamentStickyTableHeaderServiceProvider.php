<?php

namespace WatheqAlshowaiter\FilamentStickyTableHeader;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentStickyTableHeaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-sticky-table-header');
    }
}
