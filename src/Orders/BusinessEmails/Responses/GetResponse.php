<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Carbon\Carbon;
use ResellerClub\Orders\OrderStatus;
use ResellerClub\Resource;

class GetResponse extends Resource
{
    /**
     * Get the order ID parameter.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->entityid;
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
    public function orderStatus(): string
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
}
