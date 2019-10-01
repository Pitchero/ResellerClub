<?php

namespace Tests\Unit\Dns\A\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\A\Requests\AddRequest;
use ResellerClub\IPv4Address;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            $ttl
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testInstantiationWithoutTTL()
    {
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1')
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL()
    {
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1')
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }

    public function testGettersWithBlankRecord()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            '',
            new IPv4Address('127.0.0.1'),
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }
}
