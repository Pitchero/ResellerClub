<?php

namespace ResellerClub\Orders\BusinessEmails;

use GuzzleHttp\Client;
use ResellerClub\Resources\Orders\BusinessEmailOrder;

class BusinessEmailOrderCreate
{
    /**
     * Makes a POST request to ResellerClub's 'add' business email order API.
     * https://manage.resellerclub.com/kb/answer/2156
     */
    public function order(BusinessEmailOrder $business_email_order)
    {
        $client = new Client();
        try {
            $client->request(
                'POST',
                $this->baseApiURI() . 'eelite/us/add.json',
                [
                    'auth-userid' => 715226,
                    'api-key' => 'GL9zQ7EiPHBeHQqhwpaC3HTg8Ne033Dp',
                    'domain-name' => $business_email_order->domain(),
                    'customer-id' => $business_email_order->customer()->id(),
                    'months' => $business_email_order->forNumberOfMonths(),
                    'no-of-accounts' => $business_email_order->numberOfAccounts(),
                    'invoice-option' => $business_email_order->invoice()->paymentState(),
                ]
            );
        } catch (\Exception $e) {
            var_dump($e);
            die();
        }

    }

    private function baseApiURI()
    {
        return 'https://test.httpapi.com/api/';
    }
}
