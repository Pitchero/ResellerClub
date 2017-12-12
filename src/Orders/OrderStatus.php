<?php

namespace ResellerClub\Orders;

class OrderStatus
{
    /**
     * @var string
     */
    private $status;

    /**
     * Create a new order status instance.
     *
     * @param string $status
     *
     * @return self
     */
    public function __construct(string $status)
    {
        $this->status = strtolower($status);
    }

    /**
     * Get the string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->status;
    }

    /**
     * Is the order marked as "Active".
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return (string) $this->status === 'active';
    }

    /**
     * Is the order marked as "InActive".
     *
     * @return bool
     */
    public function isInactive(): bool
    {
        return (string) $this->status === 'inactive';
    }

    /**
     * Is the order marked as "Pending Delete Restorable".
     *
     * @return bool
     */
    public function isPendingDeletion(): bool
    {
        return (string) $this->status === 'pending delete restorable';
    }

    /**
     * Is the order marked as "Deleted".
     *
     * @return bool
     */
    public function isDeleted(): bool
    {
        return (string) $this->status === 'deleted';
    }

    /**
     * Is the order marked as "Archived".
     *
     * @return bool
     */
    public function isArchived(): bool
    {
        return (string) $this->status === 'archived';
    }
}
