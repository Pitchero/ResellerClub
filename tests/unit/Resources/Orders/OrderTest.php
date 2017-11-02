<?php

namespace ResellerClub\Resources\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Orders\Order;

class OrderTest extends TestCase
{
    public function testGettingIdWhenNotSet()
    {
        $order_id = (new Order())->id();

        $this->assertInternalType('int', $order_id);
        $this->assertEquals(0, $order_id);
    }

    public function testGettingIdWhenSet()
    {
        $order = new Order();
        $order->setId(123);
        $order_id = $order->id();

        $this->assertInternalType('int', $order_id);
        $this->assertEquals(123, $order_id);
    }
}
