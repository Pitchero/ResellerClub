<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Order;

class OrderTest extends TestCase
{
    public function testGettingIdWhenSet(): void
    {
        $orderId = (new Order(123))->id();

        $this->assertIsInt($orderId);
        $this->assertEquals(123, $orderId);
    }
}
