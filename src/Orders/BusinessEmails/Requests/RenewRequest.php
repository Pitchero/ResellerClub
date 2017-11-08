<?php

namespace ResellerClub\Orders\BusinessEmails\Requests;

use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class RenewRequest
{
    /**
     * ID of the order which is to be renewed.
     *
     * @var Order
     */
    protected $order;

    /**
     * The number of months for which the order is to be renewed.
     *
     * @var int
     */
    protected $months;

    /**
     * Additional email accounts to be purchased for the business email order, if required.
     *
     * @var int
     */
    protected $numberOfAccounts;

    /**
     * Determine how the customer invoices will be handled.
     *
     * @var InvoiceOption
     */
    protected $invoiceOption;

    /**
     * Create a new request instance.
     *
     * @param Order $order
     * @param int $months
     * @param int $numberOfAccounts
     * @param InvoiceOption $invoiceOption
     */
    public function __construct(Order $order, int $months, int $numberOfAccounts, InvoiceOption $invoiceOption)
    {
        $this->order = $order;
        $this->months = $months;
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
     * Get the number of months for which the order should be renewed.
     *
     * @return int
     */
    public function months(): int
    {
        return $this->months;
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
