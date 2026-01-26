<?php

namespace WatheqAlshowaiter\FilamentStickyTableHeader;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\HtmlString;

class StickyTableHeaderPlugin implements Plugin
{
    public static function make(): static
    {
        return app(self::class);
    }

    public function getId(): string
    {
        return 'filament-sticky-table-header';
    }

    public function register(Panel $panel): void
    {
        $assets = [
            Css::make('filament/sticky-table-header', __DIR__ . '/../resources/css/sticky-table-header.css'),
            //Js::make('filament/sticky-table-header', __DIR__ . '/../resources/js/sticky-table-header.js'),

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
        FilamentView::registerRenderHook(
            PanelsRenderHook::SCRIPTS_AFTER,
             fn (): HtmlString => new HtmlString(
            '<script>
                document.addEventListener("livewire:init", () => {
                    window.addEventListener("filament-sticky-table::scroll-to-top", () => {
                        const tableContainer = document.querySelector(".fi-ta-content, .fi-ta-content-ctn");
                        
                        if (tableContainer) {
                            tableContainer.scrollTop = 0;
                        } else { // Fallback
                            window.scrollTo({ top: 0, behavior: "instant" });
                        }
                    });
                });
            </script>'
            ),
        );
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
