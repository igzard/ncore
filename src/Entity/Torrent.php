<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity;

class Torrent
{
    private string $title;
    private string $link;
    private string $category;
    private string $pubDate;

    public function __construct(string $title, string $link, string $category, string $pubDate)
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

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPubDate(): string
    {
        return $this->pubDate;
    }
}