# Make FilamentPHP tables stick when you scroll down

[![Latest Version on Packagist](https://img.shields.io/packagist/v/watheqalshowaiter/filament-sticky-table-header.svg?style=flat-square)](https://packagist.org/packages/watheqalshowaiter/filament-sticky-table-header)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/watheqalshowaiter/filament-sticky-table-header/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/watheqalshowaiter/filament-sticky-table-header/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/watheqalshowaiter/filament-sticky-table-header/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/watheqalshowaiter/filament-sticky-table-header/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/watheqalshowaiter/filament-sticky-table-header.svg?style=flat-square)](https://packagist.org/packages/watheqalshowaiter/filament-sticky-table-header)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require watheqalshowaiter/filament-sticky-table-header
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-sticky-table-header-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-sticky-table-header-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-sticky-table-header-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentStickyTableHeader = new WatheqAlshowaiter\StickyTableHeaderPlugin();
echo $filamentStickyTableHeader->echoPhrase('Hello, WatheqAlshowaiter!');
```

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
