<?php

namespace ResellerClub\Orders;

class Order
{
    /**
     * @var integer
     */
    private $id;

    /**
     * Create a new order instance.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Get the order ID.
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }
}
