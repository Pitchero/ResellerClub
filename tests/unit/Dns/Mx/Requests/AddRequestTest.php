<?php

namespace unit\Dns\Mx\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Mx\Requests\AddRequest;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'mytestdomain.com',
            'mx1',
            '123.456.789',
            10,
            $ttl
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testInstantiationWithoutTTL()
    {
        $request = new AddRequest(
            'mytestdomain.com',
            'mx1',
            '123.456.789',
            10
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'mytestdomain.com',
            'mx1',
            '123.456.789',
            10,
            $ttl
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInternalType('int', $request->priority());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL()
    {
        $request = new AddRequest(
            'mytestdomain.com',
            'mx1',
            '123.456.789',
            10
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInternalType('int', $request->priority());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string)$request->ttl(), TimeToLive::DEFAULT_TTL);
    }


    public function testGettersWithBlankRecord()
    {
        $request = new AddRequest(
            'mytestdomain.com',
            '',
            '123.456.789',
            10
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInternalType('int', $request->priority());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }
}