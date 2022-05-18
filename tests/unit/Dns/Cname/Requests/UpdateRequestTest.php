<?php

namespace Tests\Unit\Dns\Cname\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Cname\Requests\UpdateRequest;
use ResellerClub\TimeToLive;

class UpdateRequestTest extends TestCase
{
    public function testInstantiation(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            'cname.old.com',
            'cname.new.com',
            $ttl
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testInstantiationWithoutTTL(): void
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            'cname.old.com',
            'cname.new.com'
        );

        $this->assertInstanceOf(UpdateRequest::class, $request);
    }

    public function testGetters()
    {
        $ttl = TimeToLive::defaultTtl();
        $request = new UpdateRequest(
            'test.com',
            'www',
            'cname.old.com',
            'cname.new.com',
            $ttl
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertIsString($request->currentValue());
        $this->assertIsString($request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
    }

    public function testGettersWithoutTTL(): void
    {
        $request = new UpdateRequest(
            'test.com',
            'www',
            'cname.old.com',
            'cname.new.com'
        );

        $this->assertIsString($request->domain());
        $this->assertIsString($request->record());
        $this->assertIsString($request->currentValue());
        $this->assertIsString($request->newValue());
        $this->assertInstanceOf(TimeToLive::class, $request->ttl());
        $this->assertEquals((string) $request->ttl(), TimeToLive::DEFAULT_TTL);
    }
}
