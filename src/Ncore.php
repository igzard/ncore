<?php

declare(strict_types=1);

namespace Igzard\Ncore;

use GuzzleHttp\Exception\GuzzleException;
use Igzard\Ncore\Common\Downloader;
use Igzard\Ncore\Entity\Collection\Factory\TorrentCollectionFactory;
use Igzard\Ncore\Entity\Collection\TorrentCollection;
use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Exception\EmptyPasskeyException;
use Igzard\Ncore\Exception\RequestException;
use Igzard\Ncore\Service\RssParser;

class Ncore
{
    private const RSS_URL = 'https://finderss.it.cx/';

    private \GuzzleHttp\Client $client;

    private string $passkey;
    private RssParser $rssParser;
    private Downloader $downloader;
    private TorrentCollectionFactory $torrentCollectionFactory;

    /**
     * @throws EmptyPasskeyException
     */
    public function __construct(string $passkey)
    {
        $this->validatePasskey($passkey);

        $this->client = new \GuzzleHttp\Client();

        $this->passkey = $passkey;
        $this->rssParser = new RssParser();
        $this->downloader = new Downloader();
        $this->torrentCollectionFactory = new TorrentCollectionFactory();
    }

    /**
     * @throws GuzzleException
     * @throws RequestException
     */
    public function search(Search $search): TorrentCollection
    {
        $options = [
            's='.$search->getSearch(),
            'cat='.$search->getCat()->value(),
        ];

        $response = $this->client->request('GET', self::RSS_URL.'?&'.implode('&', $options).',');

        if ($response->getStatusCode() !== 200) {
            throw RequestException::create();
        }

        return $this->torrentCollectionFactory->createFromXml(
            $this->rssParser->parse($response),
            $this->passkey
        );
    }

    /**
     * @throws GuzzleException
     * @throws RequestException
     */
    public function download(Search $search, string $path, string $filename): void
    {
        $this->downloader->download($path, $filename, $this->search($search)->first()->getLink());
    }

    /**
     * @throws EmptyPasskeyException
     */
    private function validatePasskey(string $passkey): void
    {
        if (empty($passkey)) {
            EmptyPasskeyException::create();
        }
    }
}