<?php

namespace ResellerClub\Resources\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Orders\OrderResource;

class OrderResourceTest extends TestCase
{
    public function testGettingIdWhenSet()
    {
        $order_id = (new OrderResource(123))->id();

        $this->assertInternalType('int', $order_id);
        $this->assertEquals(123, $order_id);
    }
}
