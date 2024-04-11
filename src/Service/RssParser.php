<?php

declare(strict_types=1);

namespace Igzard\Ncore\Service;

use Igzard\Ncore\Common\Infrastructure\DateTime;
use Igzard\Ncore\Entity\Collection\TorrentCollection;
use Igzard\Ncore\Entity\Torrent;
use Igzard\Ncore\Enum\Category;
use Psr\Http\Message\ResponseInterface;

class RssParser
{
    private string $passkey;

    public function __construct(string $passkey)
    {
        $this->passkey = $passkey;
    }

    public function parse(ResponseInterface $response): TorrentCollection
    {
        $feed = simplexml_load_string($response->getBody()->getContents());

        return $this->handle($feed->channel->item);
    }

    private function handle(\SimpleXMLElement $items): TorrentCollection
    {
        $torrents = [];

        foreach($items as $item) {
            $torrents[] = new Torrent(
                (string) $item->title,
                $item->link . '&key=' . $this->passkey,
                Category::make((string) $item->category),
                new DateTime((string) $item->pubDate)
            );
        }

        return new TorrentCollection(...$torrents);
    }
}