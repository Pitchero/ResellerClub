<?php

namespace ResellerClub\Orders\EmailAccounts\Requests;

use ResellerClub\Orders\Order;

class DeleteRequest
{
    /**
     * ID of the order which is to be renewed.
     *
     * @var Order
     */
    private $order;

    /**
     * Email address of the user.
     *
     * @var string
     */
    private $email;

    /**
     * Create a new request instance.
     *
     * @see https://manage.resellerclub.com/kb/answer/1049
     *
     * @param Order $order
     * @param string $email
     */
    public function __construct(Order $order, string $email)
    {
        $this->order = $order;
        $this->email = $email;
    }

    /**
     * Get the ID of the order to be renewed.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the number of months for which the order should be renewed.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
}
