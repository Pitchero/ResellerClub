<?php

namespace ResellerClub\Orders\BusinessEmails;

use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\Requests\BusinessEmailOrderRequest;
use ResellerClub\Orders\BusinessEmails\Requests\RenewRequest;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;
use ResellerClub\Orders\BusinessEmails\Responses\RenewalResponse;
use ResellerClub\Orders\Order;

class BusinessEmailOrder
{
    /**
     * @var Config
     */
    private $api;

    /**
     * Create a new business email order instance.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Place a business email order for the specified domain name.
     *
     * @see https://manage.resellerclub.com/kb/answer/2156
     *
     * @param BusinessEmailOrderRequest $request
     *
     * @return CreateResponse
     */
    public function create(BusinessEmailOrderRequest $request): CreateResponse
    {
        $response = $this->api->post(
            'eelite/us/add',
            [
                'domain-name' => $request->domain(),
                'customer-id' => $request->customerId(),
                'months' => $request->forNumberOfMonths(),
                'no-of-accounts' => $request->numberOfAccounts(),
                'invoice-option' => (string) $request->invoiceOption(),
            ]
        );

        return CreateResponse::fromApiResponse($response);
    }

    /**
     * Makes a POST request to ResellerClub's 'delete' business email order API.
     *
     * @see https://manage.resellerclub.com/kb/answer/2162
     *
     * @param Order $request
     *
     * @return BusinessEmailOrderResponse
     */
    public function delete(Order $request): BusinessEmailOrderResponse
    {
        $response = $this->api->post(
            'eelite/us/delete',
            [
                'order-id' => $request->id()
            ]
        );

        return BusinessEmailOrderResponse::fromApiResponse($response);
    }

    /**
     * Renew an existing business email order.
     *
     * @param RenewRequest $request
     *
     * @return RenewalResponse
     */
    public function renew(RenewRequest $request): RenewalResponse
    {
        $response = $this->api->post('eelite/us/renew', [
            'order-id' => $request->orderId(),
            'months' => $request->months(),
            'no-of-accounts' => $request->numberOfAccounts(),
            'invoice-option' => $request->invoiceOption(),
        ]);

        return RenewalResponse::fromApiResponse($response);
    }
}
