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
}
