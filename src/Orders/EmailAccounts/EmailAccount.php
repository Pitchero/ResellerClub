<?php

namespace ResellerClub\Orders\EmailAccounts;

use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;

class EmailAccount
{
    /**
     * @var Config
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
     * Makes a POST request to ResellerClub's 'delete' email accounts.
     *
     * @see https://manage.resellerclub.com/kb/answer/1049
     *
     * @param DeleteRequest $request
     *
     * @return DeletedResponse
     */
    public function delete(DeleteRequest $request): DeletedResponse
    {
        $response = $this->api->post(
            'mail/user/delete.json',
            [
                'order-id' => $request->orderId(),
                'email' => $request->email(),
            ]
        );

        return DeletedResponse::fromApiResponse($response);
    }
}
