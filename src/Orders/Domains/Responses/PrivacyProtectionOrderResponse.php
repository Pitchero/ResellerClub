<?php

namespace ResellerClub\Orders\Domains\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Exceptions\FeatureNotAvailableException;
use ResellerClub\Orders\BusinessEmails\Responses\Concerns\HasAction;
use ResellerClub\Response;

class PrivacyProtectionOrderResponse extends Response
{
    use HasAction;

    /**
     * PrivacyProtectionOrderResponse constructor.
     *
     * @param array $attributes
     *
     * Privacy protection is only enabled for specific TLDs.
     *
     * @see https://manage.resellerclub.com/kb/node/13
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // If the tld doesn't support privacy protection throw an exception.
        if (!$this->wasSuccessful() && $this->error === 'Privacy Protection Service not available.') {
            throw new FeatureNotAvailableException();
        }
    }

    /**
     * Get the order id.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->entityid;
    }

    /**
     * Get the description of the privacy protection order.
     *
     * @return string
     */
    public function description(): string
    {
        return (string) $this->description;
    }

    /**
     * Get the ID of the domain order renewal invoice.
     *
     * @return string
     */
    public function invoiceId(): string
    {
        return (string) $this->invoiceid;
    }

    /**
     * Get the selling currency symbol of the reseller.
     *
     * @return string
     */
    public function sellingCurrencySymbol(): string
    {
        return (string) $this->sellingcurrencysymbol;
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
        $amount = (float) $this->sellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Get the unutilised transaction amount in the selling currency.
     *
     * @return Money
     */
    public function unutilisedSellingAmount(): Money
    {
        $amount = (float) $this->unutilisedsellingamount * 100;

        return new Money($amount, $this->sellingCurrency());
    }

    /**
     * Get the customer ID associated with the order.
     *
     * @return string
     */
    public function customerId(): string
    {
        return (string) $this->customerid;
    }
}
