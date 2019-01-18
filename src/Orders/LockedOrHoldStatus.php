<?php

namespace ResellerClub\Orders;

class LockedOrHoldStatus
{
    /**
     * The current locked or on hold status.
     *
     * @var string
     */
    private $status;

    /**
     * LockedOrHoldStatus constructor.
     *
     * @param string $status
     */
    public function __construct(string $status)
    {
        $this->status = $status;
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
     * Is the status considered locked or on hold?
     *
     * @return bool
     */
    public function isLockedOrOnHold(): bool
    {
        return $this->isLocked() || $this->isOnHold();
    }

    /**
     * Is the status considered locked?
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->status === 'sixtydaylock';
    }

    /**
     * Is the status considered on hold?
     *
     * @return bool
     */
    public function isOnHold(): bool
    {
        return $this->status === 'renewhold';
    }
}
