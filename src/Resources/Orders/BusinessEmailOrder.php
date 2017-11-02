<?php

namespace ResellerClub\Resources\Orders;

use ResellerClub\Resources\Invoices\Invoice;
use ResellerClub\Resources\Customers\Customer;

class BusinessEmailOrder extends Order
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var integer
     */
    private $number_of_accounts;

    /**
     * @var integer
     */
    private $for_number_of_months;

    public function __construct(Customer $customer, Invoice $invoice)
    {
        $this->customer = $customer;
        $this->invoice = $invoice;
    }

    public function customerId(): int
    {
        return (int) $this->customer->id();
    }

    public function domain()
    {
        return $this->domain;
    }

    public function setDomain(string $domain)
    {
        $this->domain = $domain;
    }

    public function numberOfAccounts(): int
    {
        return (int) $this->number_of_accounts;
    }

    public function setNumberOfAccounts(int $number_of_accounts)
    {
        $this->number_of_accounts = $number_of_accounts;
    }

    public function forNumberOfMonths(): int
    {
        return (int) $this->for_number_of_months;
    }

    public function setForNumberOfMonths(int $for_number_of_months)
    {
        $this->for_number_of_months = $for_number_of_months;
    }

    public function invoice(): Invoice
    {
        return $this->invoice;
    }
}