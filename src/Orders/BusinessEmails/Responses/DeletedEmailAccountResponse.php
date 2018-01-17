<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Orders\BusinessEmails\Responses\Concerns\HasAction;
use ResellerClub\Response;

/**
 * @see https://manage.resellerclub.com/kb/answer/2159
 */
class DeletedEmailAccountResponse extends Response
{
    use HasAction;

    /**
     * Get the ID of the business email order.
     *
     * @return int
     */
    public function entityId(): int
    {
        return $this->entityid;
    }

    /**
     * Gets the domain name that this business email order has been created for.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->description;
    }
}
