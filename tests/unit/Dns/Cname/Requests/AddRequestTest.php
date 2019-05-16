<?php

namespace Tests\Unit\Dns\Cname\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Cname\Requests\AddRequest;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.new.com',
            $ttl
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testInstantiationWithoutTTL()
    {
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.old.com'
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.new.com',
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
            'test.com',
            'www',
            'cname.new.com'
        );

        $this->assertInternalType('string', $request->domain());
        $this->assertInternalType('string', $request->record());
        $this->assertInternalType('string', $request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }
}
