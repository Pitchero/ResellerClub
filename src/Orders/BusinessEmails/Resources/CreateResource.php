<?php

namespace ResellerClub\Orders\BusinessEmails\Resources;

use ResellerClub\Resource;

class CreateResource extends Resource
{
    /**
     * Get the invoice ID parameter.
     *
     * @return int
     */
    public function invoiceId(): int
    {
        return $this->invoiceid;
    }

    /**
     * Get the selling currency parameter.
     *
     * @return string
     */
    public function sellingCurrency(): string
    {
        return $this->sellingcurrencysymbol;
    }

    /**
     * Get the selling amount parameter.
     *
     * @return string
     */
    public function sellingAmount(): string
    {
        return $this->sellingamount;
    }

    /**
     * Get the transaction amount parameter.
     *
     * @return string
     */
    public function transactionAmount(): string
    {
        return $this->unutilisedsellingamount;
    }

    /**
     * Get the customer ID parameter.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerid;
    }
}
