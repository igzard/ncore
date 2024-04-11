# PHP Package for Ncore RSS

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
        ->setCat(Category::FILM_SD_HUN)
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

After Open the PR.

## Licence

PHP Ncore is open-sourced software licensed under the MIT license.
