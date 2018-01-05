<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Orders\BusinessEmails\Responses\Concerns\HasAction;
use ResellerClub\Response;

/**
 * @see https://manage.resellerclub.com/kb/answer/2158
 */
class AddedEmailAccountResponse extends Response
{
    use HasAction;

    /**
     * Get the ID of the business email order.
     *
     * @return int
     */
    public function entityId(): int
    {
        return $this->entityid;
    }

    /**
     * Gets the domain name that this business email order has been created for.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->description;
    }

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
    public function sellingCurrencySymbol(): string
    {
        return $this->sellingcurrencysymbol;
    }

    /**
     * Get the selling currency of the reseller.
     *
     * @return Currency
     */
    public function sellingCurrency(): Currency
    {
        return new Currency($this->sellingcurrencysymbol);
    }

    /**
     * Get the selling currency amount.
     *
     * @return Money
     */
    public function sellingAmount(): Money
    {
        $amount = $this->sellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
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

    /**
     * Get the unutilised transaction amount in the selling currency.
     *
     * @return Money
     */
    public function unutilisedSellingAmount(): Money
    {
        $amount = $this->unutilisedsellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Get the cost to the customer in the selling currency.
     *
     * @return Money
     */
    public function customerCost(): Money
    {
        $amount = $this->customercost * 100;

        return new Money($amount, $this->sellingCurrency());
    }
}
