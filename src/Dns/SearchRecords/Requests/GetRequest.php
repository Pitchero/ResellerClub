<?php

namespace ResellerClub\Dns\SearchRecords\Requests;

use ResellerClub\Response;
use ResellerClub\SearchableDnsType;

class GetRequest extends Response
{
    /**
     * Top level domain name whose records you want to search
     * e.g. mydomain.com.
     *
     * @var string
     */
    private $domain;

    /**
     * The type of the record you want to search for.
     * e.g. A, MX, CNAME, NS, TXT, etc.
     *
     * @var SearchableDnsType
     */
    private $type;

    /**
     * Number of Records to be fetched.
     *
     * @var int
     */
    private $numberOfRecords;

    /**
     * Page number for which details are to be fetched.
     *
     * @var int
     */
    private $pageNumber;

    /**
     * Hostname of the record.
     *
     * @var string
     */
    private $hostName;

    /**
     * Value of the record.
     *
     * @var string
     */
    private $value;

    /**
     * AddRequest constructor.
     *
     * @param string $domain
     * @param SearchableDnsType $type
     * @param int $numberOfRecords
     * @param int $pageNumber
     * @param string|null $hostName
     * @param string $value
     */
    public function __construct(string $domain, SearchableDnsType $type, int $numberOfRecords, int $pageNumber, string $hostName = null, string $value = null)
    {
        $this->domain = $domain;
        $this->type = $type;
        $this->numberOfRecords = $numberOfRecords;
        $this->pageNumber = $pageNumber;
        $this->hostName = $hostName;
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
     * @return SearchableDnsType
     */
    public function type(): SearchableDnsType
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function numberOfRecords(): int
    {
        return $this->numberOfRecords;
    }

    /**
     * @return int
     */
    public function pageNumber()
    {
        return $this->pageNumber;
    }

    public function hostName()
    {
        return $this->hostName;
    }

    public function value()
    {
        return $this->value;
    }
}