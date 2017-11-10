<?php

namespace Tests\Unit\Orders\EmailForwarders\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailForwarders\Requests\DeleteRequest;
use ResellerClub\Orders\Order;

class DeleteRequestTest extends TestCase
{
    private $request;

    public function testOrderId()
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testEmail()
    {
        $this->assertEquals('john.doe@my-domain.co.uk', $this->request->email());
    }

    public function testForwarders()
    {
        $this->assertEquals('jane.doe@my-domain.co.uk, stan.smith@my-domain.co.uk', $this->request->forwarders());
    }

    protected function setUp()
    {
        parent::setUp();

        $order = new Order(123);

        $this->request = new DeleteRequest(
            $order,
            $email = 'john.doe@my-domain.co.uk',
            $forwarders = 'jane.doe@my-domain.co.uk, stan.smith@my-domain.co.uk'
        );
    }
}
