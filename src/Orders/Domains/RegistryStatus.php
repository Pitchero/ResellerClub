<?php

namespace ResellerClub\Orders\Domains;

class RegistryStatus
{
    /**
     * The registry status from the response.
     *
     * @var string
     */
    private $status;

    /**
     * RegistryStatus constructor.
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
     * Is the registry suspended?
     *
     * @return bool
     */
    public function isSuspended(): bool
    {
        return $this->status === 'resellersuspend';
    }

    /**
     * Is the registry locked is some form?
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->isLockedAtReseller() || $this->isLockedAtTransfer();
    }

    /**
     * Is the registry locked at the reseller?
     *
     * @return bool
     */
    public function isLockedAtReseller(): bool
    {
        return $this->status === 'resellerlock';
    }

    /**
     * Is the registry locked when transferring?
     *
     * @return bool
     */
    public function isLockedAtTransfer(): bool
    {
        return $this->status === 'transferlock';
    }
}
