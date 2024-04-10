<?php

declare(strict_types=1);

namespace Ignacz\Ncoreparser\Client;

use GuzzleHttp\Exception\GuzzleException;
use Ignacz\Ncoreparser\NcoreClient;
use Psr\Http\Message\ResponseInterface;

class HitNRun
{
    private const ENDPOINT = '/hitnrun.php';

    private NcoreClient $ncoreClient;

    public function __construct(NcoreClient $ncoreClient)
    {
        $this->ncoreClient = $ncoreClient;
    }

    /**
     * @throws GuzzleException
     */
    public function handle(): ResponseInterface
    {
        return $this->ncoreClient->request(self::ENDPOINT);
    }
}