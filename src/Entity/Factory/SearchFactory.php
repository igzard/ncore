<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity\Factory;

use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Enum\Category;

class SearchFactory
{
    public function createFromArray(array $search): Search
    {
        return (new Search())
            ->setSearch($search['search'])
            ->setCat($search['cat'] ?? Category::FILM_HUN_SD);
    }
}
