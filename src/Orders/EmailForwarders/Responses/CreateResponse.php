<?php

namespace ResellerClub\Orders\EmailForwarders\Responses;

use ResellerClub\Response;
use ResellerClub\Status;

class CreateResponse extends Response
{
    /**
     * Get the response status.
     *
     * @return Status
     */
    public function status(): Status
    {
        return new Status($this->response['status']);
    }
}
