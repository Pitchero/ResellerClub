<?php

namespace ResellerClub\Orders\EmailAccounts;

use ResellerClub\Api;
use ResellerClub\Orders\EmailAccounts\Requests\CreateRequest;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\CreateResponse;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;

class EmailAccount
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
     * Makes a POST request to ResellerClub's 'add' email accounts.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @param CreateRequest $request
     *
     * @return CreateResponse
     */
    public function create(CreateRequest $request): CreateResponse
    {
        $response = $this->api->post(
            'mail/user/add.json',
            [
                'order-id'           => $request->orderId(),
                'email'              => (string) $request->email(),
                'passwd'             => $request->password(),
                'notification-email' => (string) $request->notificationEmail(),
                'first-name'         => $request->firstName(),
                'last-name'          => $request->lastName(),
                'country-code'       => $request->countryCode(),
                'language-code'      => $request->languageCode(),
            ]
        );

        return CreateResponse::fromApiResponse($response);
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
                'email'    => (string) $request->email(),
            ]
        );

        return DeletedResponse::fromApiResponse($response);
    }
}
