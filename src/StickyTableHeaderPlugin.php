<?php

namespace WatheqAlshowaiter\FilamentStickyTableHeader;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;

class StickyTableHeaderPlugin implements Plugin
{
    public static function make(): static
    {
        return app(self::class);
    }

    public function shouldScrollToTopOnPageChanged($enabled = true, $behavior = 'auto'): static
    {
        if (! $enabled) {
            return $this;
        }

        if (!in_array($behavior, ['smooth', 'instant', 'auto'])) {
            throw new \InvalidArgumentException("Scroll behavior must be 'smooth', 'instant', or 'auto'");
        }

        FilamentView::registerRenderHook(
            'panels::body.end',
            fn(): string => <<<HTML
                <script>
                    document.addEventListener('livewire:init', () => {
                        Livewire.hook('request', ({ component, respond }) => {
                            const table = document.querySelector('.fi-ta-table');

                            if (!table) {
                                return;
                            }

                            table.scrollIntoView({ behavior: '{$behavior}', block: 'start' });
                        });
                    });
                </script>
            HTML
        );

        return $this;
    }

    public function getId(): string
    {
        return 'filament-sticky-table-header';
    }

    public function register(Panel $panel): void
    {
        $assets = [
            Css::make('filament/sticky-table-header', __DIR__ . '/../resources/css/sticky-table-header.css'),
        ];

        $params = $this->getFilamentAssetParametersCount();

        if ($this->isFilamentV4($params)) {
            FilamentAsset::register($assets, $this->getId());
        }

        /**
         * Filament v3
         */
        FilamentAsset::register($assets);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    private function getFilamentAssetParametersCount(): int
    {
        return (new \ReflectionMethod(FilamentAsset::class, 'register'))->getNumberOfParameters();
    }

    /**
     * In Filament v4, the second parameter is required for the package name.
     */
    private function isFilamentV4(int $params): bool
    {
        return $params > 1;
    }
}
