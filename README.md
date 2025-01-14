# A Bundle of helpfully tools to manage Laravel via CLI 

## Installation

You can install the package via composer:

```bash
composer require zhylon/laravel-cli-tools
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-cli-tools"
```

## Commands

**Create User Command**

```bash
php artisan cli-tools:create-user [<name?>] --email[=EMAIL] --password[=PASSWORD] --force
```

Example:
```bash
php artisan cli-tools:create-user
php artisan cli-tools:create-user TestUser
php artisan cli-tools:create-user TestUser --email=example.com
php artisan cli-tools:create-user TestUser --email=example.com --password=secret
php artisan cli-tools:create-user TestUser --email=example.com --password=secret --force
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [TobyMaxham](https://github.com/TobyMaxham)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
