<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ResellerClub\IPv4Address;

class IPv4AddressTest extends TestCase
{
    public function testCanCreateNewInstance()
    {
        $address = new IPv4Address('127.0.0.1');

        $this->assertEquals('127.0.0.1', (string) $address);
    }

    public function testInvalidIPv4AddressThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        /**
         * Missing 4th octet.
         */
        new IPv4Address('127.0.0');
    }

    public function testInvalidIPv4AddressThrowsException2()
    {
        $this->expectException(InvalidArgumentException::class);

        /**
         * Added 5th octet.
         */
        new IPv4Address('127.0.0.0.1');
    }

    public function testInvalidIPv4AddressThrowsException3()
    {
        $this->expectException(InvalidArgumentException::class);

        /**
         * IPv6 Address.
         */
        new IPv4Address('::1/128');
    }
}
