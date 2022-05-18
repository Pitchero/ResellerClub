<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\OrderStatus;

class OrderStatusTest extends TestCase
{
    public function testToStringConvertsToLowercase(): void
    {
        $this->assertEquals('active', (string) new OrderStatus('Active'));
        $this->assertEquals('active', (string) new OrderStatus('active'));
        $this->assertEquals('active', (string) new OrderStatus('ACTIVE'));
    }

    public function testIsActive(): void
    {
        $this->assertTrue((new OrderStatus('Active'))->isActive());
        $this->assertFalse((new OrderStatus('Not active'))->isActive());
    }

    public function testIsInactive(): void
    {
        $this->assertTrue((new OrderStatus('inactive'))->isInactive());
        $this->assertFalse((new OrderStatus('active'))->isInactive());
    }

    public function testIsPendingDeletion(): void
    {
        $this->assertTrue((new OrderStatus('pending delete restorable'))->isPendingDeletion());
        $this->assertFalse((new OrderStatus('active'))->isPendingDeletion());
    }

    public function testIsDeleted(): void
    {
        $this->assertTrue((new OrderStatus('Deleted'))->isDeleted());
        $this->assertFalse((new OrderStatus('active'))->isDeleted());
    }

    public function testIsArchived(): void
    {
        $this->assertTrue((new OrderStatus('archived'))->isArchived());
        $this->assertFalse((new OrderStatus('active'))->isArchived());
    }
}
