<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use Carbon\Carbon;
use ResellerClub\Orders\BusinessEmails\Resources\BusinessEmailOrderResource;
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
        return $this->parameters['entityid'];
    }

    /**
     * Get the order description.
     *
     * @return string
     */
    public function orderDescription(): string
    {
        return $this->parameters['description'];
    }

    /**
     * Gets the order creation date/time.
     *
     * @return Carbon
     */
    public function orderCreationDate(): Carbon
    {
        return new Carbon($this->parameters['creationtime']);
    }

    /**
     * Gets if the order is suspended at expiry.
     *
     * @return bool
     */
    public function orderSuspendedAtExpiry(): bool
    {
        return $this->parameters['isOrderSuspendedUponExpiry'];
    }

    /**
     * Gets if the order is suspended by the parent information.
     *
     * @return bool
     */
    public function orderSuspendedByParent(): bool
    {
        return $this->parameters['orderSuspendedByParent'];
    }

    /**
     * Gets if the order deletion is allowed.
     *
     * @return bool
     */
    public function orderDeletionAllowed(): bool
    {
        return $this->parameters['allowdeletion'];
    }

    /**
     * Gets the order's current status.
     *
     * @return string
     */
    public function orderStatus(): string
    {
        return $this->parameters['currentstatus'];
    }

    /**
     * Gets the domain associated to the order.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->parameters['domainname'];
    }

    /**
     * Gets the expiry of the order.
     *
     * @return Carbon
     */
    public function expiry(): Carbon
    {
        return new Carbon($this->parameters['endtime']);
    }

    /**
     * Gets if the order is an immediate Reseller account.
     *
     * @return bool
     */
    public function isImmediateReseller(): bool
    {
        return $this->parameters['isImmediateReseller'];
    }

    /**
     * Gets the Reseller's parent ID.
     *
     * @return string
     */
    public function resellerParentId(): string
    {
        return $this->parameters['parentkey'];
    }

    /**
     * Gets the customer's ID.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->parameters['customerid'];
    }

    /**
     * Gets the number of email accounts on the order.
     *
     * @return int
     */
    public function numberOfEmailAccounts(): int
    {
        return $this->parameters['emailaccounts'];
    }

    /**
     * Gets the product ID.
     *
     * @return string
     */
    public function productId(): string
    {
        return $this->parameters['productkey'];
    }

    /**
     * Gets the product category.
     *
     * @return string
     */
    public function productCategory(): string
    {
        return $this->parameters['productcategory'];
    }

    /**
     * Gets the business email order resource for the order response.
     *
     * @return BusinessEmailOrderResource
     */
    public function businessEmailOrderResource(): BusinessEmailOrderResource
    {
        return new BusinessEmailOrderResource($this);
    }
}
