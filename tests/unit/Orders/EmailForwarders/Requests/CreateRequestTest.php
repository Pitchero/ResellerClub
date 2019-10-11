<?php

namespace Tests\Unit\Orders\EmailForwarders\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailForwarders\Requests\CreateRequest;
use ResellerClub\Orders\Order;

class CreateRequestTest extends TestCase
{
    /**
     * @var CreateRequest
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();

        $order = new Order(123);
        $email = new EmailAddress('team@example.com');

        $this->request = new CreateRequest($order, $email);
        $this->request->setForwarders([
            new EmailAddress('john.doe@example.com'),
            new EmailAddress('jane.doe@example.com'),
        ]);
    }

    public function testItCanGetOrderId(): void
    {
        $this->assertIsInt($this->request->orderId());
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testItCanGetEmail()
    {
        $this->assertInstanceOf(EmailAddress::class, $this->request->email());
    }

    public function testItCanGetForwarders()
    {
        $this->assertIsString($this->request->forwarders());
        $this->assertEquals(
            'john.doe@example.com,jane.doe@example.com',
            $this->request->forwarders()
        );
    }
}
