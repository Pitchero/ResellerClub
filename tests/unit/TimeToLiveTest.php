<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ResellerClub\TimeToLive;
use TypeError;

class TimeToLiveTest extends TestCase
{
    public function testNonIntegerTTLThrowsException(): void
    {
        $this->expectException(TypeError::class);

        new TimeToLive('three minutes');
    }

    public function testBelowMinimumTTLThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new TimeToLive('7199');
    }

    public function testEqualToMinimumTTLInstantiates(): void
    {
        $ttl = new TimeToLive('7200');
        $this->assertInstanceOf(TimeToLive::class, $ttl);
    }

    public function testDefaultTTLHelper(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertInstanceOf(TimeToLive::class, $ttl);
        $this->assertEquals(TimeToLive::DEFAULT_TTL, (string) $ttl);
    }

    public function testMinimumTTLHelper(): void
    {
        $ttl = TimeToLive::minimumTtl();
        $this->assertInstanceOf(TimeToLive::class, $ttl);
        $this->assertEquals(TimeToLive::MINIMUM_TTL, (string) $ttl);
    }

    public function testCastToString(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertIsString((string) $ttl);
        $this->assertEquals(TimeToLive::DEFAULT_TTL, (string) $ttl);
    }

    public function testIntegerFunction(): void
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertIsInt($ttl->integer());
        $this->assertEquals(TimeToLive::DEFAULT_TTL, $ttl->integer());
    }
}
