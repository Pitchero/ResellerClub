<?php

namespace ResellerClub\Orders\BusinessEmails\Resources;

use ResellerClub\Resource;
use ResellerClub\Orders\BusinessEmails\Resources\Concerns\HasAction;

class BusinessEmailOrderResource extends Resource
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
