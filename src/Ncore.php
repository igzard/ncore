<?php

declare(strict_types=1);

namespace Igzard\Ncore;

use Igzard\Ncore\Client\NcoreClient;
use Igzard\Ncore\Entity\Collection\Factory\TorrentCollectionFactory;
use Igzard\Ncore\Entity\Collection\TorrentCollection;
use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Exception\ClientException;
use Igzard\Ncore\Exception\EmptyPasskeyException;
use Igzard\Ncore\Exception\RequestException;
use Igzard\Ncore\Parser\RssParser;
use Igzard\Ncore\Service\Downloader;
use Igzard\Ncore\Validation\Validation;

class Ncore
{
    private string $passkey;

    private NcoreClient $client;
    private RssParser $rssParser;
    private Downloader $downloader;
    private TorrentCollectionFactory $torrentCollectionFactory;

    /**
     * @throws EmptyPasskeyException
     */
    public function __construct(string $passkey)
    {
        (new Validation())->validatePasskey($passkey);

        $this->client = new NcoreClient();

        $this->passkey = $passkey;
        $this->rssParser = new RssParser();
        $this->downloader = new Downloader();
        $this->torrentCollectionFactory = new TorrentCollectionFactory();
    }

    /**
     * @throws RequestException
     * @throws ClientException
     */
    public function search(Search $search): TorrentCollection
    {
        return $this->torrentCollectionFactory->createFromXml(
            $this->rssParser->parse($this->client->search($search)),
            $this->passkey
        );
    }

    /**
     * @throws RequestException
     * @throws ClientException
     */
    public function download(Search $search, string $path, string $filename): void
    {
        $this->downloader->download($path, $filename, $this->search($search)->first()->getLink());
    }
}
