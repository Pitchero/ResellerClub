<?php

namespace ResellerClub;

use InvalidArgumentException;

class EmailAddress
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Create a new email address instance.
     *
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("Value [{$value}] is not a valid email address.");
        }

        $this->value = $value;
    }

    /**
     * Get the string representation of this email address.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
