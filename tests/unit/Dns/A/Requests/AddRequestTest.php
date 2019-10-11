<?php

namespace Tests\Unit\Dns\A\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\A\Requests\AddRequest;
use ResellerClub\IPv4Address;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation(): void
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

    public function testInstantiationWithoutTTL(): void
    {
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1')
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1'),
            $ttl
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL(): void
    {
        $request = new AddRequest(
            'test.com',
            'www',
            new IPv4Address('127.0.0.1')
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }

    public function testGettersWithBlankRecord(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            '',
            new IPv4Address('127.0.0.1'),
            $ttl
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertInstanceOf(IPv4Address::class, $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }
}
