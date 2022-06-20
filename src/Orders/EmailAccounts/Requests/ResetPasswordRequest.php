<?php

namespace ResellerClub\Orders\EmailAccounts\Requests;

use ResellerClub\EmailAddress;
use ResellerClub\Orders\Order;

class ResetPasswordRequest
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @var EmailAddress
     */
    private $emailAddress;

    /**
     * ResetPassword constructor.
     *
     * @param Order $order
     * @param EmailAddress $emailAddress
     */
    public function __construct(Order $order, EmailAddress $emailAddress)
    {
        $this->order = $order;
        $this->emailAddress = $emailAddress;
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
     * Get the email address of the password reset.
     *
     * @return EmailAddress
     */
    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }
}