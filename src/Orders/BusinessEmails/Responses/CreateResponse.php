<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use ResellerClub\Response;

/**
 * @see https://manage.resellerclub.com/kb/answer/2156
 */
class CreateResponse extends Response
{
    /**
     * Get the business email order id.
     *
     * @return int
     */
    public function orderId(): int
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
     * Gets the action status for this business email order.
     *
     * @return string
     */
    public function actionStatus(): string
    {
        return $this->actionstatus;
    }

    /**
     * Get the description of the business email order add action status.
     *
     * @return string
     */
    public function actionStatusDescription(): string
    {
        return $this->actionstatusdesc;
    }

    /**
     * Get the ID of the business email order add action.
     *
     * @return int
     */
    public function actionId(): int
    {
        return $this->eaqid;
    }

    /**
     * Get the action type.
     *
     * @return string
     */
    public function actionType(): string
    {
        return $this->actiontype;
    }

    /**
     * Get the description of the business email order add action.
     *
     * @return string
     */
    public function actionTypeDescription(): string
    {
        return $this->actiontypedesc;
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
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerid;
    }
}
