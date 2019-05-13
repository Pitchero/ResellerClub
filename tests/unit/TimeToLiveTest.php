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
}
