<?php

declare(strict_types=1);

namespace Igzard\Ncore\Tests\Entity\Factory;

use Igzard\Ncore\Entity\Factory\SearchFactory;
use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Enum\Category;
use PHPUnit\Framework\TestCase;

class SearchFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->searchFactory = new SearchFactory();
    }

    /**
     * @dataProvider searchDataProvider
     */
    public function testFactory(array $searchPayload, Search $expectedSearch): void
    {
        $search = $this->searchFactory->createFromArray($searchPayload);

        $this->assertEquals($expectedSearch, $search);
    }

    public static function searchDataProvider(): array
    {
        return [
            'case 1# - ToyStory in FILM HUN SD category' => [
                'searchPayload' => [
                    'search' => 'Toy Story',
                    'category' => Category::FILM_HUN_SD,
                ],
                'expectedSearch' => (new Search())
                    ->setSearch('Toy Story')
                    ->setCategory(Category::FILM_HUN_SD)
            ],
            'case 2# - ToyStory without category' => [
                'searchPayload' => [
                    'search' => 'Toy Story',
                ],
                'expectedSearch' => (new Search())
                    ->setSearch('Toy Story')
                    ->setCategory(Category::FILM_HUN_SD)
            ],
            'case 3# - Spiderman in category' => [
                'searchPayload' => [
                    'search' => 'Toy Story',
                    'category' => Category::FILM_ENG_HD,
                ],
                'expectedSearch' => (new Search())
                    ->setSearch('Toy Story')
                    ->setCategory(Category::FILM_ENG_HD)
            ],
        ];
    }
}