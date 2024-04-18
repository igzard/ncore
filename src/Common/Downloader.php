<?php

declare(strict_types=1);

namespace Igzard\Ncore\Common;

class Downloader
{
    public function download(string $path, string $filename, ?string $url): void
    {
        if (null === $url) {
            return;
        }

        file_put_contents($path.'/'.$filename, file_get_contents($url));
    }
}
