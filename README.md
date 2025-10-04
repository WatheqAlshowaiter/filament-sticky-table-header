# Make FilamentPHP tables stick when you scroll down

[![Latest Version on Packagist](https://img.shields.io/packagist/v/watheqalshowaiter/filament-sticky-table-header.svg?style=flat-square)](https://packagist.org/packages/watheqalshowaiter/filament-sticky-table-header)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/watheqalshowaiter/filament-sticky-table-header/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/watheqalshowaiter/filament-sticky-table-header/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/watheqalshowaiter/filament-sticky-table-header/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/watheqalshowaiter/filament-sticky-table-header/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/watheqalshowaiter/filament-sticky-table-header.svg?style=flat-square)](https://packagist.org/packages/watheqalshowaiter/filament-sticky-table-header)


A simple Filament plugin that makes table headers sticky when scrolling down. Keep your column headers visible at all times for better user experience with long tables.

## Installation

You can install the package via composer:

```bash
composer require watheqalshowaiter/filament-sticky-table-header
```

## Usage

Register the plugin in your Panel provider:

```php
use WatheqAlshowaiter\FilamentStickyTableHeader\StickyTableHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyTableHeaderPlugin::make(),
        ]);
}
```

That's it! Your table headers will now stick to the top when scrolling.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Watheq Alshowaiter](https://github.com/WatheqAlshowaiter)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.



[//]: # (todos)
[//]: # (fix on mobile screen)
[//]: # (add gif/video for the readme)
[//]: # (add filament banner to readme and also for the og:image in github settings)
[//]: # (add simple test)
[//]: # (remove unneeded ci/cd)
[//]: # (support filament 4.x and 2.x if we can)
[//]: # (remove pest and keep phpunit for simplicity maybe)
