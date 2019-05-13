<?php

namespace ResellerClub\Dns\Cname\Requests;

use ResellerClub\Response;
use ResellerClub\TimeToLive;

class UpdateRequest extends Response
{
    /**
     * Full domain name whose records you want to update
     * e.g. www.mydomain.com.
     *
     * @var string
     */
    private $domainName;

    /**
     * Record you want to update
     * e.g. www.
     *
     * @var string
     */
    private $host;

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
     * Time-to-live in seconds for this DNS record.
     *
     * @var TimeToLive
     */
    private $ttl;

    /**
     * Minimum TTL on the Reseller Club API.
     */
    const MINIMUM_TTL = 7200;

    /**
     * UpdateRequest constructor.
     *
     * @param string     $domainName
     * @param string     $host
     * @param string     $currentValue
     * @param string     $newValue
     * @param TimeToLive $ttl
     */
    public function __construct(string $domainName, string $host, string $currentValue, string $newValue, TimeToLive $ttl)
    {
        $this->domainName = $domainName;
        $this->host = $host;
        $this->currentValue = $currentValue;
        $this->newValue = $newValue;
        $this->ttl = $ttl;
    }

    /**
     * @return string
     */
    public function domainName(): string
    {
        return $this->domainName;
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->host;
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
        return $this->ttl;
    }
}
