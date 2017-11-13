<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Order;

class OrderTest extends TestCase
{
    public function testGettingIdWhenSet()
    {
        $orderId = (new Order(123))->id();

        $this->assertInternalType('int', $orderId);
        $this->assertEquals(123, $orderId);
    }
}
