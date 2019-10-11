<?php

namespace Tests\Unit\Dns\A\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\A\Requests\UpdateRequest;
use ResellerClub\IPv4Address;
use ResellerClub\TimeToLive;

class UpdateRequestTest extends TestCase
{
    public function testInstantiation(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new IPv4Address('192.168.0.1'),
            $ttl
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testInstantiationWithoutTTL(): void
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new IPv4Address('192.168.0.1')
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testGetters(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new IPv4Address('192.168.0.1'),
            $ttl
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->currentValue());
        $this->assertInstanceOf(IPv4Address::class, $request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL(): void
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new IPv4Address('192.168.0.1')
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->currentValue());
        $this->assertInstanceOf(IPv4Address::class, $request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }
}
