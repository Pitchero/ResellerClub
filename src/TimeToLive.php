<?php

namespace ResellerClub;

use InvalidArgumentException;

class TimeToLive
{
    /**
     * Minimum TTL for DNS records
     * This is set on the API and throws an API error if not observed.
     */
    const MINIMUM_TTL = 7200;

    /**
     * @var int
     */
    protected $value;

    /**
     * TimeToLive constructor.
     *
     * @param int $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $value)
    {
        if ($value < self::MINIMUM_TTL) {
            throw new InvalidArgumentException('TTL ['.$value.'] must be equal to or greater than the minimum ['.self::MINIMUM_TTL.'].');
        }

        $this->value = $value;
    }
}
