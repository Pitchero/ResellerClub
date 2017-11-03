<?php

namespace ResellerClub\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Order;

class OrderTest extends TestCase
{
    public function testGettingIdWhenSet()
    {
        $order_id = (new Order(123))->id();

        $this->assertInternalType('int', $order_id);
        $this->assertEquals(123, $order_id);
    }
}
