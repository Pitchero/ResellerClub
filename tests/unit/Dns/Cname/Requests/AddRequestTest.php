<?php

namespace Tests\Unit\Dns\Cname\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Cname\Requests\AddRequest;
use ResellerClub\TimeToLive;

class AddRequestTest extends TestCase
{
    public function testInstantiation(): void
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

    public function testInstantiationWithoutTTL(): void
    {
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.old.com'
        );

        $this->assertInstanceOf(AddRequest::class, $request);
    }

    public function testGetters(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.new.com',
            $ttl
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertIsString($request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL(): void
    {
        $request = new AddRequest(
            'test.com',
            'www',
            'cname.new.com'
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertIsString($request->value());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }
}
