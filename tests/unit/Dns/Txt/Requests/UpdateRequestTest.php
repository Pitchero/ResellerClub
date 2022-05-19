<?php

namespace unit\Dns\Txt\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Txt\Requests\UpdateRequest;
use ResellerClub\TimeToLive;

class UpdateRequestTest extends TestCase
{
    public function testInstantiation()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            'v=spf1 ip4:123.456.789',
            'v=spf1 ip4:123.456.987',
            $ttl
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testInstantiationWithoutTTL()
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            'v=spf1 ip4:123.456.789',
            'v=spf1 ip4:123.456.987'
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            'v=spf1 ip4:123.456.789',
            'v=spf1 ip4:123.456.987',
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->currentValue());
        $this->assertInternalType('string', $request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL()
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            'v=spf1 ip4:123.456.789',
            'v=spf1 ip4:123.456.987'
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->currentValue());
        $this->assertInternalType('string', $request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string)$request->ttl(), TimeToLive::DEFAULT_TTL);
    }
}