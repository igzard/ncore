# PHP Package for Ncore RSS

<p align="left">
<a href="https://packagist.org/packages/igzard/ncore"><img src="https://img.shields.io/packagist/dt/igzard/ncore" alt="Total Downloads"></a>
<a href="https://github.com/igzard/ncore/actions/workflows/tests.yml"><img src="https://img.shields.io/github/actions/workflow/status/igzard/ncore/tests.yml?label=tests&style=flat-square" alt="Tests passed"></a>
<a href="https://packagist.org/packages/igzard/ncore"><img src="https://img.shields.io/packagist/v/igzard/ncore" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/igzard/ncore"><img src="https://img.shields.io/packagist/l/igzard/ncore" alt="License"></a>
</p>

This module provides PHP API-s to manage torrents from ncore.pro eg.: search from RSS

## Install

```bash
composer require igzard/ncore
```

## Get Passkey from ncore
- Log in to ncore.pro
- Navigate to the 'Settings / Other' data page
- Copy the 'passkey'

## Examples

Searching for Toy Story in category: Film (HUN SD)

```php
$ncore = new Ncore('{passkey}');
$torrents = $ncore->search([
    'search' => 'Toy Story',
    'cat' => Category::FILM_HUN_SD
]);
```

Download first match for Toy Story in category: Film (HUN SD)
```php
$ncore = new Ncore('{passkey}');
$torrents = $ncore->download(
    [
        'search' => 'Toy Story',
        'cat' => Category::FILM_HUN_SD
    ],
    '{pathToDownload}',
    '{filename}'
);
```

## Contributing

Thank you for considering contributing to the PHP Ncore! To contribution follow the steps.

```bash
git clone git@github.com:igzard/ncore.git
composer install

cd tools/php-cs-fixer
composer install
```

For running tests:

```bash
make phpunit
```

or

```bash
php ./vendor/bin/phpunit
```

Coding style fix:

```bash
make cs-fix
```

or

```bash
php ./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src
```

---------------------

If you have any ideas, create an issue: https://github.com/igzard/ncore/issues 

## Licence

PHP Ncore is open-sourced software licensed under the MIT license.
