[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Use Whatsapp's Cloud API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sawirricardo/whatsapp-php.svg?style=flat-square)](https://packagist.org/packages/sawirricardo/whatsapp-php)
[![Tests](https://github.com/sawirricardo/whatsapp-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/sawirricardo/whatsapp-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/sawirricardo/whatsapp-php.svg?style=flat-square)](https://packagist.org/packages/sawirricardo/whatsapp-php)

Start using Whatsapp Business Cloud API

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/whatsapp-php.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/whatsapp-php)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require sawirricardo/whatsapp-php
```

## Usage

```php
$client = \Sawirricardo\Whatsapp\Whatsapp::make($token, $phoneId)
    ->to('+111111111')
    ->message(TextMessageData::make('Hello world!'))
    ->send();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [sawirricardo](https://github.com/sawirricardo)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
