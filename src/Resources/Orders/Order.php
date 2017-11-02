<?php

namespace ResellerClub\Resources\Orders;

class Order implements OrderInterface
{
    /**
     * @var integer
     */
    private $id;

    public function __construct(int $order_id)
    {
        $this->id = $order_id;
    }

    public function id(): int
    {
        return (int) $this->id;
    }
}