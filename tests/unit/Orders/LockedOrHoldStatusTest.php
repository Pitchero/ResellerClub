<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\LockedOrHoldStatus;

class LockedOrHoldStatusTest extends TestCase
{
    public function testObjectToString(): void
    {
        $this->assertEquals('sixtydaylock', (string) new LockedOrHoldStatus('sixtydaylock'));
        $this->assertEquals('', (string) new LockedOrHoldStatus(''));
    }

    public function testIsLocked(): void
    {
        $this->assertTrue((new LockedOrHoldStatus('sixtydaylock'))->isLocked());
        $this->assertFalse((new LockedOrHoldStatus('not_locked_status'))->isLocked());
    }

    public function testIsOnHold(): void
    {
        $this->assertTrue((new LockedOrHoldStatus('renewhold'))->isOnHold());
        $this->assertFalse((new LockedOrHoldStatus('not_on_hold_status'))->isOnHold());
    }

    public function testIsLockedOrOnHold(): void
    {
        $this->assertTrue((new LockedOrHoldStatus('sixtydaylock'))->isLockedOrOnHold());
        $this->assertTrue((new LockedOrHoldStatus('renewhold'))->isLockedOrOnHold());
        $this->assertFalse((new LockedOrHoldStatus('not_on_hold_status'))->isLockedOrOnHold());
    }
}
