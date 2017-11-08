<?php

namespace ResellerClub\Orders\BusinessEmails\Resources;

use ResellerClub\Resource;

class BusinessEmailOrderResource extends Resource
{
    /**
     * Get the domain parameter.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->description;
    }

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
     * Get the action ID parameter.
     *
     * @return int
     */
    public function actionId(): int
    {
        return $this->eaqid;
    }

    /**
     * Get the action type parameter.
     *
     * @return string
     */
    public function actionType(): string
    {
        return $this->actiontype;
    }

    /**
     * Get the action status parameter.
     *
     * @return string
     */
    public function actionStatus(): string
    {
        return $this->actionstatus;
    }

    /**
     * Get the action status description parameter.
     *
     * @return string
     */
    public function actionStatusDescription(): string
    {
        return $this->actionstatusdesc;
    }

    /**
     * Get the description parameter.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->actiontypedesc;
    }
}
