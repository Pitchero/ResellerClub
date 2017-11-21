<?php

namespace ResellerClub\Orders\BusinessEmails\Requests;

use ResellerClub\Orders\InvoiceOption;

class BusinessEmailOrderRequest
{
    /**
     * @var int
     */
    private $customerId;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var int
     */
    private $numberOfAccounts;

    /**
     * @var int
     */
    private $forNumberOfMonths;

    /**
     * @var InvoiceOption
     */
    private $invoiceOption;

    /**
     * Create a new business email order request instance.
     *
     * @param int           $customerId
     * @param string        $domain
     * @param int           $numberOfAccounts
     * @param int           $forNumberOfMonths
     * @param InvoiceOption $invoiceOption
     */
    public function __construct(
        int $customerId,
        string $domain,
        int $numberOfAccounts,
        int $forNumberOfMonths,
        InvoiceOption $invoiceOption
    ) {
        $this->customerId = $customerId;
        $this->domain = $domain;
        $this->numberOfAccounts = $numberOfAccounts;
        $this->forNumberOfMonths = $forNumberOfMonths;
        $this->invoiceOption = $invoiceOption;
    }

    /**
     * Get the customer ID attribute.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerId;
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
        return $this->numberOfAccounts;
    }

    /**
     * Get the number of months attribute.
     *
     * @return int
     */
    public function forNumberOfMonths(): int
    {
        return $this->forNumberOfMonths;
    }

    /**
     * Get the invoice option attribute.
     *
     * @return InvoiceOption
     */
    public function invoiceOption(): InvoiceOption
    {
        return $this->invoiceOption;
    }
}
