<?php

namespace ResellerClub\Orders\EmailForwarders\Requests;

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
     * A comma-separated list of email addresses for the forwarders to be removed.
     *
     * @var string
     */
    private $forwarders;

    /**
     * Create a new request instance.
     *
     * @param Order $order
     * @param string $email
     * @param string $forwarders
     */
    public function __construct(Order $order, string $email, string $forwarders)
    {
        $this->order = $order;
        $this->email = $email;
        $this->forwarders = $forwarders;
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

    /**
     * Get the number of additional email accounts to be purchased for the business email order.
     *
     * @return string
     */
    public function forwarders(): string
    {
        return $this->forwarders;
    }
}
