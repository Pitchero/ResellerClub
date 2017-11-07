<?php

namespace ResellerClub;

use GuzzleHttp\Client;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;

class Api
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Client
     */
    private $guzzle_client;

    public function __construct(Config $config, Client $guzzle_client)
    {
        $this->config = $config;
        $this->guzzle_client = $guzzle_client;
    }

    public function post(string $uri, array $request)
    {
        return $this->makeApiCall('POST', $uri, $request);
    }

    public function businessEmailOrder()
    {
        return new BusinessEmailOrder($this);
    }

    private function makeApiCall($method, $uri, $request)
    {
        return $this->guzzle_client->request(
            $method,
            $this->baseApiUri() . $uri,
            array_merge($this->auth(), $request)
        );
    }

    private function baseApiUri()
    {
        return $this->config->isTestMode() ? 'https://test.httpapi.com/api/' : 'https://httpapi.com/api/';
    }

    private function auth()
    {
        return [
            'auth-userid' => $this->config->authUserId(),
            'api-key' => $this->config->apiKey(),
        ];
    }
}
