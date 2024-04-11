<?php

declare(strict_types=1);

namespace Igzard\Ncore\Common;

class Downloader
{
    public function download(string $path, string $filename, string $url): void
    {
        file_put_contents($path . '/' . $filename, file_get_contents($url));
    }
}