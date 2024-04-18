<?php

declare(strict_types=1);

namespace Igzard\Ncore\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Igzard\Ncore\Entity\Search;
use Igzard\Ncore\Exception\ClientException;
use Igzard\Ncore\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class NcoreClient
{
    private const RSS_URL = 'https://finderss.it.cx/';

    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws RequestException
     * @throws ClientException
     */
    public function search(Search $search): ResponseInterface
    {
        $options = [
            's='.$search->getSearch(),
            'cat='.$search->getCat()->value(),
        ];

        try {
            $response = $this->client->request('GET', self::RSS_URL.'?&'.implode('&', $options).',');
        } catch (GuzzleException $e) {
            throw new ClientException($e->getMessage(), $e->getCode(), $e);
        }

        if (200 !== $response->getStatusCode()) {
            throw RequestException::create();
        }

        return $response;
    }
}
