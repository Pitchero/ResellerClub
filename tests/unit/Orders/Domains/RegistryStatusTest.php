<?php

namespace Tests\Unit\Domains;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\RegistryStatus;

class RegistryStatusTest extends TestCase
{
    public function testObjectToString()
    {
        $this->assertEquals('resellersuspend', (string) new RegistryStatus('resellersuspend'));
        $this->assertEquals('', (string) new RegistryStatus(''));
    }

    public function testIsSuspended()
    {
        $this->assertTrue((new RegistryStatus('resellersuspend'))->isSuspended());
        $this->assertFalse((new RegistryStatus('not_suspended_state'))->isSuspended());
    }

    public function testIsLockedAtReseller()
    {
        $this->assertTrue((new RegistryStatus('resellerlock'))->isLockedAtReseller());
        $this->assertFalse((new RegistryStatus('not_locked_state'))->isLockedAtReseller());
    }

    public function testIsLockedAtTransfer()
    {
        $this->assertTrue((new RegistryStatus('transferlock'))->isLockedAtTransfer());
        $this->assertFalse((new RegistryStatus('not_locked_state'))->isLockedAtTransfer());
    }

    public function testIsLocked()
    {
        $this->assertTrue((new RegistryStatus('resellerlock'))->isLocked());
        $this->assertTrue((new RegistryStatus('transferlock'))->isLocked());
        $this->assertFalse((new RegistryStatus('not_locked_state'))->isLocked());
    }
}
