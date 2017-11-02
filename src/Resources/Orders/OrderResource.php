<?php

namespace ResellerClub\Resources\Orders;

class OrderResource implements OrderResourceInterface
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