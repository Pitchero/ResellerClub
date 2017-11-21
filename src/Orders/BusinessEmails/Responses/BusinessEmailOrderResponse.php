<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use ResellerClub\Orders\BusinessEmails\Responses\Concerns\HasAction;
use ResellerClub\Response;

class BusinessEmailOrderResponse extends Response
{
    use HasAction;

    /**
     * Get the domain parameter.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->description;
    }

    /**
     * Get the order ID parameter.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->entityid;
    }
}
