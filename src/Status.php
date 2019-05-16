<?php

namespace ResellerClub;

class Status
{
    /**
     * @var string
     */
    protected $status;

    /**
     * Create a new status response.
     *
     * @param string status
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * Get a string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return strtolower($this->status);
    }
}
