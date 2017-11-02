<?php

namespace ResellerClub\Resources\Customers\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Customers\Customer;

class CustomerTest extends TestCase
{
    public function testGettingId()
    {
        $customer_id = (new Customer(123))->id();

        $this->assertInternalType('int', $customer_id);
        $this->assertEquals(123, $customer_id);
    }
}
