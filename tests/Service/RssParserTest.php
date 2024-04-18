<?php

declare(strict_types=1);

namespace Igzard\Ncore\Tests\Service;

use Igzard\Ncore\Common\Infrastructure\DateTime;
use Igzard\Ncore\Entity\Collection\TorrentCollection;
use Igzard\Ncore\Entity\Torrent;
use Igzard\Ncore\Enum\Category;
use Igzard\Ncore\Service\RssParser;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Response;

class RssParserTest extends TestCase
{
    private RssParser $rssParser;

    protected function setUp(): void
    {
        $this->rssParser = new RssParser('342432432');
    }

    public function testParse(): void
    {
        $response = new Response(200, [], file_get_contents(__DIR__ . '/test_xml/test_01.xml'));

        $expectTorrents = [
            new Torrent(
                'Toy.Story.of.Terror.2013.BDRip.x264.DD5.1.HUN-GEO',
                'https://ncore.pro/torrents.php?action=download&id=3249413&key=342432432',
                Category::FILM_HUN_SD,
                new DateTime('Fri, 29 Oct 2021 19:44:36 +0200')
            ),
            new Torrent(
                'Toy Story 4',
                'https://ncore.pro/torrents.php?action=download&id=3118057&key=342432432',
                Category::FILM_HUN_SD,
                new DateTime('Mon, 21 Dec 2020 19:02:48 +0100')
            ),
        ];

        $this->assertEquals(
            new TorrentCollection(...$expectTorrents),
            $this->rssParser->parse($response)
        );
    }
}