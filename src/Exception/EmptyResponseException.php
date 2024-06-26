<?php

declare(strict_types=1);

namespace Igzard\Ncore\Exception;

class EmptyResponseException extends \Exception
{
    public static function create(): self
    {
        return new self('Empty response received');
    }
}
