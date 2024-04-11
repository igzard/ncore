<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity;

class Search
{
    private string $search = '';
    private string $cat = 'Film%20(HUN%20SD)';

    public function getSearch(): string
    {
        return $this->search;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }

    public function getCat(): string
    {
        return $this->cat;
    }

    public function setCat(string $cat): self
    {
        $this->cat = $cat;

        return $this;
    }
}