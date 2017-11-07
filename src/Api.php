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

    /**
     * @var string
     */
    const TEST_API_URI = 'https://test.httpapi.com/api/';

    /**
     * @var string
     */
    const LIVE_API_URI = 'https://httpapi.com/api/';

    /**
     * Create a new API instance.
     *
     * @param Config $config
     * @param Client $guzzle_client
     */
    public function __construct(Config $config, Client $guzzle_client)
    {
        $this->config = $config;
        $this->guzzle_client = $guzzle_client;
    }

    /**
     * Make a POST request.
     *
     * @param string $uri
     * @param array $request
     *
     * @return Response
     */
    public function post(string $uri, array $request)
    {
        return $this->makeApiCall('POST', $uri, $request);
    }

    /**
     * Get a new business email order instance.
     *
     * @return BusinessEmailOrder
     */
    public function businessEmailOrder()
    {
        return new BusinessEmailOrder($this);
    }

    /**
     * Make an API call.
     *
     * @param string $method
     * @param string $uri
     * @param mixed $request
     *
     * @return Response
     */
    private function makeApiCall($method, $uri, $request)
    {
        return $this->guzzle_client->request(
            $method,
            $this->baseApiUri() . $uri,
            array_merge($this->auth(), $request)
        );
    }

    /**
     * Get the base API URI for requests.
     *
     * @return string
     */
    private function baseApiUri()
    {
        return $this->config->isTestMode() ? static::TEST_API_URI
                                           : static::LIVE_API_URI;
    }

    /**
     * Get authentication details for API requests.
     *
     * @return array
     */
    private function auth()
    {
        return [
            'auth-userid' => $this->config->authUserId(),
            'api-key' => $this->config->apiKey(),
        ];
    }
}
