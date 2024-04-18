<?php

declare(strict_types=1);

namespace Igzard\Ncore\Tests\Validation;

use Igzard\Ncore\Exception\EmptyPasskeyException;
use Igzard\Ncore\Validation\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    private Validation $validation;

    protected function setUp(): void
    {
        $this->validation = new Validation();
    }

    public function testValidatePasskey(): void
    {
        $this->expectException(EmptyPasskeyException::class);

        $this->validation->validatePasskey('');
    }
}