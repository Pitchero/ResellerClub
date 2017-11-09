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
    private $guzzleClient;

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
     * @param Client $guzzleClient
     */
    public function __construct(Config $config, Client $guzzleClient)
    {
        $this->config = $config;
        $this->guzzleClient = $guzzleClient;
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
    public function businessEmailOrder() : BusinessEmailOrder
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
        return $this->guzzleClient->request(
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
