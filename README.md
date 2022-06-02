# Use The Most Used Whatsapp's Cloud API

![WhatsApp PHP](https://banners.beyondco.de/whatsapp-php.png?theme=light&packageManager=composer+require&packageName=sawirricardo%2Fwhatsapp-php&pattern=bankNote&style=style_1&description=Enhance+your+apps+with+WhatsApp+php&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Fwww.php.net%2Fimages%2Flogos%2Fnew-php-logo.svg)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sawirricardo/whatsapp-php.svg?style=flat-square)](https://packagist.org/packages/sawirricardo/whatsapp-php)
[![Tests](https://github.com/sawirricardo/whatsapp-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/sawirricardo/whatsapp-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/sawirricardo/whatsapp-php.svg?style=flat-square)](https://packagist.org/packages/sawirricardo/whatsapp-php)

Start using Whatsapp Business Cloud API in your app!

## Support us

Investing on this package is defintely a good move from you. You can support by donating to:

-   PayPal https://www.paypal.com/paypalme/sawirricardo.
-   BCA 8330123584

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
