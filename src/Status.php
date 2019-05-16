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
     * @return string
     */
    public function __toString()
    {
        return strtolower($this->status);
    }
}
