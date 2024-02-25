# This is my package scramble-spatie-requests

[![Latest Version on Packagist](https://img.shields.io/packagist/v/florian-palabost/scramble-spatie-requests.svg?style=flat-square)](https://packagist.org/packages/fp/scramble-spatie-requests)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fp/scramble-spatie-requests/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/florianPalabost/scramble-spatie-requests/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/florian-palabost/scramble-spatie-requests/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/florianPalabost/scramble-spatie-requests/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/florian-palabost/scramble-spatie-requests.svg?style=flat-square)](https://packagist.org/packages/florian-palabost/scramble-spatie-requests)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/scramble-spatie-requests.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/scramble-spatie-requests)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require florian-palabost/scramble-spatie-requests
```

You neeed to update the scramble.extensions property in the scramble configuration file to add this extension.

```php
    'extensions' => [
        Fp\ScrambleSpatieRequests\SpatieQueryBuilderExtension::class
    ],
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [FlorianPalabost](https://github.com/florianPalabost)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
