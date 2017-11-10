<?php

namespace ResellerClub\Orders\EmailForwarders;

use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\EmailForwarders\Requests\DeleteRequest;
use ResellerClub\Orders\EmailForwarders\Responses\DeletedResponse;

class EmailForwarders
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
            'mail/user/delete-user-forwards',
            [
                'order-id' => $request->orderId(),
                'email' => $request->email(),
            ]
        );

        return DeletedResponse::fromApiResponse($response);
    }
}
