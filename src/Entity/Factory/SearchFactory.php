<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity\Factory;

use Igzard\Ncore\Entity\Search;

class SearchFactory
{
    public function createFromArray(array $searchPayload): Search
    {
        $search = new Search();
        $search->setSearch($searchPayload['search']);

        if (isset($searchPayload['category'])) {
            $search->setCategory($searchPayload['category']);
        }

        return $search;
    }
}
