<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
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
    public function sellingCurrencySymbol(): string
    {
        return $this->sellingcurrencysymbol;
    }

    /**
     * Get the selling currency.
     *
     * @return Currency
     */
    public function sellingCurrency(): Currency
    {
        return new Currency($this->sellingCurrencySymbol());
    }

    /**
     * Get the selling amount parameter.
     *
     * @return Money
     */
    public function sellingAmount(): Money
    {
        // TODO: Get subunit from currency instead of “guessing” its GBP/USD
        $amount = $this->sellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Get the transaction amount parameter.
     *
     * @return Money
     */
    public function transactionAmount(): Money
    {
        // TODO: Get subunit from currency instead of “guessing” its GBP/USD
        $amount = $this->unutilisedsellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
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
