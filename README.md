# PHP Package for Ncore RSS

<p align="center">
<a href="https://packagist.org/packages/igzard/ncore"><img src="https://img.shields.io/packagist/dt/igzard/ncore" alt="Total Downloads"></a>
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
$torrents = $ncore->search(
    (new Search())
        ->setSearch('Toy Story')
        ->setCat(Category::FILM_HUN_SD)
);
```

## Contributing

Thank you for considering contributing to the PHP Ncore! To contribution follow the steps.

```bash
git clone git@github.com:igzard/ncore.git
cd ncore
composer install
```

branch name: {category}/{name} (eg.: fix/typo)

---------------------

If you have any ideas, create an issue: https://github.com/igzard/ncore/issues 

## Licence

PHP Ncore is open-sourced software licensed under the MIT license.
