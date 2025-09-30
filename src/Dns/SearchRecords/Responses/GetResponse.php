<?php

namespace ResellerClub\Dns\SearchRecords\Responses;

use ResellerClub\Response;

class GetResponse extends Response
{
    /**
     * Total number of records of this type available in the ResellerClub Database.
     *
     * @return int
     */
    public function totalResults(): int
    {
        return (int) $this->recsindb;
    }

    /**
     * Total number of Records provided in this response
     *
     * @return int
     */
    public function pageTotal(): int
    {
        return (int) $this->recsonpage;
    }

    /**
     * The array of DNS Records provided in this response
     *
     * @return array
     */
    public function DnsRecords(): array
    {
        return array_filter($this->attributes, static function ($record) {
            return is_array($record);
        });
    }
}