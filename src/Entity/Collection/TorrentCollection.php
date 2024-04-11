<?php

declare(strict_types=1);

namespace Igzard\Ncore\Entity\Collection;

use Igzard\Ncore\Entity\Torrent;

class TorrentCollection
{
    public array $values;

    public function __construct(Torrent ...$values)
    {
        $this->values = $values;
    }

    public function count(): int
    {
        return count($this->values);
    }
}