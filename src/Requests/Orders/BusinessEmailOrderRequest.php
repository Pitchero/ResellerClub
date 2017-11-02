<?php

namespace ResellerClub\Requests\Orders;

class BusinessEmailOrder
{
    /**
     * @var integer
     */
    private $customer_id;

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

    /**
     * @var string
     */
    private $invoice_state;

    public function __construct(
        int $customer_id,
        string $domain,
        int $number_of_account,
        int $for_number_of_months,
        string $invoice_state
    ) {
        $this->customer_id = $customer_id;
        $this->domain = $domain;
        $this->number_of_accounts = $number_of_account;
        $this->for_number_of_months = $for_number_of_months;
        $this->invoice_state = $invoice_state;
    }

    public function customerId(): int
    {
        return $this->customer_id;
    }

    public function domain(): string
    {
        return $this->domain;
    }

    public function numberOfAccounts(): int
    {
        return (int) $this->number_of_accounts;
    }

    public function forNumberOfMonths(): int
    {
        return (int) $this->for_number_of_months;
    }

    public function invoiceState(): string
    {
        return $this->invoice_state;
    }
}