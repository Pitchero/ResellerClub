<?php

namespace ResellerClub\Dns\Txt\Requests;

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
     * Time-to-live object for this DNS record.
     *
     * @var TimeToLive
     */
    private $ttl;

    /**
     * AddRequest constructor.
     *
     * @param string $domain
     * @param string $record
     * @param string $currentValue
     * @param string $newValue
     * @param TimeToLive|null $ttl
     */
    public function __construct(string $domain, string $record, string $currentValue, string $newValue, TimeToLive $ttl = null)
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

    /**
     * @return TimeToLive
     */
    public function ttl(): TimeToLive
    {
        return ($this->ttl) ? $this->ttl : TimeToLive::defaultTtl();
    }
}