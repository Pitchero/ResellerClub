<?php

namespace ResellerClub;

use InvalidArgumentException;

class TimeToLive
{
    /**
     * Default TTL for DNS records (24 hours).
     */
    const DEFAULT_TTL = 86400;

    /**
     * Minimum TTL for DNS records (2 hours)
     * This is set on the API and throws an API error if not observed.
     */
    const MINIMUM_TTL = 7200;

    /**
     * @var int
     */
    private $value;

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
            throw new InvalidArgumentException(sprintf('TTL [%s] must be equal to or greater than the minimum [%s].', $value, self::MINIMUM_TTL));
        }

        $this->value = $value;
    }

    /**
     * Return the default TTL value - this is used if a custom value is not specified.
     *
     * @return TimeToLive
     */
    public static function defaultTtl(): self
    {
        return new self(self::DEFAULT_TTL);
    }

    /**
     * Return the minimum TTL value as imposed by the API.
     *
     * @return TimeToLive
     */
    public static function minimumTtl(): self
    {
        return new self(self::MINIMUM_TTL);
    }

    /**
     * Get the string representation of the TTL.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * Get the integer representation of the TTL.
     *
     * @return int
     */
    public function integer()
    {
        return (int) $this->value;
    }
}
