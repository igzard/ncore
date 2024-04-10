<?php

declare(strict_types=1);

namespace Ignacz\Ncoreparser\Exception;

class AuthenticationException extends \Exception
{
    /**
     * @throws AuthenticationException
     */
    public static function create(): self
    {
        throw new self('Invalid authentication');
    }
}