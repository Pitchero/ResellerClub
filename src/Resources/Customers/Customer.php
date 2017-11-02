<?php

namespace ResellerClub\Resources\Customers;

class Customer
{
    /**
     * @var integer
     */
    private $id;

    public function __construct(int $customer_id)
    {
        $this->id = $customer_id;
    }

    public function id(): int
    {
        return (int) $this->id;
    }
}
