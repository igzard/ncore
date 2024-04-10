<?php

declare(strict_types=1);

namespace Ignacz\Ncoreparser;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use Ignacz\Ncoreparser\Exception\AuthenticationException;
use Psr\Http\Message\ResponseInterface;

class NcoreClient
{
    private const URL = 'https://ncore.pro';

    private string $username;
    private string $password;

    private Client $client;
    private CookieJar $cookieJar;

    /**
     * @throws GuzzleException
     * @throws AuthenticationException
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;

        $this->cookieJar = new CookieJar();
        $this->client = new \GuzzleHttp\Client();

        $response = $this->client->request('POST', self::URL.'/login.php', [
            'headers' => [
                'User-Agent' => 'php ncoreparser',
            ],
            'allow_redirects' => true,
            'form_params' => [
                'nev' => $this->username,
                'pass' => $this->password,
            ],
            'cookies' => $this->cookieJar,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw AuthenticationException::create();
        }
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $endpoint, array $data = [], string $method = 'GET'): ResponseInterface
    {
        $cookies = [
            'cookies' => $this->cookieJar,
        ];

        return $this->client->request($method, self::URL.$endpoint, array_merge($cookies, $data));
    }
}