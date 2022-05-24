<?php

namespace ResellerClub\Dns\Txt\Requests;

use ResellerClub\Response;

class DeleteRequest extends Response
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
     * @var string
     */
    private $value;

    /**
     * AddRequest constructor.
     *
     * @param string $domain
     * @param string $record
     * @param string $value
     */
    public function __construct(string $domain, string $record, string $value)
    {
        $this->domain = $domain;
        $this->record = $record;
        $this->value = $value;
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
}