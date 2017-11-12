<?php

namespace ResellerClub\Orders\EmailForwarders;

use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\EmailAccounts\EmailAccount;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;
use ResellerClub\Orders\EmailForwarders\Requests\AddRequest;
use ResellerClub\Orders\EmailForwarders\Responses\AddedResponse;

class EmailForwarder
{
    /**
     * @var Api
     */
    private $api;

    /**
     * Create a new email forwarder instance.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Add a forward-only email account.
     *
     * @link https://manage.resellerclub.com/kb/answer/1038
     *
     * @param AddRequest $request
     *
     * @return AddedResponse
     */
    public function add(AddRequest $request): AddedResponse
    {
        $response = $this->api->post('mail/user/add-forward-only-account.json', [
            'order-id' => $request->orderId(),
            'email' => $request->email(),
            'forwards' => $request->forwarders(),
        ]);

        return AddedResponse::fromApiResponse($response);
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
        return (new EmailAccount($this->api))->delete($request);
    }
}
