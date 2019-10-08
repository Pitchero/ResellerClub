<?php

namespace ResellerClub\Dns\A\Requests;

use ResellerClub\IPv4Address;
use ResellerClub\Response;
use ResellerClub\TimeToLive;

class UpdateRequest extends Response
{
    /**
     * Top level domain name whose records you want to update
     * e.g. mydomain.com.
     *
     * @var string
     */
    private $domain;

    /**
     * Record you want to update
     * e.g. "www" or "mysubdomain".
     *
     * @var string
     */
    private $record;

    /**
     * Current value of this record.
     *
     * @var IPv4Address
     */
    private $currentValue;

    /**
     * New value of this record.
     *
     * @var IPv4Address
     */
    private $newValue;

    /**
     * Time-to-live object for this DNS record.
     *
     * @var TimeToLive
     */
    private $ttl;

    /**
     * UpdateRequest constructor.
     *
     * @param string          $domain
     * @param string          $record
     * @param IPv4Address     $currentValue
     * @param IPv4Address     $newValue
     * @param TimeToLive|null $ttl
     */
    public function __construct(string $domain, string $record, IPv4Address $currentValue, IPv4Address $newValue, TimeToLive $ttl = null)
    {
        $this->domain = $domain;
        $this->record = $record;
        $this->currentValue = $currentValue;
        $this->newValue = $newValue;
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
     * @return IPv4Address
     */
    public function currentValue(): IPv4Address
    {
        return $this->currentValue;
    }

    /**
     * @return IPv4Address
     */
    public function newValue(): IPv4Address
    {
        return $this->newValue;
    }

    /**
     * @return TimeToLive
     */
    public function ttl(): TimeToLive
    {
        return ($this->ttl) ? $this->ttl : TimeToLive::defaultTtl();
    }
}
