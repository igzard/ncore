<?php

declare(strict_types=1);

namespace Igzard\Ncore\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Enum\Category;
use Igzard\Ncore\Exception\ClientException;
use Igzard\Ncore\Exception\EmptyPasskeyException;
use Igzard\Ncore\Exception\RequestException;
use Igzard\Ncore\Ncore;
use PHPUnit\Framework\TestCase;

class NcoreTest extends TestCase
{
    private Ncore $ncore;

    protected function setUp(): void
    {
        $this->ncore = new Ncore('342432432');
    }

    /**
     * @throws RequestException
     * @throws ClientException
     */
    public function testPasskeyIsEmpty(): void
    {
        $this->expectException(EmptyPasskeyException::class);

        $this->ncore = new Ncore('');
        $this->ncore->search((new Search())
            ->setSearch('Toy Story')
            ->setCat(Category::FILM_HUN_SD));
    }

    public function testFailed(): void
    {
        $this->assertTrue(false);
    }
}