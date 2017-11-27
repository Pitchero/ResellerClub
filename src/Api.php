<?php

namespace ResellerClub;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;
use ResellerClub\Orders\EmailAccounts\EmailAccount;
use ResellerClub\Orders\EmailForwarders\EmailForwarder;

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
     * Make a GET request.
     *
     * @param string $uri
     * @param array  $request
     *
     * @return Response
     */
    public function get(string $uri, array $request)
    {
        return $this->makeApiCall('GET', $uri, $request);
    }

    /**
     * Make a POST request.
     *
     * @param string $uri
     * @param array  $request
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
    public function businessEmailOrder(): BusinessEmailOrder
    {
        return new BusinessEmailOrder($this);
    }

    /**
     * Get a new business email order instance.
     *
     * @return EmailAccount
     */
    public function emailAccount(): EmailAccount
    {
        return new EmailAccount($this);
    }

    /**
     * Get a new email forwarder instance.
     *
     * @return EmailForwarder
     */
    public function emailForwarder(): EmailForwarder
    {
        return new EmailForwarder($this);
    }

    /**
     * Make an API call.
     *
     * @param string $method
     * @param string $uri
     * @param mixed  $request
     *
     * @throws ApiException
     *
     * @return Response
     */
    private function makeApiCall($method, $uri, $request)
    {
        try {
            return $this->guzzleClient->request(
                $method,
                $this->baseApiUri().$uri,
                [
                    $this->requestParameterType($method) => array_merge($this->auth(), $request),
                ]
            );
        } catch (RequestException $e) {
            throw (new ExceptionMapper())->map($e);
        }
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
     * Gets the request parameter type for the Guzzle client request.
     *
     * @param string $method
     *
     * @return string
     */
    private function requestParameterType(string $method): string
    {
        switch (strtolower($method)) {
            case 'post':
                return 'form_params';
            default:
                return 'query';
        }
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
            'api-key'     => $this->config->apiKey(),
        ];
    }
}
