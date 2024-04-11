<?php

declare(strict_types=1);

namespace Ignacz\Ncoreparser;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use Ignacz\Ncoreparser\Exception\AuthenticationException;
use Igzard\Ncore\Entity\Search;
use Psr\Http\Message\ResponseInterface;

class Ncore
{
    private const RSS_URL = 'https://finderss.it.cx/?';

    private string $passkey;
    private Client $client;

    public function __construct(string $passkey)
    {
        $this->passkey = $passkey;
        $this->client = new \GuzzleHttp\Client();

        # $feed = simplexml_load_string($feed);
    }

    /**
     * @throws GuzzleException
     */
    public function search(Search $search): ResponseInterface
    {
        $options = [
            'query' => [
                's' => $search->getSearch(),
                'cat' => $search->getCat(),
            ],
        ];

        return $this->client->request('GET', self::RSS_URL, $options);
    }
}