# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Filament plugin that makes table headers sticky when scrolling. It's a simple, focused package that provides better UX for Filament admin panels by keeping table headers visible during scrolling.

**Package Name:** `watheqalshowaiter/filament-sticky-table-header`

**Key Features:**
- Supports Filament 3.x and 4.x
- Compatible with Laravel 10, 11, and 12
- PHP 8.1+ support
- Single plugin class with CSS asset registration
- 100% test coverage

## Development Commands

### Testing
```bash
composer test              # Run tests with coverage
composer test:ci           # Run tests without coverage (CI mode, stops on first failure)
```

### Code Style
```bash
composer lint              # Format code with Laravel Pint
```

### Dependencies
```bash
composer install           # Install dependencies
composer update            # Update dependencies
```

## Architecture

### Core Structure

**Plugin Class:** `src/StickyTableHeaderPlugin.php`
- Implements Filament's `Plugin` interface
- Registers CSS asset via `FilamentAsset::register()`
- **Version Detection:** Uses reflection to detect Filament v3 vs v4 based on the number of parameters in `FilamentAsset::register()` method (v4 requires package name parameter)
- CSS file located at: `resources/css/sticky-table-header.css`

### Testing

**Test Files:** `tests/PluginTest.php`, `tests/TestCase.php`
- Uses PHPUnit with Orchestra Testbench
- Tests cover: plugin instantiation, ID verification, CSS file existence, panel registration

### CI/CD

**GitHub Actions Workflows:**
- `run-tests.yml` - Tests against both Filament 3 and Filament 4
  - Filament 3: Laravel 10, PHP 8.1+
  - Filament 4: Laravel 11.28+, PHP 8.2+
- `fix-php-code-style-issues.yml` - Auto-formats code with Pint
- `update-changelog.yml` - Automated changelog updates
- `dependabot-auto-merge.yml` - Auto-merge Dependabot PRs

## Important Implementation Notes

1. **Filament Version Compatibility:** The plugin uses reflection to detect Filament version differences in the `FilamentAsset::register()` method signature. This allows the same codebase to support both v3 and v4.

2. **Asset Registration:** CSS assets are registered in the `register()` method, not `boot()`. The plugin ID is `'filament-sticky-table-header'`.

3. **Package Structure:** This is a minimal plugin - one PHP class + one CSS file. Avoid adding unnecessary complexity.

## Testing Multi-Version Support

When making changes, ensure tests pass for both Filament versions:

```bash
# Test with Filament 3
composer require laravel/framework:"10.*" orchestra/testbench:"^8.0" filament/filament:"^3.0" --dev --no-update
composer update --prefer-dist --no-interaction
composer test:ci

# Test with Filament 4
composer require laravel/framework:"^11.28" orchestra/testbench:"^9.0" filament/filament:"^4.0" --dev --no-update
composer update --prefer-dist --no-interaction
composer test:ci
```
