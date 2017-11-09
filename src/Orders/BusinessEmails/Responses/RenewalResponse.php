<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Response;

class RenewalResponse extends Response
{
    /**
     * Description of the business email order renewal action status.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Get the ID of the business email order.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return int
     */
    public function entityId(): int
    {
        return $this->entityid;
    }

    /**
     * Get the action type.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function actionType(): string
    {
        return $this->actiontype;
    }

    /**
     * Get the description of the business email order renewal action.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function actionTypeDescription(): string
    {
        return $this->actiontypedesc;
    }

    /**
     * Get the ID of the business email order renewal action.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return int
     */
    public function actionId(): int
    {
        return $this->eaqid;
    }

    /**
     * Get the business email order renewal action status.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function actionStatus(): string
    {
        return $this->actionstatus;
    }

    /**
     * Get the description of the business email order renewal action status.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function actionStatusDescription(): string
    {
        return $this->actionstatusdesc;
    }

    /**
     * Get the ID of the business email order renewal invoice.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
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
     * @see https://manage.resellerclub.com/kb/answer/2157
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
     * Get the customer ID associated with the business email order.
     *
     * @see https://manage.resellerclub.com/kb/answer/2157
     *
     * @return string
     */
    public function customerId(): string
    {
        return $this->customerid;
    }
}
