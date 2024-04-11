<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity;

use Igzard\Ncore\Enum\Category;

class Search
{
    private string $search = '';
    private Category $cat = Category::FILM_SD_HUN;

    public function getSearch(): string
    {
        return $this->search;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }

    public function getCat(): Category
    {
        return $this->cat;
    }

    public function setCat(Category $cat): self
    {
        $this->cat = $cat;

        return $this;
    }
}