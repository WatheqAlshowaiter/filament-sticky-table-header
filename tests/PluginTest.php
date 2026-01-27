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

    public function test_should_scroll_to_top_on_page_changed_enabled(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        $panel = Panel::make()->id('admin');

        $plugin->register($panel);
        
        $result = $plugin->shouldScrollToTopOnPageChanged();
        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $result);
    }

    public function test_should_scroll_to_top_on_page_changed_disabled(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        
        $result = $plugin->shouldScrollToTopOnPageChanged(false);
        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $result);
    }

    public function test_should_scroll_to_top_on_page_changed_with_smooth_behavior(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        
        $result = $plugin->shouldScrollToTopOnPageChanged(true, 'smooth');
        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $result);
    }

    public function test_should_scroll_to_top_on_page_changed_with_instant_behavior(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        
        $result = $plugin->shouldScrollToTopOnPageChanged(true, 'instant');
        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $result);
    }

    public function test_should_scroll_to_top_on_page_changed_with_auto_behavior(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        
        $result = $plugin->shouldScrollToTopOnPageChanged(true, 'auto');
        $this->assertInstanceOf(StickyTableHeaderPlugin::class, $result);
    }

    public function test_should_scroll_to_top_on_page_changed_invalid_behavior_throws_exception(): void
    {
        $plugin = StickyTableHeaderPlugin::make();
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Scroll behavior must be 'smooth', 'instant', or 'auto'");
        
        $plugin->shouldScrollToTopOnPageChanged(true, 'invalid');
    }
}
