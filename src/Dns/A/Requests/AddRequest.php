<?php

namespace ResellerClub\Dns\A\Requests;

use ResellerClub\IPv4Address;
use ResellerClub\Response;
use ResellerClub\TimeToLive;

class AddRequest extends Response
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
     * Value of this new record e.g. "127.0.0.1".
     *
     * @var IPv4Address
     */
    private $value;

    /**
     * Time-to-live object for this DNS record.
     *
     * @var TimeToLive
     */
    private $ttl;

    /**
     * AddRequest constructor.
     *
     * @param string          $domain
     * @param string          $record
     * @param IPv4Address     $value
     * @param TimeToLive|null $ttl
     */
    public function __construct(string $domain, string $record, IPv4Address $value, TimeToLive $ttl = null)
    {
        $this->domain = $domain;
        $this->record = $record;
        $this->value = $value;
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
    public function value(): IPv4Address
    {
        return $this->value;
    }

    /**
     * @return TimeToLive
     */
    public function ttl(): TimeToLive
    {
        return ($this->ttl) ? $this->ttl : TimeToLive::defaultTtl();
    }
}
