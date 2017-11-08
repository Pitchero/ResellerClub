<?php

namespace ResellerClub\Orders\BusinessEmails\Resources;

use ResellerClub\Resource;

class RenewResource extends Resource
{
    /**
     * Description of the business email order renewal action status.
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
     * @return int
     */
    public function entityId(): int
    {
        return $this->entityid;
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
     * Get the description of the business email order renewal action.
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
     * @return int
     */
    public function actionId(): int
    {
        return $this->eaqid;
    }

    /**
     * Get the business email order renewal action status.
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
     * @return string
     */
    public function actionStatusDescription(): string
    {
        return $this->actionstatusdesc;
    }

    /**
     * Get the ID of the business email order renewal invoice.
     *
     * @return string
     */
    public function invoiceId(): string
    {
        return $this->invoiceid;
    }

    /**
     * Get the selling currency of the reseller.
     *
     * @return string
     */
    public function sellingCurrencySymbol(): string
    {
        return $this->sellingcurrencysymbol;
    }

    /**
     * Get the selling currency amount.
     *
     * @return int
     */
    public function sellingAmount(): int
    {
        return $this->sellingamount;
    }

    /**
     * Get the unutilised transaction amount in the selling currency.
     *
     * @return int
     */
    public function unutilisedSellingAmount(): int
    {
        return $this->unutilisedsellingamount;
    }

    /**
     * Get the customer ID associated with the business email order.
     *
     * @return string
     */
    public function customerId(): string
    {
        return $this->customerid;
    }
}
