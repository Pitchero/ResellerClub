<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Carbon\Carbon;
use ResellerClub\Orders\OrderStatus;
use ResellerClub\Response;

class GetResponse extends Response
{
    /**
     * Get the order ID parameter.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->orderid;
    }

    /**
     * Get the order description.
     *
     * @return string
     */
    public function orderDescription(): string
    {
        return $this->description;
    }

    /**
     * Gets the order creation date/time.
     *
     * @return Carbon
     */
    public function orderCreationDate(): Carbon
    {
        return Carbon::createFromTimestamp($this->creationtime);
    }

    /**
     * Gets if the order is suspended at expiry.
     *
     * @return bool
     */
    public function orderSuspendedAtExpiry(): bool
    {
        return $this->isOrderSuspendedUponExpiry;
    }

    /**
     * Gets if the order is suspended by the parent information.
     *
     * @return bool
     */
    public function orderSuspendedByParent(): bool
    {
        return $this->orderSuspendedByParent;
    }

    /**
     * Gets if the order deletion is allowed.
     *
     * @return bool
     */
    public function orderDeletionAllowed(): bool
    {
        return $this->allowdeletion;
    }

    /**
     * Gets the order's current status.
     *
     * @return string
     */
    public function currentOrderStatus(): string
    {
        return $this->currentstatus;
    }

    /**
     * Gets the domain associated to the order.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->domainname;
    }

    /**
     * Gets the expiry of the order.
     *
     * @return Carbon
     */
    public function expiry(): Carbon
    {
        return Carbon::createFromTimestamp($this->endtime);
    }

    /**
     * Gets if the order is an immediate Reseller account.
     *
     * @return bool
     */
    public function isImmediateReseller(): bool
    {
        return $this->isImmediateReseller;
    }

    /**
     * Gets the Reseller's parent ID.
     *
     * @return string
     */
    public function resellerParentId(): string
    {
        return $this->parentkey;
    }

    /**
     * Gets the customer's ID.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerid;
    }

    /**
     * Gets the number of email accounts on the order.
     *
     * @return int
     */
    public function numberOfEmailAccounts(): int
    {
        return $this->emailaccounts;
    }

    /**
     * Gets the product ID.
     *
     * @return string
     */
    public function productId(): string
    {
        return $this->productkey;
    }

    /**
     * Gets the product category.
     *
     * @return string
     */
    public function productCategory(): string
    {
        return $this->productcategory;
    }

    /**
     * Get the order ID parameter.
     *
     * @return int
     */
    public function entityId(): int
    {
        return $this->entityid;
    }

    /**
     * Gets the 'eaqid', currently not in the ResellerClub's API documentation.
     *
     * @return int
     */
    public function eaqId(): int
    {
        return $this->eaqid;
    }

    /**
     * Gets if the order is paused, currently not in the ResellerClub's API documentation.
     *
     * @return bool
     */
    public function paused(): bool
    {
        return $this->paused;
    }

    /**
     * Gets the customer cost, currently not in the ResellerClub's API documentation.
     *
     * @return float
     */
    public function customerCost(): float
    {
        return $this->customercost;
    }

    /**
     * Gets the order status, currently not in the ResellerClub's API documentation.
     *
     * @return array
     */
    public function orderStatus(): array
    {
        return $this->orderstatus;
    }

    /**
     * Gets if this is recurring, currently not in the ResellerClub's API documentation.
     *
     * @return bool
     */
    public function isRecurring(): bool
    {
        return $this->recurring;
    }

    /**
     * Gets the entity type id, currently not in the ResellerClub's API documentation.
     *
     * @return int
     */
    public function entityTypeId(): int
    {
        return $this->entitytypeid;
    }

    /**
     * Gets if this is a deletion request, currently not in the ResellerClub's API documentation.
     *
     * @return bool
     */
    public function deletionRequest(): bool
    {
        return $this->isDeletionRequest;
    }

    /**
     * Gets the Reseller cost, currently not in the ResellerClub's API documentation.
     *
     * @return float
     */
    public function resellerCost(): float
    {
        return $this->resellercost;
    }

    /**
     * Gets the jump conditions, currently not in the ResellerClub's API documentation.
     *
     * @return array
     */
    public function jumpConditions(): array
    {
        return $this->jumpConditions;
    }

    /**
     * Gets the current order price, currently not in the ResellerClub's API documentation.
     *
     * @return float
     */
    public function currentOrderPrice(): float
    {
        return $this->currentOrderPrice;
    }

    /**
     * Gets if the action is completed, currently not in the ResellerClub's API documentation.
     *
     * @return string
     */
    public function actionCompleted(): string
    {
        return $this->actioncompleted;
    }

    /**
     * Gets the money back period for the order, currently not in the ResellerClub's API documentation.
     *
     * @return int
     */
    public function moneyBackPeriod(): int
    {
        return $this->moneybackperiod;
    }
}
