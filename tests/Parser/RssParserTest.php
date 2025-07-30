<?php

declare(strict_types=1);

namespace Igzard\Ncore\Tests\Parser;

use Igzard\Ncore\Exception\EmptyResponseException;
use Igzard\Ncore\Parser\RssParser;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class RssParserTest extends TestCase
{
    private RssParser $rssParser;

    protected function setUp(): void
    {
        $this->rssParser = new RssParser();
    }

    /**
     * @dataProvider validXmlDataProvider
     */
    public function testParseWithValidXml(string $xmlContent, string $expectedRootElement): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')->willReturn($xmlContent);

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($stream);

        $result = $this->rssParser->parse($response);

        $this->assertInstanceOf(\SimpleXMLElement::class, $result);
        $this->assertEquals($expectedRootElement, $result->getName());
    }

    public function testParseWithEmptyResponse(): void
    {
        $this->expectException(EmptyResponseException::class);
        $this->expectExceptionMessage('Empty response received');

        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')->willReturn('');

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($stream);

        $this->rssParser->parse($response);
    }

    public function testParseWithInvalidXml(): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')->willReturn('invalid xml content');

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($stream);

        $result = $this->rssParser->parse($response);

        $this->assertFalse($result);
    }

    public static function validXmlDataProvider(): array
    {
        return [
            'basic RSS feed' => [
                'xmlContent' => '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel><title>Test RSS</title></channel></rss>',
                'expectedRootElement' => 'rss'
            ],
            'simple XML' => [
                'xmlContent' => '<?xml version="1.0"?><root><item>test</item></root>',
                'expectedRootElement' => 'root'
            ],
            'XML with namespaces' => [
                'xmlContent' => '<?xml version="1.0"?><feed xmlns="http://www.w3.org/2005/Atom"><title>Test Feed</title></feed>',
                'expectedRootElement' => 'feed'
            ]
        ];
    }
}