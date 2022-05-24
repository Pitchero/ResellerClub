<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ResellerClub\SearchableDnsType;

class SearchableDnsRecordTest extends TestCase
{
    public function testCanCreateNewInstance()
    {
        $record = new SearchableDnsType('MX');
        $this->assertEquals('MX', (string) $record);
    }

    public function testInvalidDnsRecordThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        /**
         * Unsupported DNS Record.
         */
        new SearchableDnsType('PTR');
    }

    public function testChangesToUpperCase()
    {
        $record = new SearchableDnsType('mx');
        $this->assertEquals('MX', (string) $record);
    }
}