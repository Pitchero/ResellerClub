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

    public function __construct(Config $config)
    {
        $this->config = $config;
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
        $client = new Client;
        return $client->request(
            $method,
            $this->baseApiURI() . $uri,
            array_merge($this->auth(), $request)
        );
    }

    private function baseApiURI()
    {
        return $this->config->testMode() ? 'https://test.httpapi.com/api/' : 'https://httpapi.com/api/';
    }

    private function auth()
    {
        return [
            'auth-userid' => $this->config->authUserId(),
            'api-key' => $this->config->apiKey(),
        ];
    }
}
