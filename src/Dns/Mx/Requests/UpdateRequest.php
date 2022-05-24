<?php

namespace ResellerClub\Dns\Mx\Requests;

use ResellerClub\Response;
use ResellerClub\TimeToLive;

class UpdateRequest extends Response
{
    /**
     * Top level domain name whose records you want to add
     * e.g. mydomain.com.
     *
     * @var string
     */
    private $domain;

    /**
     * Record you want to add
     * e.g. "www" or "mysubdomain".
     *
     * @var string
     */
    private $record;

    /**
     * Current value of this record.
     *
     * @var string
     */
    private $currentValue;

    /**
     * New value of this record.
     *
     * @var string
     */
    private $newValue;

    /**
     * Priority of the MX record.
     *
     * @var int
     */
    private $priority;

    /**
     * Time-to-live object for this DNS record.
     *
     * @var TimeToLive
     */
    private $ttl;

    /**
     * UpdateRequest constructor.
     *
     * @param string $domain
     * @param string $record
     * @param string $currentValue
     * @param string $newValue
     * @param int|null $priority
     * @param TimeToLive|null $ttl
     */
    public function __construct(string $domain, string $record, string $currentValue, string $newValue, int $priority = null, TimeToLive $ttl = null)
    {
        $this->domain = $domain;
        $this->record = $record;
        $this->currentValue = $currentValue;
        $this->newValue = $newValue;
        $this->priority = $priority;
        $this->ttl = $ttl;
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function record(): string
    {
        return $this->record;
    }

    /**
     * @return string
     */
    public function currentValue(): string
    {
        return $this->currentValue;
    }

    /**
     * @return string
     */
    public function newValue(): string
    {
        return $this->newValue;
    }

    public function priority()
    {
        return $this->priority;
    }

    /**
     * @return TimeToLive
     */
    public function ttl(): TimeToLive
    {
        return ($this->ttl) ? $this->ttl : TimeToLive::defaultTtl();
    }
}