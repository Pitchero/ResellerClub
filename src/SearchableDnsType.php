<?php

namespace ResellerClub;

use InvalidArgumentException;

class SearchableDnsType
{
    /**
     * Records that are available to search for via the ResellerClub API.
     * @see https://manage.resellerclub.com/kb/answer/1106
     * @date 2022-05-19
     */
    const AVAILABLE_RECORDS = [
        'A',
        'AAAA',
        'CNAME',
        'MX',
        'NS',
        'SRV',
        'TXT',
    ];

    /**
     * @var string
     */
    protected $value;

    /**
     * Create a new email DNS Record instance.
     *
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        /**
         * Ensure the string is Uppercase, ResellerClub API is case-sensitive.
         */
        $uppercaseValue = strtoupper($value);

        if (in_array($uppercaseValue, self::AVAILABLE_RECORDS) === false) {
            throw new InvalidArgumentException("Value [{$value}] is not a valid DNS Record Type.");
        }

        $this->value = $uppercaseValue;
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