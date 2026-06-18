# AGENTS.md

This file provides guidance to coding agents working with this repository.

## Project Overview

This package is a focused Filament plugin that keeps table headers visible while table content scrolls.

- Package: `watheqalshowaiter/filament-sticky-table-header`
- Filament support: 3.x, 4.x, and 5.x
- Laravel support: 10, 11, 12, and 13
- PHP support: 8.1+
- Main implementation: one plugin class and one CSS asset

## Development Commands

```bash
composer install
composer validate --strict --no-check-publish
composer test
composer test:ci
vendor/bin/pint --test
composer lint
```

`composer test` runs with coverage. `composer test:ci` runs without coverage and stops on the first failure. `composer lint` rewrites files, while `vendor/bin/pint --test` only checks formatting.

## Architecture

- `src/StickyTableHeaderPlugin.php` implements Filament's `Plugin` interface and registers the CSS asset.
- `resources/css/sticky-table-header.css` contains the sticky header, scrolling container, responsive, and dark-mode behavior.
- `tests/PluginTest.php` covers plugin creation, ID, registration, asset presence, validation, and the optional pagination scroll hook.
- Asset registration uses reflection to support Filament 3's one-argument `FilamentAsset::register()` signature and Filament 4/5's package-aware signature.
- CSS assets must remain registered from `register()`. The plugin ID is `filament-sticky-table-header`.
- Keep the package minimal and avoid framework-specific code unless required for compatibility.

## Compatibility Matrix

| Filament | Laravel | Testbench | Minimum PHP |
| --- | --- | --- | --- |
| 3.x | 10.x | 8.x | 8.1 |
| 4.x | 11.x | 9.x | 8.2 |
| 5.x | 11.x | 9.x | 8.2 |
| 5.x | 12.x | 10.x | 8.2 |
| 5.x | 13.x | 11.x | 8.3 |

The GitHub Actions workflow tests every row and also tests Laravel 13 on the latest supported PHP version. Do not claim compatibility without a corresponding CI job.

## Testing Version Combinations

Use separate temporary working copies when testing multiple combinations because Composer changes the local dependency set. Keep Filament in `require`, not `require-dev`.

```bash
# Laravel 10 / Filament 3
composer require --dev --no-update laravel/framework:"10.*" orchestra/testbench:"^8.0"
composer require --no-update filament/filament:"^3.0"
composer update --prefer-dist --no-interaction
composer test:ci

# Laravel 11 / Filament 4
composer require --dev --no-update laravel/framework:"^11.28" orchestra/testbench:"^9.0"
composer require --no-update filament/filament:"^4.0"
composer update --prefer-dist --no-interaction
composer test:ci

# Laravel 11 / Filament 5
composer require --dev --no-update laravel/framework:"^11.28" orchestra/testbench:"^9.0"
composer require --no-update filament/filament:"^5.0"
composer update --prefer-dist --no-interaction
composer test:ci

# Laravel 12 / Filament 5
composer require --dev --no-update laravel/framework:"^12.0" orchestra/testbench:"^10.0"
composer require --no-update filament/filament:"^5.0"
composer update --prefer-dist --no-interaction
composer test:ci

# Laravel 13 / Filament 5
composer require --dev --no-update laravel/framework:"^13.0" orchestra/testbench:"^11.0"
composer require --no-update filament/filament:"^5.0"
composer update --prefer-dist --no-interaction
composer test:ci
```

## Change Requirements

- Preserve compatibility with all supported Filament and Laravel combinations.
- Run Composer validation, PHPUnit, and Pint's non-mutating check before submitting changes.
- Update `README.md`, `CLAUDE.md`, `AGENTS.md`, and `CHECKLIST.md` when compatibility claims change.
- Manually verify sticky headers, dark mode, mobile layout, grouped columns, action/dropdown stacking, and pagination scrolling for UI-affecting changes.
