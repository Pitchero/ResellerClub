<?php

namespace ResellerClub\Orders\EmailForwarders\Responses;

use ResellerClub\Response;

class AddedResponse extends Response
{
    /**
     * Get the response status.
     *
     * @return string
     */
    public function status(): string
    {
        return $this->response['status'];
    }
}
