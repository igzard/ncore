<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity\Collection\Factory;

use Igzard\Ncore\Entity\Collection\TorrentCollection;
use Igzard\Ncore\Entity\Torrent;
use Igzard\Ncore\Enum\Category;
use Igzard\Ncore\Infrastructure\DateTime;

class TorrentCollectionFactory
{
    public function createFromXml(\SimpleXMLElement $xml, string $passkey): TorrentCollection
    {
        $torrents = [];

        foreach ($xml->channel->item as $item) {
            $torrents[] = new Torrent(
                (string) $item->title,
                $item->link.'&key='.$passkey,
                Category::make((string) $item->category),
                new DateTime((string) $item->pubDate)
            );
        }

        return new TorrentCollection(...$torrents);
    }
}
