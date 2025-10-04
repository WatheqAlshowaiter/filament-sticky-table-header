<?php

namespace WatheqAlshowaiter\FilamentStickyTableHeader;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class StickyTableHeaderPlugin implements Plugin
{
    public static function make(): static
    {
        return app(self::class);
    }

    public static function get(): static
    {
        return static::make();
    }

    public function getId(): string
    {
        return 'filament-sticky-table-header';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Css::make('filament/sticky-table-header', __DIR__ . '/../resources/css/sticky-table-header.css'),
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
