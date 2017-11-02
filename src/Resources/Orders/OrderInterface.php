<?php

namespace ResellerClub\Resources\Orders;

interface OrderInterface
{
    public function id(): int;

    public function setId(int $order_id);
}