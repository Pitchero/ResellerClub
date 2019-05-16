<?php

namespace ResellerClub\Dns\Cname\Requests;

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
     * Value of this new record e.g. "cname.mysite.com".
     *
     * @var string
     */
    private $value;

    /**
     * Time-to-live in seconds for this DNS record.
     *
     * @var null|TimeToLive
     */
    private $ttl = null;

    /**
     * AddRequest constructor.
     *
     * @param string          $domain
     * @param string          $record
     * @param string          $value
     * @param TimeToLive|null $ttl
     */
    public function __construct(string $domain, string $record, string $value, TimeToLive $ttl = null)
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
     * @return string
     */
    public function value(): string
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
