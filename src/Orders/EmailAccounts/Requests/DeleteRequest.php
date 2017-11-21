<?php

namespace ResellerClub\Orders\EmailAccounts\Requests;

use ResellerClub\EmailAddress;
use ResellerClub\Orders\Order;

class DeleteRequest
{
    /**
     * ID of the order.
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
     * @param Order        $order
     * @param EmailAddress $email
     */
    public function __construct(Order $order, EmailAddress $email)
    {
        $this->order = $order;
        $this->email = $email;
    }

    /**
     * Get the ID of the order.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the email address to be deleted.
     *
     * @return EmailAddress
     */
    public function email(): EmailAddress
    {
        return $this->email;
    }
}
