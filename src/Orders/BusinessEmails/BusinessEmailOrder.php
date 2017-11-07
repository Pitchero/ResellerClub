<?php

namespace ResellerClub\Orders\BusinessEmails;

use ResellerClub\Api;
use ResellerClub\Config;

class BusinessEmailOrder
{
    /**
     * @var Config
     */
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Makes a POST request to ResellerClub's 'add' business email order API.
     * https://manage.resellerclub.com/kb/answer/2156
     */
    public function create(BusinessEmailOrderRequest $request): BusinessEmailOrderResource
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

        return BusinessEmailOrderResource::fromResponse($response);
    }
}
