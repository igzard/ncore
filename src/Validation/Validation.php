<?php

declare(strict_types=1);

namespace Igzard\Ncore\Validation;

use Igzard\Ncore\Exception\EmptyPasskeyException;

class Validation
{
    /**
     * @throws EmptyPasskeyException
     */
    public function validatePasskey(string $passkey): void
    {
        if (empty($passkey)) {
            EmptyPasskeyException::create();
        }
    }
}
