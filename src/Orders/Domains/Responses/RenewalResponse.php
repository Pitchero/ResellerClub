<?php

namespace ResellerClub\Orders\Domains\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Exceptions\FeatureNotAvailableException;
use ResellerClub\Orders\BusinessEmails\Responses\Concerns\HasAction;
use ResellerClub\Response;

class RenewalResponse extends Response
{
    use HasAction;

    /**
     * Get the id of the domain order.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->entityid;
    }

    /**
     * Get the description of the domain order renewal.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return string
     */
    public function description(): string
    {
        return (string) $this->description;
    }

    /**
     * Get the customer ID associated with the domain order.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return string
     */
    public function customerId(): string
    {
        return $this->customerid;
    }

    /**
     * Get the ID of the domain order renewal invoice.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return string
     */
    public function invoiceId(): string
    {
        return $this->invoiceid;
    }

    /**
     * Get the selling currency symbol of the reseller.
     *
     * @see https://manage.resellerclub.com/kb/node/746
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
     * @see https://manage.resellerclub.com/kb/node/746
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
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return Money
     */
    public function sellingAmount(): Money
    {
        $amount = $this->sellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Get the unutilised transaction amount in the selling currency.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     *
     * @return Money
     */
    public function unutilisedSellingAmount(): Money
    {
        $amount = $this->unutilisedsellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Gets the privacy protection order response, if valid for the TLD renewed.
     *
     * @see https://manage.resellerclub.com/kb/node/746
     * @see https://manage.resellerclub.com/kb/node/13
     *
     * @throws FeatureNotAvailableException
     *
     * @return PrivacyProtectionOrderResponse
     */
    public function privacyProtectionDetails()
    {
        return new PrivacyProtectionOrderResponse(
            $this->privacydetails
        );
    }
}
