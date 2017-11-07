<?php

namespace ResellerClub\Orders\BusinessEmails;

use ResellerClub\Orders\InvoiceOption;

class BusinessEmailOrderRequest
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
     * @var InvoiceOption
     */
    private $invoice_option;

    /**
     * Create a new business email order request instance.
     *
     * @param int $customer_id
     * @param string $domain
     * @param int $number_of_account
     * @param int $for_number_of_months
     * @param InvoiceOption $invoice_option
     */
    public function __construct(
        int $customer_id,
        string $domain,
        int $number_of_account,
        int $for_number_of_months,
        InvoiceOption $invoice_option
    ) {
        $this->customer_id = $customer_id;
        $this->domain = $domain;
        $this->number_of_accounts = $number_of_account;
        $this->for_number_of_months = $for_number_of_months;
        $this->invoice_option = $invoice_option;
    }

    /**
     * Get the customer ID attribute.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customer_id;
    }

    /**
     * Get the domain attribute.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->domain;
    }

    /**
     * Get the number of accounts attribute.
     *
     * @return int
     */
    public function numberOfAccounts(): int
    {
        return $this->number_of_accounts;
    }

    /**
     * Get the number of months attribute.
     *
     * @return int
     */
    public function forNumberOfMonths(): int
    {
        return $this->for_number_of_months;
    }

    /**
     * Get the invoice option attribute.
     *
     * @return InvoiceOption
     */
    public function invoiceOption(): InvoiceOption
    {
        return $this->invoice_option;
    }
}
