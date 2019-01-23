<?php

namespace ResellerClub\Orders\Domains;

use ResellerClub\Api;
use ResellerClub\Orders\Domains\Requests\GetByDomainRequest;
use ResellerClub\Orders\Domains\Requests\GetRequest;
use ResellerClub\Orders\Domains\Requests\RenewRequest;
use ResellerClub\Orders\Domains\Responses\GetResponse;
use ResellerClub\Orders\Domains\Responses\RenewalResponse;

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
                'options'  => (string) $request->orderDetailType(),
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
                'options'     => (string) $request->orderDetailType(),
            ]
        );

        return GetResponse::fromApiResponse($response);
    }

    /**
     * Makes a POST request to ResellerClub's 'renew' domain API.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @param RenewRequest $request
     *
     * @return RenewalResponse
     */
    public function renew(RenewRequest $request): RenewalResponse
    {
        $response = $this->api->post(
            'domains/renew.json',
            [
                'order-id'         => $request->orderId(),
                'years'            => $request->years(),
                'exp-date'         => $request->currentExpiryTimestamp(),
                'purchase-privacy' => $request->purchasePrivacyProtection(),
                'auto-renew'       => $request->autoRenew(),
                'invoice-option'   => (string) $request->invoiceOption(),
            ]
        );

        return RenewalResponse::fromApiResponse($response);
    }
}
