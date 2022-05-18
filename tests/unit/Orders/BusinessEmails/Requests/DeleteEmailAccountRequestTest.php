<?php

namespace Tests\Unit\Orders\BusinessEmails\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Requests\DeleteEmailAccountRequest;
use ResellerClub\Orders\Order;

class DeleteEmailAccountRequestTest extends TestCase
{
    /**
     * @var DeleteEmailAccountRequest
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();

        $order = new Order(123);

        $this->request = new DeleteEmailAccountRequest(
            $order,
            $numberOfAccounts = 1
        );
    }

    public function testItCanGetOrderId(): void
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testItCanGetNumberOfAccounts(): void
    {
        $this->assertEquals(1, $this->request->numberOfAccounts());
    }
}
