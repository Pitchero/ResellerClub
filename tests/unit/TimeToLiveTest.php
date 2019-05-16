<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ResellerClub\TimeToLive;
use TypeError;

class TimeToLiveTest extends TestCase
{
    public function testNonIntegerTTLThrowsException()
    {
        $this->expectException(TypeError::class);

        new TimeToLive('three minutes');
    }

    public function testBelowMinimumTTLThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        new TimeToLive('7199');
    }

    public function testEqualToMinimumTTLInstantiates()
    {
        $ttl = new TimeToLive('7200');
        $this->assertInstanceOf(TimeToLive::class, $ttl);
    }

    public function testDefaultTTLHelper()
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertInstanceOf(TimeToLive::class, $ttl);
        $this->assertEquals(TimeToLive::DEFAULT_TTL, (string) $ttl);
    }

    public function testMinimumTTLHelper()
    {
        $ttl = TimeToLive::minimumTtl();
        $this->assertInstanceOf(TimeToLive::class, $ttl);
        $this->assertEquals(TimeToLive::MINIMUM_TTL, (string) $ttl);
    }

    public function testCastToString()
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertInternalType('string', (string) $ttl);
        $this->assertEquals(TimeToLive::DEFAULT_TTL, (string) $ttl);
    }

    public function testIntegerFunction()
    {
        $ttl = TimeToLive::defaultTtl();
        $this->assertInternalType('integer', $ttl->integer());
        $this->assertEquals(TimeToLive::DEFAULT_TTL, $ttl->integer());
    }
}
