<?php

namespace ResellerClub;

use InvalidArgumentException;

class IPv4Address
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Create a new IPv4 instance.
     *
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        if (filter_var($value, FILTER_VALIDATE_IP,FILTER_FLAG_IPV4) === false) {
            throw new InvalidArgumentException("Value [{$value}] is not a valid IPv4 address.");
        }

        $this->value = $value;
    }

    /**
     * Get the string representation of this IPv4 address.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
