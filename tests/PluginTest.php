<?php

namespace WatheqAlshowaiter\FilamentStickyTableHeader\Tests;

use Filament\Panel;
use WatheqAlshowaiter\FilamentStickyTableHeader\StickyTableHeaderPlugin;

class PluginTest extends TestCase
{
    public function test_can_instantiate_plugin(): void
    {
        $plugin = StickyTableHeaderPlugin::make();

        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $plugin);
    }

    public function test_has_correct_plugin_id(): void
    {
        $plugin = StickyTableHeaderPlugin::make();

        $this->assertEquals('filament-sticky-table-header', $plugin->getId());
    }

    public function test_css_file_exists(): void
    {
        $cssPath = __DIR__ . '/../resources/css/sticky-table-header.css';
        $this->assertFileExists($cssPath);
    }

    public function test_can_register_with_panel(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        $panel = Panel::make()->id('admin');

        $plugin->register($panel);
        $plugin->boot($panel);

        $this->assertInstanceOf(Panel::class, $panel);
    }
}
