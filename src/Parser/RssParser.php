<?php

declare(strict_types=1);

namespace Igzard\Ncore\Parser;

use Psr\Http\Message\ResponseInterface;

class RssParser
{
    public function parse(ResponseInterface $response): \SimpleXMLElement
    {
        return simplexml_load_string($response->getBody()->getContents());
    }
}
