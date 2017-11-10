<?php

namespace ResellerClub\Orders\EmailForwarders;

use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\EmailAccounts\EmailAccount;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;

class EmailForwarder
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
        return (new EmailAccount($this->api))->delete($request);
    }
}
