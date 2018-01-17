<?php

namespace ResellerClub\Orders\BusinessEmails\Requests;

use ResellerClub\Orders\Order;

/**
 * @see https://manage.resellerclub.com/kb/answer/2159
 */
class DeleteEmailAccountRequest
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @var int
     */
    private $numberOfAccounts;

    /**
     * DeleteEmailAccountRequest constructor.
     *
     * @param Order $order
     * @param int   $numberOfAccounts
     */
    public function __construct(Order $order, int $numberOfAccounts)
    {
        $this->order = $order;
        $this->numberOfAccounts = $numberOfAccounts;
    }

    /**
     * Get the order ID.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the number of email accounts to be deleted from the business email order.
     *
     * @return int
     */
    public function numberOfAccounts(): int
    {
        return $this->numberOfAccounts;
    }
}
