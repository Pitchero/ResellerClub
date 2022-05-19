<?php

namespace unit\Dns\Txt\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Txt\Requests\AddRequest;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789',
            $ttl
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testInstantiationWithoutTTL()
    {
        $request = new AddRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789'
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789',
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL()
    {
        $request = new AddRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789'
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string)$request->ttl(), TimeToLive::DEFAULT_TTL);
    }

    public function testGettersWithBlankRecord()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'mytestdomain.com',
            '',
            'v=spf1 ip4:123.456.789',
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }
}