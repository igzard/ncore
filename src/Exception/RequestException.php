<?php

declare(strict_types=1);

namespace Igzard\Ncore\Exception;

class RequestException extends \Exception
{
    /**
     * @throws RequestException
     */
    public static function create(): self
    {
        throw new self('Invalid request');
    }
}
