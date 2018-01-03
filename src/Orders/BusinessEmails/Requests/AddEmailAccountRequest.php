<?php

namespace ResellerClub\Orders\BusinessEmails\Requests;

use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

/**
 * @see https://manage.resellerclub.com/kb/answer/2158
 */
class AddEmailAccountRequest
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
     * @var InvoiceOption
     */
    private $invoiceOption;

    /**
     * AddEmailAccountRequest constructor.
     * @param Order         $order
     * @param int           $numberOfAccounts
     * @param InvoiceOption $invoiceOption
     */
    public function __construct(Order $order, int $numberOfAccounts, InvoiceOption $invoiceOption)
    {
        $this->order = $order;
        $this->numberOfAccounts = $numberOfAccounts;
        $this->invoiceOption = $invoiceOption;
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
     * Get the number of additional email accounts to be purchased for the business email order.
     *
     * @return int
     */
    public function numberOfAccounts(): int
    {
        return $this->numberOfAccounts;
    }

    /**
     * Get how the customer invoices will be handled.
     *
     * @return InvoiceOption
     */
    public function invoiceOption(): InvoiceOption
    {
        return $this->invoiceOption;
    }
}
