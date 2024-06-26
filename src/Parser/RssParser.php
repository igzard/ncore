<?php

declare(strict_types=1);

namespace Igzard\Ncore\Parser;

use Igzard\Ncore\Exception\EmptyResponseException;
use Psr\Http\Message\ResponseInterface;

class RssParser
{
    /**
     * @throws EmptyResponseException
     */
    public function parse(ResponseInterface $response): \SimpleXMLElement
    {
        $content = $response->getBody()->getContents();

        if ('' === $content) {
            throw EmptyResponseException::create();
        }

        return simplexml_load_string($content);
    }
}
