<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity;

use Igzard\Ncore\Common\Infrastructure\DateTime;
use Igzard\Ncore\Enum\Category;

class Torrent
{
    private string $title;
    private string $link;
    private Category $category;
    private DateTime $pubDate;

    public function __construct(string $title, string $link, Category $category, DateTime $pubDate)
    {
        $this->title = $title;
        $this->link = $link;
        $this->category = $category;
        $this->pubDate = $pubDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getPubDate(): DateTime
    {
        return $this->pubDate;
    }
}
