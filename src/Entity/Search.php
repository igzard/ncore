<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity;

use Igzard\Ncore\Enum\Category;

class Search
{
    private string $search = '';
    private Category $category = Category::FILM_HUN_SD;

    public function getSearch(): string
    {
        return $this->search;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
