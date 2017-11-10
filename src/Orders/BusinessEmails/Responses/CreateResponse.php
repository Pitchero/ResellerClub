<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use ResellerClub\Response;

class CreateResponse extends Response
{
    /**
     * Get the invoice ID parameter.
     *
     * @see https://manage.resellerclub.com/kb/answer/2156
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
     * @see https://manage.resellerclub.com/kb/answer/2156
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
     * @see https://manage.resellerclub.com/kb/answer/2156
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
     * @see https://manage.resellerclub.com/kb/answer/2156
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
     * @see https://manage.resellerclub.com/kb/answer/2156
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerid;
    }
}
