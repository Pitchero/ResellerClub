<?php

namespace ResellerClub\Orders\Domains;

use ResellerClub\Api;
use ResellerClub\Orders\Domains\Requests\GetByDomainRequest;
use ResellerClub\Orders\Domains\Requests\GetRequest;
use ResellerClub\Orders\Domains\Responses\GetResponse;

class DomainOrder
{
    /**
     * @var Api
     */
    private $api;

    /**
     * The API calls to the email account management of ResellerClub.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Makes a GET request to ResellerClub's 'details' domain API.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @param GetRequest $request
     *
     * @return GetResponse
     */
    public function get(GetRequest $request): GetResponse
    {
        $response = $this->api->get(
            'domains/details.json',
            [
                'order-id' => $request->orderId(),
                'options' => $request->orderDetailType(),
            ]
        );

        return GetResponse::fromApiResponse($response);
    }

    /**
     * Makes a GET request to ResellerClub's 'details-by-name' domain API.
     *
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @param GetByDomainRequest $request
     *
     * @return GetResponse
     */
    public function getByDomain(GetByDomainRequest $request): GetResponse
    {
        $response = $this->api->get(
            'domains/details-by-name.json',
            [
                'domain-name' => $request->domain(),
                'options' => $request->orderDetailType(),
            ]
        );

        return GetResponse::fromApiResponse($response);
    }
}
