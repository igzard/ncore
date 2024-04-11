<?php

declare(strict_types=1);

namespace Igzard\Ncore\Exception;

class EmptyPasskeyException extends \Exception
{
    /**
     * @throws EmptyPasskeyException
     */
    public static function create(): self
    {
        throw new self('The passkey is empty! Log in to ncore and copy it from Settings / Other Data.');
    }
}